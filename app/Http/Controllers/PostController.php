<?php

namespace App\Http\Controllers;

use App\Post;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'showPostsRecores']]);
        $this->middleware('postUsers')->only(['destroy']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $posts = \DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->get();

        $themes = Theme ::all();

        return view("posts.index",compact('posts','themes'));
    }

    public function show(Request $request, Post $post)
    {
        $themes = Theme ::all();
        return view('posts.show',compact('post','themes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all();
        return view('posts.create',compact('themes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Post::create($this->validatePosts($request));
        $request->session()->flash('status', 'You created a new post successfully!');

        return redirect('/feed');

    }


    public function destroy(Request $request,Post $post)
    {
//        $request->user()->authorizeRoles(['post_moderator']);

        $post->update(['deleted_by' => Auth::id()]);
        $post->delete();

        $request->session()->flash('status', 'You deleted a post successfully!');
        return redirect('/feed');
    }

    private function validatePosts(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'caption' => ['required'],
            'image_url' => ['required']
        ]);
        $attributes['created_by'] = Auth::id();
        $attributes['last_modified_by'] = Auth::id();

        return $attributes;

    }

    public function showPostsRecores() {

        $post = \DB::table('posts')
//                ->where('id',5)
                ->where('posts.created_at', '>', \Carbon\Carbon::now()->subSeconds(6))
                ->get();

        if(!$post->isEmpty()) {

            return view('posts.signalDiv', (['post' => $post[0]]));
        }
        else{
            return "";
        }


    }



}
