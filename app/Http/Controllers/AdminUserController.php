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


    public function index()
    {

        if($this->isUserAdmin())
        {
            //$users = User::all();
            $users = \DB::table('users')
                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                    ->select('users.id','users.name','users.email')
                    ->groupBy('users.id')
                    ->get();

            return view('admin.index',compact('users'));
        }
        else{
            return abort(403);
        }

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
    public function edit($id)
    {
        if($this->isUserAdmin())
        {
            $user = User::find($id);
            return view('admin.edit',compact('user'));
        }
        else{
            return abort(403);
        }

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
        User::where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'email'=>$request->email,
                    'last_modified_by' => Auth::user()->name,
                    ]
            );
        User::where('id',$id)->first()->roles()->sync($request->type);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/admin/users');
    }

    protected function validateUser()
    {
        return request()->validate([
            'name' => ['required','min:3','max:255'],
            'email' => ['required','email'],

        ]);
    }

    protected function isUserAdmin()
    {
        return in_array('user_administrators',User::find(Auth::id())->roles->pluck('type')->toArray());

    }
}
