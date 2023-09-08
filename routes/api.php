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
    Route::post('/upload-image', \App\Http\Controllers\ImageController::class);
    Route::get("user/all", "\App\Http\Controllers\User\GetAllUserController");
    Route::post("user/logout", "\App\Http\Controllers\User\LogoutUserController");
    Route::group(['middleware' => 'roles:admin'], function () {
        Route::get("employee/all", "\App\Http\Controllers\Employee\GetAllEmployeeController");
        Route::post("employee/add", "\App\Http\Controllers\Employee\CreateEmployeeController");
        Route::put("employee/edit/{id}", \App\Http\Controllers\Employee\EditEmployeeController::class);
        Route::get("employee/{id}", \App\Http\Controllers\Employee\GetEmployeeInfoController::class)->where("id",
            "[0-9]+");
        Route::delete("employee/delete", \App\Http\Controllers\Employee\DeleteEmployeeController::class);
        Route::get("employee/search", \App\Http\Controllers\Employee\SearchEmployeeController::class);
    });
    Route::group(['middleware' => 'roles:admin,employee'], function () {
        Route::get("category/all", \App\Http\Controllers\Category\GetAllInfoCategoryController::class);
        Route::post("category", \App\Http\Controllers\Category\AddCategoryController::class);
        Route::delete("category", \App\Http\Controllers\Category\DeleteCategoryController::class);
        Route::patch("category/{id}", \App\Http\Controllers\Category\SetVisibleCategoryController::class);
        Route::put("category/{id}", \App\Http\Controllers\Category\EditCategoryInfoController::class);
        Route::get("category/{id}", \App\Http\Controllers\Category\GetInfoCategoryController::class);

    });

    Route::group(['middleware' => 'roles:admin,employee'], function () {
        Route::post("product", \App\Http\Controllers\Product\CreateProductController::class);
        Route::get("product/all", \App\Http\Controllers\Product\GetAllProductController::class);

    });

});
