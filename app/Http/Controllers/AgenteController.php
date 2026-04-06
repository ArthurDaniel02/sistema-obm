<?php
namespace App\Http\Controllers;
use App\Models\Agente;
use Illuminate\Http\Request;

class AgenteController extends Controller
{
    public function index()
    {
        $agentes = Agente::all();
        return view('agentes.index', compact('agentes'));
    }
    public function create()
    {
        return view('agentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:agentes',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $dados = $request->all();
        $dados['emissao'] = date('m/Y');

        if ($request->hasFile('foto')) {
            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/agentes'), $nomeImagem);
            $dados['foto'] = 'img/agentes/' . $nomeImagem;
        }

        \App\Models\Agente::create($dados); 
        return redirect()->route('agentes.index')->with('sucesso', 'Agente registrado no sistema.');
    }
}