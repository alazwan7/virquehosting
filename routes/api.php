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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/users', function () {
//     return new UsersResource(users::find(1));
// });
Route::get('/users', "App\Http\Controllers\UserController@index");
Route::get('/users/{id}', "App\Http\Controllers\UserController@show");
Route::post('/users', "App\Http\Controllers\UserController@store");
Route::put('/users/{id}', "App\Http\Controllers\UserController@update");
Route::post('/login', "App\Http\Controllers\UserController@authenticate");

Route::post('/requests', "App\Http\Controllers\RequestsController@store");
Route::post('/counters', "App\Http\Controllers\CountersController@store");
Route::get('/counters', "App\Http\Controllers\CountersController@index");
Route::get('/requests', "App\Http\Controllers\RequestsController@userRequest");
Route::get('/requests/walkinqueue', "App\Http\Controllers\RequestsController@walkinQueue");

// Route::get('/login', "App\Http\Controllers\userController@authenticate");
