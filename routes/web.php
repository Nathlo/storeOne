<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

/* Display all products  */
Route::get('/', [ProductController::class, 'index'])->name('product');
/* Give detail information for a specified product  */
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.detail');
/* List all products from a specified category  */
Route::get('/product/category/{id}', [ProductController::class, 'productByCategory'])->name('product.category');

/* Dashboard management  */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*  Authentication management */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
