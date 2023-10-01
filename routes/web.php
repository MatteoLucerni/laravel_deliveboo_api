<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PlateController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Restaurant;
use App\Models\Order;
use App\Models\Plate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// routes for Admin
Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');

    // routes for plates
    Route::get('/plates/trash', [PlateController::class, 'trash'])->name('plates.trash');
    Route::delete('/plates/trash/{id}/drop', [PlateController::class, 'drop'])->name('plates.drop');
    Route::delete('/plates/trash/drop', [PlateController::class, 'dropAll'])->name('plates.dropAll');
    Route::patch('/plates/{id}/restore', [PlateController::class, 'restore'])->name('plates.restore');
    Route::resource('/plates', PlateController::class);
    // end routes for plates

    // routes for resturants
    Route::patch('/restaurants/{id}', [RestaurantController::class, 'update'])->name('restaurants.update');
    Route::get('/restaurants/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurants.edit');
    // end routes for restaurants

    // routes for orders
    Route::get('/orders/trash', [OrderController::class, 'trash'])->name('orders.trash');
    Route::delete('/orders/trash/{id}/drop', [OrderController::class, 'drop'])->name('orders.drop');
    Route::delete('/orders/trash/drop', [OrderController::class, 'dropAll'])->name('orders.dropAll');
    Route::patch('/orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
    Route::resource('/orders', OrderController::class);
});

// routes for profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
