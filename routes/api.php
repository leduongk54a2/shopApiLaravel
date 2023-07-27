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


Route::post('user/create', "\App\Http\Controllers\User\CreateUserController@createUser");

Route::get("user/all", "\App\Http\Controllers\User\GetAllUserController");

Route::post("user/update-password", "\App\Http\Controllers\User\UpdatePasswordController");

//
//Route::get('user/test', "\App\Http\Controllers\CreateUser");
//Route::group(['middleware' => ['auth:api']], function () {
//    Route::group(['prefix' => 'user'], function () {
//        Route::post('/create', [CreateUserController::class,'createUser']);
//    });
//});


