<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;


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

/*  Basket management */
Route::middleware('auth')->group(function () {
    Route::get('/panier', [PanierController::class, 'index'])->name('panier.lister');
    Route::get('/panier/add/{product}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
    Route::get('/panier/remove/{panier}', [PanierController::class, 'removeOne'])->name('panier.enleverUn');
    Route::get('/panier/delete/{panier}', [PanierController::class, 'removeAll'])->name('panier.enleverTout');
    Route::get('/panier/empty', [PanierController::class, 'emptyBasket'])->name('panier.vider');
});

/*  Favorite management */
Route::middleware('auth')->group(function () {
    Route::get('/favoris', [FavorisController::class, 'index'])->name('favoris.lister');
    Route::get('/favoris/edit/{product}', [FavorisController::class, 'edit'])->name('favoris.edit');
    
});

require __DIR__.'/auth.php';
