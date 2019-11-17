<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect( '/feed');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home',function (){
    return redirect('/feed');
});


// post home page
Route::get('/feed','PostController@index');

Route::resource('/posts', 'PostController');

Route::resource('/admin/users','AdminUserController',['names' => [
    'index' => 'user'
]]);

Route::post('/admin/users/search','AdminSearchController@index');//->name('usersearch');

Route::get('/admin/users/search/clients','AdminSearchController@showClients');
Route::get('/admin/users/search/adminUsers','AdminSearchController@showAdminUsers');

Route::resource('/admin/themes','AdminThemeController',['names' => [
    'index' => 'theme'
]]);

