<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Illuminate\Support\Facades\Auth;
use DB;

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
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['theme_manager']);

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
        $request->user()->authorizeRoles(['theme_manager']);
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

        $request->user()->authorizeRoles(['theme_manager']);

        $this->validateTheme();

        if($this->isDefaultHasYes( $request)){
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
        else{

            return redirect()->back()->withErrors(['error' => 'You cannot make a second default theme!']);
        }


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['theme_manager']);
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
        $request->user()->authorizeRoles(['theme_manager']);

        $this->validateTheme();

        if($this->isDefaultHasYes($request))
        {
            Theme::where('id', $id)
                ->update(['name' => $request->name,
                        'url'=>$request->url,
                        'isDefault' => $request->isDefault ? $request->isDefault:0,
                        'last_modified_by' => Auth::id(),

                    ]
                );
            $request->session()->flash('status', 'You updated a theme successfully!');

            return redirect('/admin/themes');
        }
        else {

            return redirect()->back()->withErrors([ 'error' => 'You cannot make a second default theme!']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['theme_manager']);
        $t = Theme::find($id);
        if(!$t->isDefault){
            $t->update(['deleted_by' => Auth::id()]);
            $t->delete();

            $request->session()->flash('status', 'You deleted a theme successfully!');
            return redirect('/admin/themes');
        }
        else {
            $request->session()->flash('status', 'You cannot delete a default theme!');

            return redirect('/admin/themes');
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

    protected function isDefaultHasYes(Request $request){
       if($request->isDefault AND \DB::table('themes')->where('isDefault', '=', 1)->get()->isEmpty())
       {
           return true;
       }
        else if(!$request->isDefault){
            return true;
        }
    }
}
