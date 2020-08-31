<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Auth\RegisterController@register');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::middleware('auth:api')->group(function () {
    //Route::get('category', 'CategoryController@index');
    Route::get('category/{id}', 'CategoryController@show');
    Route::post('category', 'CategoryController@store');
    Route::put('category/{id}', 'CategoryController@update');
    Route::delete('category/{id}', 'CategoryController@delete');

    //Route::get('product', 'ProductController@index');
    Route::get('product/{id}', 'ProductController@show');
    Route::post('product', 'ProductController@store');
    Route::put('product/{id}', 'ProductController@update');
    Route::delete('product/{id}', 'ProductController@delete');
    Route::get('/logout', 'Api\AuthController@logout')->name('logout');
});
