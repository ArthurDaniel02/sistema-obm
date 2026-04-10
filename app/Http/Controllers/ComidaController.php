<?php

namespace App\Http\Controllers;

use App\Models\Comida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ComidaController extends Controller
{
    public function index()
    {
        $comidas = Comida::orderBy('tipo')->get();
        $agentes = \App\Models\Agente::all(); 
        return view('comidas.index', compact('comidas', 'agentes'));
    }

    public function create()
    {
        return view('comidas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'preco' => 'required|numeric',
            'efeito' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto')) {
            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/comidas'), $nomeImagem);
            $dados['foto'] = 'img/comidas/' . $nomeImagem;
        }

        Comida::create($dados);

        return redirect()->route('comidas.index')->with('sucesso', 'Novo item adicionado ao cardápio da Dona Cida!');
    }

    public function edit(Comida $comida)
    {
        return view('comidas.edit', compact('comida'));
    }

    public function update(Request $request, Comida $comida)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'preco' => 'required|numeric',
            'efeito' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto')) {
            if ($comida->foto && File::exists(public_path($comida->foto))) {
                File::delete(public_path($comida->foto));
            }

            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/comidas'), $nomeImagem);
            $dados['foto'] = 'img/comidas/' . $nomeImagem;
        }

        $comida->update($dados);

        return redirect()->route('comidas.index')->with('sucesso', 'Receita atualizada com sucesso.');
    }

    public function destroy(Comida $comida)
    {
        if ($comida->foto && File::exists(public_path($comida->foto))) {
            File::delete(public_path($comida->foto));
        }

        $comida->delete();

        return redirect()->route('comidas.index')->with('sucesso', 'Item removido do cardápio.');
    }
}