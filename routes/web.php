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

Route::view('/register', 'register');
Route::view('/login', 'login');

Route::post('/store', "RegisterController@store");
Route::post('/logs', "RegisterController@logs");
Route::get('/logout', 'RegisterController@logout');

Route::post('/save', "MailSenderController@save");

Route::get('/home', "RegisterController@index")->name('home')->middleware('admin');

