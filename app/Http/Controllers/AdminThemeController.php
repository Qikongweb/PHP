<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Illuminate\Support\Facades\Auth;
use DB;
//use Illuminate\Support\Facades\Cookie;
use Cookie;
class AdminThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']); //->only(['store','update']);
        $this->middleware('themeUsers', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $themes = Theme::all();
        return view('theme.index',compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('theme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateTheme();

        if($request->isDefault) {
            Theme::where('isDefault', 1)->update(['isDefault' => 0]);
        }

        Theme::create([
            'name' => $request->name,
            'url' => $request->url,
            'isDefault' => $request->isDefault ? $request->isDefault:0,
            'created_by' => Auth::id(),
            'last_modified_by' => Auth::id(),

        ]);
        $request->session()->flash('status', 'You created a new theme successfully!');

        return redirect('admin/themes');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        Cookie::queue('theme', Theme::find($id)->url);

//        $cookie = $request->cookie('theme');

        return redirect('/feed');
    }


    public function edit(Request $request, Theme $theme)
    {
        return view('theme.edit',compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {

        $this->validateTheme();

        if($theme->isDefault OR !$request->isDefault)
        {
            $theme->update(['name' => $request->name,
                    'url'=>$request->url,
                    'last_modified_by' => Auth::id(),
                ]
            );
        }
        else
        {
                Theme::where('isDefault', 1)->update(['isDefault' => 0]);
                $theme->update(['name' => $request->name,
                        'url'=>$request->url,
                        'isDefault' => 1,
                        'last_modified_by' => Auth::id(),
                    ]
                );

        }

        $request->session()->flash('status', 'You updated a theme successfully!');

        return redirect('/admin/themes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Theme $theme)
    {

        if(!$theme->isDefault){
            $theme->delete();

            $request->session()->flash('status', 'You deleted a theme successfully!');
            return redirect('/admin/themes');
        }
        else {
            $request->session()->flash('status', 'You cannot delete a default theme!');
            return redirect()->back();
        }

    }

    protected function validateTheme()
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        return request()->validate([
            'name' => ['required'],
            'url' => ['required','regex:' . $regex],
        ]);
    }


}
