<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HubController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->is_mestre) {
            return view('hubs.mestre');
        } else {
            // Tenta achar o agente vinculado a este usuário
            $agente = $user->agente;
            return view('hubs.player', compact('agente'));
        }
    }
}