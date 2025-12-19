<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionViewController;


Route::middleware("role:admin,sales")->group(function () {
    Route::get('/transactions', [TransactionViewController::class, 'index'])
        ->name('pages.transactions');

    Route::get('/transactions-to-partner', [TransactionController::class, 'connectPartnerToTransactionView'])
        ->name('pages.transactions-to-partner');

    Route::post('/transactions-to-partner', [TransactionController::class, 'connectPartnerToTransaction'])
        ->name('transactions-to-partner-save');


    Route::get('/transactions2', [TransactionViewController::class, 'index2'])
        ->name('pages.transactions2');

    
    Route::post('/transactions-disconnect-partner', [TransactionController::class, 'disconnectPartnerFromTransaction'])
        ->name('transactions-disconnect-partner');


    Route::get('/transactions-create', [TransactionController::class, 'transactionCreateView'])
        ->name('pages.transactions-create');

    Route::post('/transactions-create', [TransactionController::class, 'createTransaction'])
        ->name('transactions-create');

    Route::get('/invoice/{szamlaszam}', [TransactionController::class, 'getInvoiceByNumber'])
        ->where('szamlaszam', '.*')
        ->name('single-invoice');

    Route::get('/invoices', [TransactionController::class, 'allInvoices'])
        ->name('pages.all-invoices');
});
