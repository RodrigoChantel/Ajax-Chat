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

Route::any('/chat/hideAll', 'ChatController@hideMessages')->name('hideMessages')->middleware('auth');
Route::get('/get-messages', 'ChatController@getMessages')->middleware('auth');
Route::post('/send-message/{id}', 'ChatController@send')->middleware('auth');
Route::resource('/chat', 'ChatController')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

//Route::get('/home', 'ChatController@send')->name('home');
