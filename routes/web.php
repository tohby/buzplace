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

Auth::routes();
Route::get('/', 'WelcomeController@index');
Route::get('/admin', 'Auth\AdminController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts', 'PostsController');
Route::get('/tags/{tag}', 'TagsController@index');
Route::get('/myposts', 'PostsController@myposts')->name('myposts');
Route::resource('/profile', 'ProfilesController');
Route::get('profile/{id}', 'ProfilesController@show');
Route::get('/search/{searchKey}', 'PostsController@search');
Route::resource('/consult', 'ConsultController');