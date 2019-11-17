<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;

class AdminSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user_administrators']);

        $str = $request->searchStr;//Input::get('searchStr');
        $request->flash();

        $users = User::where('name','LIKE','%'.$str.'%')->orWhere('email','LIKE','%'.$str.'%')->get();
        $sel = '';

        return view('admin.index',compact('users','sel'));
    }

    public function showClients(Request $request)
    {
        $request->user()->authorizeRoles(['user_administrators']);
        $users = User::all();
        $sel = 'clients';

        return view('admin.index',compact('users','sel'));
    }

    public function showAdminUsers(Request $request)
    {
        $request->user()->authorizeRoles(['user_administrators']);

        $users = User::whereHas('roles', function ($q) {
            //conditions from role table
            $q->Where('name', 'user_administrators')
                ->orWhere('name', 'theme_manager')
                ->orWhere('name', 'post_moderator');

        })->get();
        $sel = 'adminUsers';
        return view('admin.index',compact('users','sel'));
    }


}
