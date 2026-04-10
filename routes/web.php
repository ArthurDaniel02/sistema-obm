<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenteController;
use App\Http\Controllers\MaldicaoController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HubController;
use Illuminate\Support\Facades\Auth;

// --- A PORTA DA FRENTE ---
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/hub');
    }
    return redirect('/login');
});

// --- ROTAS ABERTAS (LOGIN E CADASTRO) ---
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// --- ROTAS PROTEGIDAS (SÓ ENTRA SE TIVER LOGADO) ---
Route::middleware('auth')->group(function () {
    
    // O Despachante Central
    Route::get('/hub', [HubController::class, 'index'])->name('hub');
    
    // Rota de sair
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Módulos do Sistema
    Route::resource('agentes', AgenteController::class);
    Route::resource('maldicoes', MaldicaoController::class)->parameters(['maldicoes' => 'maldicao']);
    Route::resource('comidas', ComidaController::class)->parameters(['comidas' => 'comida']);
    
    // Gerenciamento de Inventário (Mestre)
    Route::get('/agentes/{agente}/inventario', [AgenteController::class, 'gerenciarInventario'])->name('agentes.inventario.mestre');
    Route::put('/agentes/{agente}/inventario', [AgenteController::class, 'salvarInventario'])->name('agentes.inventario.salvar');
});