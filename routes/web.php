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
    Route::middleware('not-in-break')->group(function(){
        Route::resource('resource','ResourceController');
        Route::view('punch-in','Form.index')->name('main');
    });
    Route::view('/','welcome');
    Route::get('break','AuthController@break');
    Route::view('/is-in-break','break');

});

Route::prefix('admin')->group(function(){
    Route::view('login','Admin.login')->name('admin.login');
    Route::post('login','AuthController@adminLogin');

    Route::middleware('admin')->group(function(){

    });
});

Route::post('punch-in','AuthController@punchIn')->name('punch-in');

Route::view('/','Pin.index');
Route::view('/dashboard','Dashboard.index');
Route::view('/login','Pin.index')->name('login');
Route::view('/admin/login','Admin.login')->name('admin.login');
Route::view('/form','Form.index');
Route::view('/driver','Driver.index');
Route::view('/location','Location.index');
Route::view('/depot','Depot.index');
Route::view('/search','Search.index');
Route::view('/punch-in','Pin.index')->name('punch-in');