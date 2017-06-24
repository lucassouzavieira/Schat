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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'chat'], function () {
    Route::get('mychats', 'ChatController@index')->name('chat.index');
    Route::get('usersonline', 'ChatController@users')->name('chat.on');
    Route::get('dialog/{id}', 'ChatController@dialog')->name('chat.dialog');
});

Route::group(['prefix' => 'room'], function () {
    Route::get('/', 'RoomController@index')->name('room.index');
    Route::get('/new', 'RoomController@create')->name('room.create');
    Route::post('/new', 'RoomController@store')->name('room.store');
    Route::get('/join/{id}', 'RoomController@join')->name('room.join');
    Route::get('dialog/{id}', 'RoomController@dialog')->name('room.dialog');
});

Route::post('/send', 'MessageController@store')->name('message.post');
