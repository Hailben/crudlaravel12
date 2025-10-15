<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController; // Add this line

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/siswa', SiswaController::class);
Route::resource('/kelas', KelasController::class);