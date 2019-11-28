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
        $this->middleware('adminUsers');
    }


    public function index(Request $request)
    {
//        $request->user()->authorizeRoles(['user_administrators']);

//        $users = \DB::table('users')
//                ->join('role_user', 'users.id', '=', 'role_user.user_id')
//                ->select('users.id','users.name','users.email')
//                ->whereNull('deleted_at')
//                ->groupBy('users.id')
//                ->get();

        $users = User::whereHas('roles', function ($q) {
            //conditions from role table
            $q->Where('name', 'user_administrators')
                ->orWhere('name', 'theme_manager')
                ->orWhere('name', 'post_moderator');

        })->get();

        $sel = '';

        return view('admin.index',compact('users','sel'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
//        $request->user()->authorizeRoles([ 'user_administrators']);
        return view('admin.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        $request->user()->authorizeRoles([ 'user_administrators']);

        $user->update($this->validateUser());
        $user->roles()->sync($request->type);

        $request->session()->flash('status', 'You updated a user successfully!');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
//        $request->user()->authorizeRoles(['user_administrators']);
        if($user->id !== 1){

            $user->update(['deleted_by' => Auth::id()]);
            $user->delete();

            $request->session()->flash('status', 'You deleted a user successfully!');
            return redirect('/admin/users');
        }
        else {
            $request->session()->flash('status', 'You cannot delete a default theme!');

            return redirect()->back();
        }

    }

    protected function validateUser()
    {
        $attributes = request()->validate([
            'name' => ['required','min:3','max:255'],
            'email' => ['required','email'],

        ]);
        $attributes['last_modified_by'] =  Auth::id();
        return $attributes;
    }


}
