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
        Route::view('punch-in','form.index')->name('main');
    });
    Route::get('break','AuthController@break');
    Route::view('/is-in-break','break');

});

Route::prefix('admin')->group(function(){
    Route::view('login','admin.login')->name('admin.login');
    Route::post('login','AuthController@adminLogin')->name('admin.login.post');

    Route::middleware('admin')->group(function(){
        Route::resource('resource','ResourceController');
        Route::view('/','dashboard.index')->name('admin.dashboard');
        Route::view('/driver','driver.index')->name("admin.driver");
        Route::view('/driver/new','driver.new')->name("admin.driver.new");
        Route::view('/location','location.index')->name('admin.location');
        Route::view('/depot','depot.index')->name('admin.depot');
        Route::view('/search','search.index')->name('admin.search');
        Route::view('/driver/single','driver.single')->name('admin.driver.single');
    });
});

Route::post('punch-in','AuthController@punchIn')->name('punch-in');

// Route::view('/','Pin.index');
Route::view('/login','pin.index')->name('login');

Route::get('/table/{table}', function($table){
    return \DB::table(\Str::plural($table))->get();
});
