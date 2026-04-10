<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>HUB O.B.M. - Instituto de Forja Tática</title>
    <link rel="stylesheet" href="{{ asset('css/stylehub.css') }}">
</head>
<body>

    <div class="hub-container">
        
        <div class="hub-header">
            <img src="{{ asset('img/logoobm.png') }}" alt="O.B.M." class="logo-hub">
            <h1>SISTEMA CENTRAL I.F.T.</h1>
            <p>Usuário Autenticado: <strong>{{ Auth::user()->name }}</strong></p>
            
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
                @csrf
                <button type="submit" class="btn-sair">ENCERRAR SESSÃO</button>
            </form>
        </div>

        <div class="hub-painel">
            
            @if(Auth::user()->is_mestre)
                <h2 class="titulo-sessao">>> PAINEL DE CONTROLE DO MESTRE</h2>
                <div class="grid-botoes">
                    <a href="{{ route('agentes.index') }}" class="btn-hub mestre">
                        <span class="icone">📋</span> GERENCIAR AGENTES
                    </a>
                    <a href="{{ route('maldicoes.index') }}" class="btn-hub mestre">
                        <span class="icone">💀</span> BESTIÁRIO E ANOMALIAS
                    </a>
                    <a href="{{ route('comidas.index') }}" class="btn-hub mestre">
                        <span class="icone">🍲</span> ESTOQUE DA CANTINA
                    </a>
                </div>

            @else
                <h2 class="titulo-sessao">>> TERMINAL DO AGENTE (Equipe Ponto Cego)</h2>
                <div class="grid-botoes">
                    <a href="#" class="btn-hub jogador" onclick="alert('Em construção: Vai abrir a ficha do agente.')">
                        <span class="icone">🪪</span> MINHA CARTEIRINHA
                    </a>
                    <a href="#" class="btn-hub jogador" onclick="alert('Em construção: Vai abrir o inventário text-area.')">
                        <span class="icone">🎒</span> MEU INVENTÁRIO
                    </a>
                    <a href="{{ route('comidas.index') }}" class="btn-hub jogador">
                        <span class="icone">☕</span> REFEITÓRIO
                    </a>
                </div>
            @endif

        </div>
    </div>

</body>
</html>