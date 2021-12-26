<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

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
Route::post('register','\App\Http\Controllers\Api\UserController@register');
Route::post('login','App\Http\Controllers\Api\UserController@login');
Route::post('getBooks','App\Http\Controllers\API\BookController@index');

// Route::middlewere('auth:api')->group( function(){
//     Route::resource('books', 'API\BookController');
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
