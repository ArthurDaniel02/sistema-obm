<?php

use App\Http\Controllers\AgenteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AgenteController::class, 'index'])->name('agentes.index');
Route::get('/novo', [AgenteController::class, 'create'])->name('agentes.create');
Route::post('/agentes', [AgenteController::class, 'store'])->name('agentes.store');