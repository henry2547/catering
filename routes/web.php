<?php

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
});

Route::get('/dashboard', [TransactionController::class, 'showDashboard'])->name('dashboard');

// view all transactions
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

// create a new transaction
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

// view a single transaction
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');

// edit a transaction
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');

// delete a transaction
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

require __DIR__.'/auth.php';
