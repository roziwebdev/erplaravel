<?php

use App\Http\Controllers\Finance\FinanceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('finance')->group(function () {
    Route::get('/', [FinanceController::class, 'index'])->name('finance.index');
    Route::get('/account/create', [FinanceController::class, 'createAccount'])->name('finance.createAccount');
    Route::post('/account/store', [FinanceController::class, 'storeAccount'])->name('finance.storeAccount');
    Route::get('/transaction/create', [FinanceController::class, 'createTransaction'])->name('finance.createTransaction');
    Route::post('/transaction/store', [FinanceController::class, 'storeTransaction'])->name('finance.storeTransaction');
    Route::get('/transaction/{id}', [FinanceController::class, 'showTransaction'])->name('finance.showTransaction');
    Route::delete('/transaction/{id}', [FinanceController::class, 'deleteTransaction'])->name('finance.deleteTransaction');
    Route::get('/report', [FinanceController::class, 'generateBalanceSheet'])->name('finance.generateBalanceSheet');
});


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

require __DIR__.'/auth.php';
