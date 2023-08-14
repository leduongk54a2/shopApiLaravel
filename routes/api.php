<?php

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
Route::post('user/login', 'App\Http\Controllers\User\LoginUserController');
Route::post("user/update-password", "\App\Http\Controllers\User\UpdatePasswordController");


Route::group(['middleware' => 'auth:api'], function () {
    Route::get("user/all", "\App\Http\Controllers\User\GetAllUserController");
    Route::post("user/logout", "\App\Http\Controllers\User\LogoutUserController");
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get("employee/all", "\App\Http\Controllers\Employee\GetAllEmployeeController");
        Route::post("employee/add", "\App\Http\Controllers\Employee\CreateEmployeeController");
    });

});
