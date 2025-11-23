<?php
// routes/web.php

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\PengembanganController;
use App\Http\Controllers\PemantauanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes();

Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DokumenController::class, 'index'])->name('dashboard');
    Route::resource('dokumen', DokumenController::class);

    Route::get('dokumen/{dokuman}/analisis', [AnalisisController::class, 'edit'])->name('analisis.edit');
    Route::post('dokumen/{dokuman}/analisis', [AnalisisController::class, 'update'])->name('analisis.update');
    Route::put('dokumen/{dokuman}/analisis', [\App\Http\Controllers\AnalisisController::class, 'update'])
        ->name('analisis.update');

    Route::get('dokumen/{dokuman}/pengembangan', [PengembanganController::class, 'edit'])->name('pengembangan.edit');
    Route::post('dokumen/{dokuman}/pengembangan', [PengembanganController::class, 'update'])->name('pengembangan.update');
    Route::put('dokumen/{dokuman}/pengembangan', [\App\Http\Controllers\PengembanganController::class, 'update'])
        ->name('pengembangan.update');

    Route::get('dokumen/{dokuman}/pemantauan', [PemantauanController::class, 'edit'])->name('pemantauan.edit');
    Route::post('dokumen/{dokuman}/pemantauan', [PemantauanController::class, 'update'])->name('pemantauan.update');
    Route::put('dokumen/{dokuman}/pemantauan', [\App\Http\Controllers\PemantauanController::class, 'update'])
        ->name('pemantauan.update');

    Route::get('dokumen/{dokuman}/cetak-pdf', [\App\Http\Controllers\DokumenController::class, 'cetakPdf'])
        ->name('dokumen.cetakPdf');
});