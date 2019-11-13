<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Illuminate\Support\Facades\Auth;

class AdminThemeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //->only(['store','update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();

        return view('theme.index',compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        Theme::create([
            'name' => $request->name,
            'url' => $request->url,
            'isDefault' => $request->isDefault ? $request->isDefault:'No',
            'created_by' => Auth::user()->name,
            'last_modified_by' => Auth::user()->name,

        ]);

        return redirect('admin/themes');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::find($id);
        return view('theme.edit',compact('theme'));

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
//        return dd('Hello');
        Theme::where('id', $id)
            ->update(['name' => $request->name,
                    'url'=>$request->url,
                    'isDefault' => $request->isDefault ? $request->isDefault:'No',
                    'last_modified_by' => Auth::user()->name,

                ]
            );

        return redirect('/admin/themes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Theme::find($id)->delete();
        return redirect('/admin/themes');
    }
}
