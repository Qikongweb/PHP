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

        $str = $request->searchStr;//Input::get('searchStr');
        $request->flash();

        $users = User::where('name','LIKE','%'.$str.'%')->orWhere('email','LIKE','%'.$str.'%')->get();
        return view('admin.index',
            [
                'users' => $users,
                'str' => $str
            ]
        );
    }


}
