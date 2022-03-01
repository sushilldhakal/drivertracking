<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    
    Route::middleware('auth:sanctum')->group(function(){
        Route::resource('resource','ResourceController');
    });

    Route::middleware('guest')->group(function(){
        Route::post('login','AuthController@login');
        Route::post('sign-up','UserController@create');
    });

});