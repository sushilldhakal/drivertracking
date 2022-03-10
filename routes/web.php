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


Route::middleware('auth')->group(function(){
    Route::resource('resource','ResourceController');
    Route::view('punch-in','Form.index');
});

Route::post('login','AuthController@login');

Route::view('/','welcome');
Route::view('/dashboard','Dashboard.index');
Route::view('/login','Pin.index')->name('login');
Route::view('/admin','Admin.index');
