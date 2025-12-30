<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware("auth")->group(function () {
    Route::get('/users', [UserController::class, 'index'])
        ->middleware(['role:admin'])
        ->name('page.users');

    Route::get('/user/create', [UserController::class, 'create'])
        ->middleware(['role:admin'])
        ->name('page.user-create');

    Route::post('/user/store', [UserController::class, 'store'])
        ->middleware(['role:admin'])
        ->name('user.store');

        Route::delete('/user/{id}/delete', [UserController::class, 'destroy'])
        ->middleware(['role:admin'])
        ->name('user.delete');

    Route::get('/user/{id}', [UserController::class, 'show'])
        ->middleware(['role:admin'])
        ->name('page.user-detail');


    Route::get('/user/{id}/edit', [UserController::class, 'edit'])
        ->middleware(['role:admin'])
        ->name('page.user-edit');

        Route::post('/user/{id}/update', [UserController::class, 'update'])
        ->middleware(['role:admin'])
        ->name('user.update');
});
