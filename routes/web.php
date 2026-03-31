<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Categories
    Route::resource('categories', CategoryController::class);
    // Products
    Route::resource('products', ProductController::class);
    // Kasir
    Route::get('/kasir', [TransactionController::class, 'index'])->name('kasir.index');
    // Transaksi
    Route::post('/kasir/checkout', [TransactionController::class, 'store'])->name('kasir.checkout');
    // Struk
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

});


// ================= CASHIER =================
Route::middleware(['auth', 'role:cashier'])->group(function () {

    // Kasir
    Route::get('/kasir', [TransactionController::class, 'index'])->name('kasir.index');

    // Checkout
    Route::post('/kasir/checkout', [TransactionController::class, 'store'])->name('kasir.checkout');

    // Struk
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');

});

require __DIR__.'/auth.php';
