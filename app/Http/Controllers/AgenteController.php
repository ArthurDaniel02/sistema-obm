<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Models\Agente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AgenteController extends Controller
{
    public function index()
    {
        // Se for o Mestre, ele vê a lista com TODOS os agentes
        if (\Illuminate\Support\Facades\Auth::user()->is_mestre) {
            $agentes = Agente::all();
            return view('agentes.index_mestre', compact('agentes'));
        } 
        // Se for o Jogador, ele vê só a própria carteirinha e inventário
        else {
            $agente = \Illuminate\Support\Facades\Auth::user()->agente;
            
            // Se o jogador ainda não criou a ficha, manda ele criar
            if (!$agente) {
                return redirect()->route('agentes.create')->with('aviso', 'Crie sua ficha de Agente para acessar o sistema.');
            }

            return view('agentes.index_player', compact('agente'));
        }
    }
    public function create()
    {
        return view('agentes.create');
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        
        // 1. Liga a ficha ao ID do usuário que está logado
        $dados['user_id'] = \Illuminate\Support\Facades\Auth::id();

        // 2. GERAÇÃO AUTOMÁTICA DE MATRÍCULA E EMISSÃO
        // Pega o 'prefixo' que veio do form (ex: 409) e adiciona um código único de 4 dígitos
        $prefixo = $request->input('prefixo', 'OBM'); 
        $dados['matricula'] = $prefixo . '-' . rand(1000, 9999);
        
        // Carimba a emissão com a data de hoje (Ex: 09/04/2026)
        $dados['emissao'] = date('d/m/Y');

        // 3. Tratamento da foto
        if ($request->hasFile('foto')) {
            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/agentes'), $nomeImagem);
            $dados['foto'] = 'img/agentes/' . $nomeImagem;
        }

        Agente::create($dados);

        // Depois de criar a ficha, manda ele de volta pro Hub!
        return redirect()->route('hub')->with('sucesso', 'Ficha de Agente registrada e Credencial gerada com sucesso!');
    }
    public function edit($id)
    {
        $agente = \App\Models\Agente::findOrFail($id);
        return view('agentes.edit',compact('agente'));
    }

    public function update(Request $request,$id)
    {
        $agente = \App\Models\Agente::findOrFail($id);

        $dados = $request->except(['_token','_method']);

        if($request->hasFile('foto')){
            $nomeImagem = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('public/img/agentes'), $nomeImagem);
            $dados['foto'] = 'public/img/agentes/' . $nomeImagem;
        }

        $agente->update($dados);
        return redirect()->route('agentes.index')->with('sucesso','Registro do agente atualizado');

    }

    public function destroy($id)
    {
        $agente = \App\Models\Agente::findOrFail($id);
        $agente->delete();

        return redirect()->route('agentes.index')->with('sucesso', 'Agente expurgado do sistema oficial.');
    }

public function gerenciarInventario(Agente $agente)
    {
        // Garante que só o Mestre acessa essa tela
        if (!Auth::user()->is_mestre) {
            abort(403, 'Acesso Negado. Você não é um Mestre da O.B.M.');
        }

        return view('agentes.inventario_mestre', compact('agente'));
    }

    public function salvarInventario(Request $request, Agente $agente)
    {
        if (!Auth::user()->is_mestre) {
            abort(403);
        }

        // Atualiza diretamente o campo de texto do inventário
        $agente->inventario = $request->input('inventario');
        $agente->save();

        return redirect()->route('agentes.index')->with('sucesso', 'Inventário de ' . $agente->nome . ' atualizado pelo Mestre.');
    }
}