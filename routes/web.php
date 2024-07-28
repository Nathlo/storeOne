<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommandeController;


Route::get('/welcome', function () {
    return view('welcome');
});

/* Display all products  */
Route::get('/', [ProductController::class, 'index'])->name('product');
/* Give detail information for a specified product  */
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.detail');
/* List all products from a specified category  */
Route::get('/product/category/{id}', [ProductController::class, 'productByCategory'])->name('product.category');


Route::get('/contact', [ContactController::class, 'edit'])->name('contact.edit');

/* Dashboard management  */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
/*  Authentication management */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

/*  Basket management */
    Route::get('/panier', [PanierController::class, 'index'])->name('panier.lister');
    Route::get('/panier/add/{product}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
    Route::get('/panier/remove/{panier}', [PanierController::class, 'removeOne'])->name('panier.enleverUn');
    Route::get('/panier/delete/{panier}', [PanierController::class, 'removeAll'])->name('panier.enleverTout'); // remove all quantity with bin icon
    Route::get('/panier/empty', [PanierController::class, 'emptyBasket'])->name('panier.vider');

/*  Favorite management */
    Route::get('/favoris', [FavorisController::class, 'index'])->name('favoris.lister');
    Route::get('/favoris/edit/{product}', [FavorisController::class, 'edit'])->name('favoris.edit');
    
 /*  Make an Order */   
    Route::get('/commande', [CommandeController::class, 'index'])->name('commande.lister');
    Route::get('/commande/create', [CommandeController::class, 'create'])->name('commande.create');
/*  Make a successfull Order */   
    Route::get('/commande/success', [CommandeController::class, 'success'])->name('commande.success');
    
});
    // Route to get notifications from Stripe webhook
    Route::post('/commande/webhook', [CommandeController::class, 'webhook'])->name('commande.webhook');


require __DIR__.'/auth.php';
