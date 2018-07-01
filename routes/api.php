<?php

use Illuminate\Http\Request;

Route::middleware('api')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('user', 'AuthController@me');

    Route::prefix('products')->group(function() {
        Route::get('/{product?}', 'ProductController@show');
        Route::post('/', 'ProductController@store');
        Route::put('/{product}', 'ProductController@update');
        Route::delete('/{product}', 'ProductController@destroy');
    });
    
    Route::prefix('categories')->group(function() {
        Route::get('/{category?}', 'CategoryController@show');
        Route::post('/', 'CategoryController@store');
        Route::put('/{category}', 'CategoryController@update'); 
        Route::delete('/{category}', 'CategoryController@destroy');
    
        Route::get('/{category}/products', 'ProductController@showByCategory');    
    });
});

