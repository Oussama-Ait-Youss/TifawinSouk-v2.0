<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProductController;



Route::get('/',[HomeController::class,'index'])->name('home');

// Cart routes (session-based)
Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

// Place order (requires auth)
Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');

Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Product route
    Route::get('/products',[ProductController::class,'index'])->name('products.index');
    Route::get('products/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('products.store');
    Route::get('/products/{product}',[ProductController::class,'show'])->name('product.show');
    Route::get('/products/{product}/edit',[ProductController::class,'edit'])->name('products.edit');
    Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
    Route::delete('/products/{product}',[ProductController::class,'destroy'])->name('products.destroy');

    //category Route
    
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');


    // fournisseur
    Route::get('/fournisseurs', [FournisseurController::class, 'index'])->name('fournisseurs.index');

    // 2. Formulaire d'ajout (GET)
    Route::get('/fournisseurs/creer', [FournisseurController::class, 'create'])->name('fournisseurs.create');

    // 3. Traitement de l'ajout (POST)
    Route::post('/fournisseurs', [FournisseurController::class, 'store'])->name('fournisseurs.store');

    // 4. Formulaire de modification (GET)
    // On passe l'ID du fournisseur dans l'URL
    Route::get('/fournisseurs/{fournisseur}/modifier', [FournisseurController::class, 'edit'])->name('fournisseurs.edit');
    Route::put('/fournisseurs/{fournisseur}', [FournisseurController::class, 'update'])->name('fournisseurs.update');

    // 6. Suppression (DELETE)
    Route::delete('/fournisseurs/{fournisseur}', [FournisseurController::class, 'destroy'])->name('fournisseurs.destroy');

    Route::get('/products',function(){
        $products = Produit::paginate(10);
        return view('products-index',compact('products'));
    })->name('products.home');

    
});

require __DIR__.'/auth.php';
