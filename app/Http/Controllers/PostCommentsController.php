<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request)
    {
//        return dd($request);
//        return dd($this->validatePosts($request));
        Comment::create($this->validatePosts($request));
        $request->session()->flash('status', 'You created a new comment successfully!');

        return redirect()->back();

    }

    private function validatePosts(Request $request)
    {
        $attributes = request()->validate([
            'contents' => ['required'],
            'post_id' => ['required'],
        ]);
        $attributes['user_id'] = Auth::id();

        return $attributes;

    }


}
