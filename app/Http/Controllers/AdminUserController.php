<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth'); //->only(['store','update']);
    }


    public function index(Request $request)
    {
//        return dd(app('request'));
        $request->user()->authorizeRoles(['user_administrators']);

        $users = \DB::table('users')

                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->select('users.id','users.name','users.email')
                ->whereNull('deleted_at')
                ->groupBy('users.id')
                ->get();

        return view('admin.index',compact('users'));

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles([ 'user_administrators']);

        $user = User::find($id);

        return view('admin.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateUser();

        $request->user()->authorizeRoles([ 'user_administrators']);

        User::where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'email'=>$request->email,
                    'last_modified_by' => Auth::id(),
                    ]
            );
        User::where('id',$id)->first()->roles()->sync($request->type);
        $request->session()->flash('status', 'You updated a user successfully!');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['user_administrators']);
        if($id !== 1){
//            User::find($id)->delete();
            User::where('id',$id)->update(['deleted_by' => Auth::id()]);
            User::find($id)->delete();
            $request->session()->flash('status', 'You deleted a user successfully!');

            return redirect('/admin/users');
        }
        else {
            return redirect()->back()->withErrors('error','You cannot delete a root user!');
        }

    }

    protected function validateUser()
    {
        return request()->validate([
            'name' => ['required','min:3','max:255'],
            'email' => ['required','email'],

        ]);
    }


}
