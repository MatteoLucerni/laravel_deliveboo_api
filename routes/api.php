<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PlateController;
use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes for plates

Route::apiResource('/plates', PlateController::class);

// routes for restaurants

Route::apiResource('/restaurants', RestaurantController::class);

// routes for orders

Route::apiResource('/orders', OrderController::class);
