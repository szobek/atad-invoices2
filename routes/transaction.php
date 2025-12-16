<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionViewController;
use App\Http\Controllers\ImportController;

Route::get('/transactions', [TransactionViewController::class, 'index'])
    ->middleware('role:admin')
    ->name('pages.transactions');

Route::get('/transactions-to-partner', [TransactionController::class, 'connectPartnerToTransactionView'])
    ->middleware('role:admin,sales')
    ->name('pages.transactions-to-partner');

Route::post('/transactions-to-partner', [TransactionController::class, 'connectPartnerToTransaction'])
    ->middleware('role:admin,sales')
    ->name('transactions-to-partner-save');


Route::get('/transactions2', [TransactionViewController::class, 'index2'])
    ->middleware('role:admin,sales')
    ->name('pages.transactions2');

Route::get('/import-partners', [ImportController::class, 'showPartnerImportForm'])
    ->middleware('role:admin')
    ->name('pages.import.partners');

Route::post('/import-partners', [ImportController::class, 'import'])
    ->middleware('role:admin')
    ->name('post.import.partners');

Route::post('/transactions-disconnect-partner', [TransactionController::class, 'disconnectPartnerFromTransaction'])
    ->middleware('role:admin')
    ->name('transactions-disconnect-partner');

Route::post('/transactions-create', [TransactionController::class, 'createTransaction'])
    ->middleware('role:admin,sales')
    ->name('transactions-create');
