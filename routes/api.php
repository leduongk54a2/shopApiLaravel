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
Route::get("category/all", \App\Http\Controllers\Category\GetAllInfoCategoryController::class);
Route::get("category/{id}", \App\Http\Controllers\Category\GetInfoCategoryController::class);
Route::get("product/all", \App\Http\Controllers\Product\GetAllProductController::class);
Route::get("product/display", \App\Http\Controllers\Product\GetProductDisplayController::class);
Route::get("product/{id}", \App\Http\Controllers\Product\GetProductDetailController::class)->where("id",
    "[0-9]+");
Route::get("supplier/all", \App\Http\Controllers\Supplier\GetAllInfoSupplierController::class);
Route::get("supplier/{id}", \App\Http\Controllers\Supplier\GetInfoSupplierController::class);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/upload-image', \App\Http\Controllers\ImageController::class);
    Route::get("user/all", "\App\Http\Controllers\User\GetAllUserController");
    Route::post("user/logout", "\App\Http\Controllers\User\LogoutUserController");
    Route::group(['middleware' => 'roles:admin', 'prefix' => 'employee'], function () {
        Route::get("/all", "\App\Http\Controllers\Employee\GetAllEmployeeController");
        Route::post("/add", "\App\Http\Controllers\Employee\CreateEmployeeController");
        Route::put("/edit/{id}", \App\Http\Controllers\Employee\EditEmployeeController::class);
        Route::get("/{id}", \App\Http\Controllers\Employee\GetEmployeeInfoController::class)->where("id",
            "[0-9]+");
        Route::delete("/delete", \App\Http\Controllers\Employee\DeleteEmployeeController::class);
        Route::get("/search", \App\Http\Controllers\Employee\SearchEmployeeController::class);
    });
    Route::group(['prefix' => 'category'], function () {
        Route::group(['middleware' => 'roles:admin,employee'], function () {
            Route::post("", \App\Http\Controllers\Category\AddCategoryController::class);
            Route::delete("", \App\Http\Controllers\Category\DeleteCategoryController::class);
            Route::patch("/{id}", \App\Http\Controllers\Category\SetVisibleCategoryController::class);
            Route::put("/{id}", \App\Http\Controllers\Category\EditCategoryInfoController::class);
        });
    });

    Route::group(['prefix' => 'supplier'], function () {

        Route::group(['middleware' => 'roles:admin,employee'], function () {
            Route::post("", \App\Http\Controllers\Supplier\AddSupplierController::class);
            Route::delete("", \App\Http\Controllers\Supplier\DeleteSupplierController::class);
            Route::put("/{id}", \App\Http\Controllers\Supplier\EditSupplierInfoController::class);
        });
    });


    Route::group(['prefix' => 'product'], function () {
        Route::post("", \App\Http\Controllers\Product\CreateProductController::class);
        Route::put("/{id}", \App\Http\Controllers\Product\UpdateInfoProductController::class)->where("id",
            "[0-9]+");
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::post("", \App\Http\Controllers\Cart\AddCartController::class);
        Route::post("/update-cart", \App\Http\Controllers\Cart\UpdateQuantityCartItem::class);
        Route::get("", \App\Http\Controllers\Cart\GetCartInfoController::class);
    });
    Route::group(['prefix' => 'rating'], function () {

        Route::group(['middleware' => 'roles:customer'], function () {
            Route::post("update-rating", \App\Http\Controllers\Rating\AddRatingController::class);
            Route::get("get-predict/{id}", \App\Http\Controllers\Rating\GetPredictProductController::class);

        });
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::group(['middleware' => 'roles:customer'], function () {
            Route::get("/{id}", \App\Http\Controllers\Customer\GetInfoCustomerController::class);
        });
    });

    Route::group(['prefix' => 'order'], function () {
        Route::group(['middleware' => 'roles:customer'], function () {
            Route::post("/save-order", \App\Http\Controllers\Order\SaveOrderController::class);
            Route::get("/all", \App\Http\Controllers\Order\GetListOrderController::class);
        });
        Route::group(['middleware' => 'roles:admin'], function () {
            Route::get("/statistic", \App\Http\Controllers\Order\StatisticController::class);
        });
    });
});
