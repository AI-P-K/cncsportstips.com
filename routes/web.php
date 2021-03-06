<?php

use Illuminate\Support\Facades\Route;

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



/*
Route::get('/hello', function () {
    // return view('welcome');
    return 'Hello';
});

Route::get('/users/{id}/{name}', function ($id, $name){
    return 'This is user '.$name. ' with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index');

Route::get('/forum', 'PagesController@forum');

Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');

Route::resource('tips', 'TipsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});
