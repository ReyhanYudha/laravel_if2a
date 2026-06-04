<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

// ========== ROUTE BAWAAN ==========
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('tentang');
});

// ========== ROUTE CRUD ==========
Route::resource('fakultas', FakultasController::class)
    ->parameters(['fakultas' => 'fakultas']);

Route::resource('periode', PeriodeController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);

// ========== ROUTE DASHBOARD ==========
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// ========== ROUTE AUTH (BREEZE) ==========
require __DIR__.'/auth.php';