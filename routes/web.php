<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIsAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(CheckIsAdmin::class);
    Route::get('/users/{user}/show', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users', [UserController::class, 'index'])->name('users');

    // rotas produtos
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('products/{product}/details', [ProductController::class, 'details'])->name('product.details');
    Route::get('categories/{category}', [ProductController::class, 'categories'])->name('product.categories');
    
    Route::get('cart', [CartController::class, 'index'])->name('products.cart');
    Route::post('add-to-cart', [CartController::class, 'AddToCart'])->name('product.Addcart');
    Route::post('remove', [CartController::class, 'remove'])->name('product.removeCart');
    Route::put('update', [CartController::class, 'update'])->name('product.updateCart');
    Route::delete('clear-cart', [CartController::class, 'clear'])->name('product.clearCart');

});




Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
