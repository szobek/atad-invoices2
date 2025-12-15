<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/import-partners', [App\Http\Controllers\ImportController::class, 'showPartnerImportForm'])->name('pages.import.partners');
    Route::post('/import-partners', [App\Http\Controllers\ImportController::class, 'import'])->name('post.import.partners');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/transactions', [App\Http\Controllers\TransactionViewController::class, 'index'])
        ->middleware('role:admin')
        ->name('pages.transactions');
        
    Route::get('/transactions-to-partner', [App\Http\Controllers\TransactionController::class, 'connectPartnerToTransactionView'])
        ->middleware('role:admin,sales')
        ->name('pages.transactions-to-partner');
        
    Route::post('/transactions-to-partner', [App\Http\Controllers\TransactionController::class, 'connectPartnerToTransaction'])
        ->middleware('role:admin,sales')
        ->name('transactions-to-partner-save');


    Route::get('/transactions2', [App\Http\Controllers\TransactionViewController::class, 'index2'])
        ->middleware('role:admin,sales')
        ->name('pages.transactions2');
});

require __DIR__.'/auth.php';
