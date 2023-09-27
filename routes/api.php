<?php

use App\Http\Controllers\Api\PlateController;
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

Route::get('/plates/trash', [PlateController::class, 'trash']);

Route::delete('/plates/trash/{id}/drop', [PlateController::class, 'drop']);

Route::delete('/plates/trash/drop', [PlateController::class, 'dropAll']);

Route::patch('/plates/trash/{id}/restore', [PlateController::class, 'restore']);

Route::patch('/plates/trash/restore', [PlateController::class, 'restoreAll']);

Route::apiResource('/plates', PlateController::class);
