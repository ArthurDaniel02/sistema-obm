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
            'prefixo' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $dados = $request->all();
        $dados['emissao'] = date('m/Y');

        $prefixo = $request->prefixo;
        $aleatorio = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT); 
        $anoBase = date('y');
        $dados['matricula'] = "OBM-DF-{$prefixo}.{$aleatorio}-{$anoBase}";
        if ($request->hasFile('foto')) {
            $nomeImagem = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/agentes'), $nomeImagem);
            $dados['foto'] = 'img/agentes/' . $nomeImagem;
        }

        \App\Models\Agente::create($dados); 
        return redirect()->route('agentes.index')->with('sucesso', 'Agente registrado no sistema.');
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