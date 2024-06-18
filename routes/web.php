<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost']);

    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerPost']);
});

Route::prefix('/mahasiswa')->group(function(){
    Route::view('/', 'mahasiswa')->name('mahasiswa-list');
    Route::get('/detail/{uuid}', [MahasiswaController::class, 'detail'])->name('mahasiswa-detail');
});

Route::middleware('auth')->group(function(){

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/my-profile', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/user-file-transkip', [DashboardController::class, 'userTranskipNilaiPost'])->name('user-file-transkip.post');

    Route::post('/user-file', [DashboardController::class, 'userFilePost'])->name('user-file.post');

    Route::post('/user-massage', [DashboardController::class, 'massagePost'])->name('user-massage.post');

    Route::get('/delete-document/{id}', [DashboardController::class, 'deleteFile'])->name('delete.file');
});


// test route
Route::get('/test', [DashboardController::class, 'test']);