<?php

use App\Http\Controllers\AgenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaldicaoController;
use App\Http\Controllers\ComidaController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/agentes');
    }
    return redirect('/login');
});
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/gerar-mestre', function () {
    User::create([
        'name' => 'Mestre',
        'email' => 'mestre@obm.gov',
        'password' => Hash::make('cassigoat')
    ]);
    return 'Conta de Mestre criada com sucesso! Apague esta rota do web.php e vá para /login';
});


Route::middleware('auth')->group(function () {
    Route::resource('agentes', AgenteController::class);
    Route::resource('maldicoes', MaldicaoController::class)->parameters(['maldicoes' => 'maldicao']);
    Route::resource('comidas', ComidaController::class)->parameters(['comidas' => 'comida']);
    Route::get('/agentes/{agente}/inventario', [AgenteController::class, 'gerenciarInventario'])->name('agentes.inventario.mestre');
    Route::put('/agentes/{agente}/inventario', [AgenteController::class, 'salvarInventario'])->name('agentes.inventario.salvar');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/hub', function () {
    return view('hub');
})->middleware('auth')->name('hub');