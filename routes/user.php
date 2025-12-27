<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware("auth")->group(function () {
    Route::get('/users', [UserController::class, 'index'])
        ->middleware(['role:admin'])
        ->name('page.users');

    Route::get('/user/{id}', [UserController::class, 'show'])
        ->middleware(['role:admin'])
        ->name('page.user-detail');
});
