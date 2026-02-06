<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FournisseurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // authentification
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // fournisseur
    Route::get('/fournisseur',[FournisseurController::class,'index']);
    Route::get('/fournisseur/edit',[FournisseurController::class,'edit'])->name('fournisseur.edit');
    Route::get('/fournisseur/create',[FournisseurController::class,'create'])->name('fournisseur.create');
    Route::post('/fournisseur/{fournisseur}/update',[FournisseurController::class],'update')->name('fournisseur.update');
});

require __DIR__.'/auth.php';
