<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

//Router của admin
Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.address.update');
        Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatarUpdate');

    });
