<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
});


Route::get('route', function(){echo public_path('storage/public/images/static/tab_icon.ico');})->name('route');


//User
Route::post('user/handle-login', [UserController::class, 'handleLogin'])->name('user.handle_login');
Route::resource('user', UserController::class);


//Shop
Route::group(['prefix' => 'shop'], function() {
    Route::resource('products', ProductController::class);
    Route::post('cart/{itemId}/item-quantity/increment', [CartItemController::class, 'incrementQuantity']);
    Route::post('cart/{itemId}/item-quantity/decrement', [CartItemController::class, 'decrementQuantity']);
    Route::resource('cart', CartItemController::class);
});
