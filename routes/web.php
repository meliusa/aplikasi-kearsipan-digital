<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('/users', UserController::class);
    Route::post('/users/update-status/{id}', [UserController::class, 'updateStatus'])->name('users.updateStatus');

    Route::resource('/documents', DocumentController::class);
    Route::get('/get-document-detail/{id}', [DocumentController::class, 'getDocumentDetail']);

    Route::get('/file-managers', [DocumentController::class, 'fileManager'])->name('file-managers.index');
    
    Route::resource('/logs', LogController::class);
});
