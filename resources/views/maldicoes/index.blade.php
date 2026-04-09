<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>I.F.T. - Enciclopédia de Maldições</title>
    <link rel="stylesheet" href="{{ asset('css/stylemal/stylem.css') }}">
</head>
<body>

    <div class="cabecalho-bestiario">
        <img src="{{ asset('img/caveira.png') }}" alt="caveira" class="caveira">
        <h1>ARQUIVO CONFIDENCIAL: ANOMALIAS E MALDIÇÕES</h1>
        <p>Acesso restrito a Agentes de Grau 3 ou superior. O vazamento destas informações constitui traição à O.B.M.</p>
        <a href="{{ route('maldicoes.create') }}" class="btn-novo">+ CATALOGAR NOVA AMEAÇA</a>
        <a href="{{ route('agentes.index') }}" class="btn-voltar">← Voltar para o Sistema de Agentes</a>
    </div>

    @if(session('sucesso'))
        <div style="color: #ff4d4d; text-align: center; margin-bottom: 20px; border: 1px solid #ff4d4d; padding: 10px;">
            AVISO DO SISTEMA: {{ session('sucesso') }}
        </div>
    @endif

    <div class="grid-maldicoes">
        @foreach($maldicoes as $maldicao)
            <div class="card-maldicao">
                <div class="conteudo-card">
                    <div class="foto-container">
                        <img src="{{ $maldicao->foto ? asset($maldicao->foto) : asset('img/sem-imagem-maldicao.jpg') }}" alt="Foto da Ameaça">
                    </div>
                    
                    <div class="dados-maldicao">
                        <h2>{{ $maldicao->nome }}</h2>
                        <div class="badge-grau">PERICULOSIDADE: {{ $maldicao->grau }}</div>
                        
                        <div class="campo-texto">
                            <span class="label">Descrição do Relatório:</span>
                            {{ $maldicao->descricao }}
                        </div>
                        
                        <div class="campo-texto">
                            <span class="label">Manifestação de Poder / Efeitos:</span>
                            <span style="color: #ffb3b3;">{{ $maldicao->efeitos }}</span>
                        </div>

                        <div class="alerta-neutralizacao">
                            <span class="label" style="color: #ff4d4d;">DIRETRIZ DE NEUTRALIZAÇÃO:</span>
                            {{ $maldicao->neutralizacao }}
                        </div>
                    </div>
                </div>

                <div class="controles-card">
                    <a href="{{ route('maldicoes.edit', $maldicao->id) }}" class="btn-acao" style="background: #333; color: white; border: 1px solid #666;">EDITAR RELATÓRIO</a>
                    
                    <form action="{{ route('maldicoes.destroy', $maldicao->id) }}" method="POST" onsubmit="return confirm('Deseja realmente expurgar este registro do Bestiário?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-acao" style="background: #b30000; color: white; border: 1px solid #ff4d4d;">DELETAR ARQUIVO</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>