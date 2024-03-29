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
    return view('welcome');
});
Auth::routes();

Route::get('/home', function () {
    return view('home');
});

Route::post('/insert-post','PostController@insertpost');
Route::get('/Allpost','PostController@Allpost')->name('allpost');
Route::get('/deletecontact/{id}','PostController@Deletepost');
Route::get('/changePassword','HomeController@ChangePassword')->name('Change.Password');
Route::post('/updatepassword','HomeController@updatepassword');
Route::get('/editpost/{id}','PostController@edittpost');
Route::post('/updatepost/{id}','PostController@updaTepost');
Route::get('/NEwsadd','PostController@News')->name('newspost');
Route::post('/insert-news','PostController@InsertNews');
Route::get('/allNews','PostController@ALltNews')->name('all.news');



