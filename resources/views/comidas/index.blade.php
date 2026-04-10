<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Refeitório I.F.T. - Balcão da Cida</title>
    <link rel="stylesheet" href="{{ asset('css/stylecan/stylec.css') }}">
</head>
<body>

    <div class="cabecalho-cantina">
        <h1>BALCÃO DA DONA CIDA</h1>
        <p class="subtitulo">"Pegue sua bandeja, escolha rápido e não me faça perder tempo."</p>
        
        <div class="botoes-topo">
            <a href="{{ route('comidas.create') }}" class="btn-novo">+ ADICIONAR RECEITA</a>
            <a href="{{ route('agentes.index') }}" class="btn-voltar">← Voltar para o Painel</a>
        </div>
    </div>

    @if(session('sucesso'))
        <div class="alerta-sucesso">
            [✓] {{ session('sucesso') }}
        </div>
    @endif

    <div class="mesa-madeira" style="background-image: url('{{ asset('img/mesa.png') }}'); background-size: cover; background-position: center; box-shadow: inset 0 0 50px rgba(0,0,0,0.8);">
        
        @foreach($comidas as $comida)
            <div class="item-mesa">
                
                <div class="conjunto-prato">
                    <img src="{{ $comida->foto ? asset($comida->foto) : asset('img/sem-imagem-comida.jpg') }}" class="comida-topo" alt="{{ $comida->nome }}">
                    
                    <div class="etiqueta-preco">{{ $comida->preco }} TDC</div>
                </div>

                <div class="tooltip-info">
                    <div class="tooltip-cabecalho">
                        <h3>{{ $comida->nome }}</h3>
                        <span class="badge-tipo">{{ $comida->tipo }}</span>
                    </div>
                    
                    <p class="tooltip-efeito"><strong>Efeito:</strong> {{ $comida->efeito }}</p>

                    <div class="area-compra">
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="comida_id" value="{{ $comida->id }}">
                            <select name="agente_id" class="select-agente" required>
                                <option value="">-- Quem paga? --</option>
                                @foreach($agentes as $agente)
                                    <option value="{{ $agente->id }}">{{ $agente->nome }} ({{ $agente->saldo }} TDC)</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn-servir">SERVIR ITEM</button>
                        </form>
                    </div>

                    <div class="controles-mestre">
                        <a href="{{ route('comidas.edit', $comida->id) }}" class="btn-acao btn-edit">Editar</a>
                        <form action="{{ route('comidas.destroy', $comida->id) }}" method="POST" onsubmit="return confirm('Tirar do menu?');" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-acao btn-del">Lixo</button>
                        </form>
                    </div>
                </div>
                
            </div>
        @endforeach

    </div>

</body>
</html>