<?php

use Illuminate\Http\Request;

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


Route::get('/posts', 'Api\PostsController@index')->middleware('auth:api');
Route::get('/posts/{post}', 'Api\PostsController@show');
Route::post('/posts', 'Api\PostsController@store');

// PostMan localhost:8000/api/posts
//Route::get('/nothing', 'PostsController@index');