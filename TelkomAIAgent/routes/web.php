<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\AuthorizedUserController;

Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/authorized-users', [AuthorizedUserController::class, 'index']);
});

Route::post('/telegram/webhook', [TelegramController::class, 'webhook']);

require __DIR__ . '/auth.php';
