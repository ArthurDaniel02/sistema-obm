<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meu Terminal - {{ $agente->nome }}</title>
    <link rel="stylesheet" href="{{ asset('css/styleplayer.css') }}">
</head>
<body>

    <div class="header-player">
        <h1>TERMINAL DO AGENTE</h1>
        <a href="{{ route('hub') }}" class="btn-voltar">← VOLTAR AO HUB</a>
    </div>

    <div class="container-split">
        
        <div class="coluna-cracha">
            <h2 class="titulo-secao">CREDENCIAL DE IDENTIFICAÇÃO</h2>
            
            <div class="cracha-id">
                <div class="cracha-topo">
                    <img src="{{ asset('img/logoobm.png') }}" alt="O.B.M." class="cracha-logo">
                    <div>
                        <h3>ORDEM BRASILEIRA DE MAGIA</h3>
                        <p>DEPARTAMENTO DE OPERAÇÕES</p>
                    </div>
                </div>
                
                <div class="cracha-corpo">
                    <div class="foto-perfil">
                        <img src="{{ $agente->foto ? asset($agente->foto) : asset('img/sem-foto.jpg') }}" alt="Foto Agente">
                    </div>
                    
                    <div class="dados-agente">
                        <p><strong>NOME:</strong> {{ $agente->nome }}</p>
                        <p><strong>MATRÍCULA:</strong> {{ $agente->matricula }}</p>
                        <p><strong>GRAU:</strong> {{ $agente->grau }}</p>
                        <p><strong>EQUIPE:</strong> {{ mb_strtoupper($agente->equipe) }}</p>
                        <p><strong>TIPO SANGUÍNEO:</strong> {{ $agente->tipo_sanguineo }}</p>
                    </div>
                </div>
                
                <div class="cracha-rodape">
                    <p>ESPECIALIZAÇÃO: {{ mb_strtoupper($agente->especializacao) }}</p>
                    <p>TÉCNICA: {{ mb_strtoupper($agente->tecnica) }}</p>
                </div>
            </div>
            
            <a href="{{ route('agentes.edit', $agente->id) }}" class="btn-editar">ATUALIZAR DADOS DA FICHA</a>
        </div>

        <div class="coluna-inventario">
            <h2 class="titulo-secao">LOGÍSTICA E SUPRIMENTOS</h2>
            
            <div class="painel-saldo">
                <span class="icone-moeda">🪙</span>
                <div class="info-saldo">
                    <span class="label-saldo">FICHAS DE REFEIÇÃO DISPONÍVEIS:</span>
                    <span class="valor-saldo">{{ $agente->saldo }} TDC</span>
                </div>
            </div>

            <div class="painel-mochila">
                <h3>🎒 CONTEÚDO DA MOCHILA</h3>
                <div class="conteudo-texto">
                    @if(empty($agente->inventario))
                        <p style="color: #666; font-style: italic;">Sua mochila está vazia. Visite o refeitório ou fale com o Mestre.</p>
                    @else
                        {!! nl2br(e($agente->inventario)) !!}
                    @endif
                </div>
            </div>
            
            <a href="{{ route('comidas.index') }}" class="btn-cantina">IR PARA O REFEITÓRIO ☕</a>
        </div>

    </div>

</body>
</html>