<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Dentro do método login()
        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            // Antes ia para 'agentes', agora vai para o 'hub'
            return redirect()->intended('hub'); 
        }

        return back()->withErrors([
            'email' => 'ACESSO NEGADO: Credenciais não reconhecidas pelo I.F.T.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}