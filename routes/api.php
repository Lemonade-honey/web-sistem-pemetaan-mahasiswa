<?php

use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('file')->group(function(){
    Route::post('temp-upload', [FileController::class, 'uploadTemp'])->name('api.file-upload');
    Route::delete('temp-revert', [FileController::class, 'revertTemp'])->name('api.file-revert');
});