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
        $this->middleware('auth', ['except' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = \DB::table('posts')

            ->join('users', 'users.id', '=', 'posts.created_by')
            ->select('posts.id','posts.title','posts.caption','posts.image_url','posts.created_at','users.name')
            ->whereNull('posts.deleted_at')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $themes = Theme ::all();

        return view("posts.index",compact('posts','themes'));
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
        $this->validatePosts($request);
        Post::create([
                'title' => $request->title,
                'image_url' => $request->image_url,
                'caption' => $request->caption,
                'created_by' => Auth::id(),
                'last_modified_by' => Auth::id(),

            ]);
        $request->session()->flash('status', 'You created a new post successfully!');

        return redirect('/feed');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['post_moderator']);
        Post::where('id',$id)->update(['deleted_by' => Auth::id()]);
        Post::find($id)->delete();

        $request->session()->flash('status', 'You deleted a post successfully!');
        return redirect('/feed');
    }

    private function validatePosts(Request $request)
    {
        return request()->validate([
            'title' => ['required'],
            'caption' => ['required'],
            'image_url' => ['required']
        ]);
    }
}