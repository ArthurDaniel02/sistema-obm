<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alojamento - Agente</title>
    <link rel="stylesheet" href="{{ asset('css/stylehub.css') }}">
</head>
<body>

    <div class="hub-container">
        <div class="hub-header">
            <img src="{{ asset('img/logoobm.png') }}" alt="O.B.M." class="logo-hub">
            <h1>TERMINAL INDIVIDUAL DO AGENTE</h1>
            <p>Operador: <strong style="color: #4d94ff;">{{ Auth::user()->name }}</strong></p>
            
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 15px;">
                @csrf
                <button type="submit" class="btn-sair">DESCONECTAR</button>
            </form>
        </div>

        <div class="hub-painel">
            
            @if($agente)
                <h2 class="titulo-sessao">>> ACESSO AUTORIZADO: EQUIPE {{ mb_strtoupper($agente->equipe) }}</h2>
                <div class="grid-botoes">
                    <a href="{{ route('agentes.index') }}" class="btn-hub jogador">
                        <span class="icone">📋</span> MINHA FICHA
                    </a>
                    
                    <a href="{{ route('agentes.index') }}" class="btn-hub jogador">
                        <span class="icone">🎒</span> MOCHILA
                    </a>
                    
                    <a href="{{ route('comidas.index') }}" class="btn-hub jogador">
                        <span class="icone">☕</span> REFEITÓRIO
                    </a>
                </div>
            @else
                <div style="text-align: center; padding: 30px;">
                    <h2 style="color: #ffcc00;">⚠ FICHA DE AGENTE NÃO ENCONTRADA</h2>
                    <p style="color: #888; margin-bottom: 20px;">Você precisa cadastrar seus dados de combate no sistema antes de assumir missões.</p>
                    <a href="{{ route('agentes.create') }}" style="background: #cc8800; color: #000; padding: 10px 20px; text-decoration: none; font-weight: bold; border-radius: 4px;">CRIAR FICHA DE AGENTE</a>
                </div>
            @endif

        </div>
    </div>

</body>
</html>