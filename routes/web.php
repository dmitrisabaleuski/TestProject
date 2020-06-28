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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post_id}', 'HomeController@singlePost')->name('showSinglePost');
Route::post('/', 'HomeController@sort')->name('sort');

Route::group(['prefix' => 'admin'], function () {
    Route::get('', 'AdminPageController@index')->name('admin');
    Route::get('posts/{user_id?}', 'AdminPageController@postsPage')->name('postsPage');
    Route::get('/post/post-{post_id}', 'AdminPageController@singlePost')->name('showPost');
    Route::get('post/create', function(){
        $pageName = "Create Post";

        return view('admin_panel/createPost')->with(['pageName' => $pageName]);
    });
    Route::post('post/save', 'PostController@create')->name('savePost');
});



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
