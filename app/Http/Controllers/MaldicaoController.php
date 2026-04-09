<?php

namespace App\Http\Controllers;

use App\Models\Maldicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class MaldicaoController extends Controller
{
    public function index()
    {
        $maldicoes = Maldicao::all();
        return view('maldicoes.index', compact('maldicoes'));
    }

    public function create()
    {
        return view('maldicoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'grau' => 'required',
            'descricao' => 'required',
            'efeitos' => 'required',
            'neutralizacao' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto')) {
            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/maldicoes'), $nomeImagem);
            $dados['foto'] = 'img/maldicoes/' . $nomeImagem;
        }

        Maldicao::create($dados);

        return redirect()->route('maldicoes.index')->with('sucesso', 'Nova anomalia catalogada no Bestiário do I.F.T.');
    }


    public function show(Maldicao $maldicao)
    {
        return view('maldicoes.show', compact('maldicao'));
    }

    public function edit(Maldicao $maldicao)
    {
        return view('maldicoes.edit', compact('maldicao'));
    }

    public function update(Request $request, Maldicao $maldicao)
    {
        $request->validate([
            'nome' => 'required',
            'grau' => 'required',
            'descricao' => 'required',
            'efeitos' => 'required',
            'neutralizacao' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto')) {
            if ($maldicao->foto && File::exists(public_path($maldicao->foto))) {
                File::delete(public_path($maldicao->foto));
            }

            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/maldicoes'), $nomeImagem);
            $dados['foto'] = 'img/maldicoes/' . $nomeImagem;
        }

        $maldicao->update($dados);

        return redirect()->route('maldicoes.index')->with('sucesso', 'Relatório da anomalia atualizado com sucesso.');
    }

    public function destroy(Maldicao $maldicao)
    {
        if ($maldicao->foto && File::exists(public_path($maldicao->foto))) {
            File::delete(public_path($maldicao->foto));
        }

        $maldicao->delete();

        return redirect()->route('maldicoes.index')->with('sucesso', 'Anomalia expurgada permanentemente dos arquivos.');
    }
}