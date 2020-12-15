<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/books','BookController@index');
Route::get('/books/{id}','BookController@show');
Route::post('/books/create','BookController@store');
Route::put('/books/{id}','BookController@update');
Route::delete('/books/{id}','BookController@destroy');
