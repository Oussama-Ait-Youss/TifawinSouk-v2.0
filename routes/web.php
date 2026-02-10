<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FournisseurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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


    
});

require __DIR__.'/auth.php';
