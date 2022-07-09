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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {

    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('userProfile', [\App\Http\Controllers\AuthController::class, 'userProfile']);

    Route::apiResource('carts', \App\Http\Controllers\User\UserCartController::class);
    Route::apiResource('payment', \App\Http\Controllers\User\UserOrderController::class);

//    Route::post('addresses', [\App\Http\Controllers\User\AddressController::class, 'update']);
    Route::apiResource('addresses', \App\Http\Controllers\User\AddressController::class);
});

Route::get('restaurants/{restaurant_id}/foods', [\App\Http\Controllers\User\FoodController::class, 'show']);
Route::apiResource('restaurants/foods', \App\Http\Controllers\User\FoodController::class, ['except' => 'show']);
Route::resource('restaurants', \App\Http\Controllers\User\RestaurantInformation::class);
