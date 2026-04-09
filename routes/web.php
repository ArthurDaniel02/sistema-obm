<?php

use App\Http\Controllers\AgenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaldicaoController;

Route::get('/', [AgenteController::class, 'index'])->name('agentes.index');
Route::get('/novo', [AgenteController::class, 'create'])->name('agentes.create');
Route::post('/agentes', [AgenteController::class, 'store'])->name('agentes.store');
Route::get('/agentes/{id}/editar', [AgenteController::class,'edit'])->name('agentes.edit');
Route::put('/agentes/{id}', [AgenteController::class, 'update'])->name('agentes.update');
Route::delete('/agentes/{id}', [AgenteController::class, 'destroy'])->name('agentes.destroy');
Route::resource('maldicoes', MaldicaoController::class)->parameters([
    'maldicoes' => 'maldicao'
]);