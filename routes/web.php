<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserManagementController;

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

    Route::middleware(['auth', 'role:superadmin'])->group(function () {
        Route::resource('client', ClientController::class)->except(['index', 'show']);
        Route::resource('users', UserManagementController::class)->only(['index', 'edit', 'update']);
    });

    Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
        Route::resource('order', OrderController::class)->except(['index', 'show']);
    });


    Route::middleware(['auth', 'role:superadmin,admin,user'])->group(function () {
        Route::get('client', [ClientController::class, 'index'])->name('client.index');
        Route::get('client/{client}', [ClientController::class, 'show'])->name('client.show');

        Route::get('order', [OrderController::class, 'index'])->name('order.index');
        Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');
    });
});

require __DIR__ . '/auth.php';
