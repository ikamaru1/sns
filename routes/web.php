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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();





//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@index');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

//ログアウト
Route::get('/login','Auth\LoginController@logout');

//フォローリスト
Route::get('/followList','FollowsController@followList');

//フォロワーリスト
Route::get('/followerList','FollowsController@followerList');

//検索
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

//フォロー機能
Route::post('/follow/create','FollowsController@create');
Route::post('/follow/delete','FollowsController@delete');

//投稿機能
Route::post('/index','PostsController@post');