<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FournisseurController;

use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

Route::get('/', function () {
    return view('home');
});
// Let Filament handle the admin panel routes (login/dashboard).
// Custom admin routes should be placed under the admin middleware group below.

use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    $user = Auth::user();

    // If not an admin, send them back to the store/home.
    if (! $user || ! method_exists($user, 'isAdmin') || ! $user->isAdmin()) {
        return redirect('/');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // authentification
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/client/orders', [ClientOrderController::class, 'index'])->name('client.orders.index');
    Route::get('/client/orders/{order}', [ClientOrderController::class, 'show'])->name('client.orders.show');
});



Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');
});


// Breeze removed: Filament will handle authentication for the app.
// If you need storefront-specific auth later, add a custom controller + routes.
// require __DIR__.'/auth.php';


// fix admin panel
