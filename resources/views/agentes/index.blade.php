<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O.B.M. - Agentes Ativos</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bodyindex">

    <div class="painel-controle">
        <img src="{{ asset('img/logoobm.png') }}" alt="Logo OBM" class="logoobm">
        <h1>SISTEMA DE REGISTRO DA ORDEM BRASILEIRA DE MAGIA (O.B.M.)</h1>
        <p>DEPARTAMENTO DE TRIAGEM E DESPACHO - DISTRITO FEDERAL</p>
        <br>
        <a href="{{ route('agentes.create') }}" class="btn-novo">+ REGISTRAR NOVO AGENTE</a>
        <a href="{{ route('maldicoes.index') }}" class="btn-novo" style="background-color: #b30000; color: white; border-color: #ff4d4d; margin-left: 15px;"> ABRIR ARQUIVO DE AMEAÇAS (BESTIÁRIO) </a>    
    </div>

    @if(session('sucesso'))
        <div style="color: lime; text-align: center; margin-bottom: 20px;">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="galeria-agentes">
        @foreach($agentes as $agente)
            <div class="container-carteirinhas" id="carteirinha-{{ $agente->id }}">
                
                <div class="carteirinha">
                    <div class="cabecalho">
                        <img src="{{ asset('img/logoobm.png') }}" alt="Carimbo OBM" class="logoobm">
                        <div class="textos-cabecalho">
                                <h1>REPÚBLICA FEDERATIVA DO BRASIL</h1>
                                <h2>ORDEM BRASILEIRA DE MAGIA (O.B.M.)</h2>

                        </div>
                    </div>
                    
                    <div class="conteudo">
                        <div class="bloco-esquerdo">
                            <img src="{{ $agente->foto ? asset($agente->foto) : asset('img/foto-padrao.jpg') }}" alt="Foto do Agente" class="foto-3x4">

                            @if(stripos($agente->equipe, 'quarentena') !== false)
                                <img src="{{ asset('img/qt.png') }}" alt="Carimbo Quarentena" class="carimbo-direita">
                            @else
                                <img src="{{ asset('img/pc.png') }}" alt="Carimbo Equipe PC" class="carimbo-direita">
                            @endif
                        </div>

                        <div class="bloco-direito">
                            <div><strong>NOME:</strong> {{ $agente->nome }}</div>
                            <div><strong>MATRÍCULA:</strong> {{ $agente->matricula }}</div>
                            <div><strong>EQUIPE:</strong> {{ $agente->equipe }}</div>
                            <div><strong>TÉCNICA:</strong> {{ $agente->tecnica }}</div>
                            <div><strong>GRAU:</strong> {{ $agente->grau }}</div> <div><strong>TIPO SANGUÍNEO:</strong> {{ $agente->tipo_sanguineo }}</div>
                            <div><strong>ESPECIALIZAÇÃO:</strong> {{ $agente->especializacao }}</div>
                            <div><strong>EMISSÃO:</strong> {{ $agente->emissao }}</div>
                            
                            @if(stripos($agente->equipe, 'quarentena') !== false)
                                <p><strong>I.V.C.</strong></p>
                            @else
                                <p><strong>I.F.T.</strong></p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="carteirinha-verso">
                    <div class="tarja-magnetica"></div>
                    <div class="conteudo-verso">
                        <div class="aviso-destaque">
                            DOCUMENTO DE PORTE OBRIGATÓRIO EM ÁREAS DE QUARENTENA.
                        </div>
                        
                        <div class="texto-legal">
                            <strong>Autorização:</strong> O portador deste documento possui autoridade federal nível 4 para acesso a cenas de crime, isolamento de áreas civis e neutralização de anomalias classificadas. A obstrução do portador constitui crime federal.
                        </div>
                        
                        <div class="texto-legal">
                            <strong>Diretriz de Óbito:</strong> Em caso de recolhimento deste documento junto a restos mortais, favor devolver à Central de Triagem da O.B.M. (Setor de Autarquias Sul, DF). Não notificar a família civil sob risco de quebra de sigilo mágico.
                        </div>

                        <div class="area-assinaturas">
                            <div class="bloco-assinatura">
                                <div class="linha-assinatura assinatura-portador" style="font-family: 'Brush Script MT', cursive; font-size: 14px;">{{ $agente->nome }}</div>
                                <p>Assinatura do Portador</p>
                            </div>
                            <div class="bloco-assinatura">
                            @if (stripos($agente->equipe, 'quarentena') !== false)
                                <div class="linha-assinatura assinatura-diretor">Oswaldo Peixoto</div>
                                <p>Assinatura do Diretor</p>
                            @else            
                                <div class="linha-assinatura assinatura-diretor">Valter Bigorna</div>
                                <p>Assinatura do Diretor</p>
                            @endif
                                
                                
                            </div>
                        </div>

                        <div class="area-codigo">
                            <img src="{{ asset('img/unnamed.png') }}" alt="Código de Barras" class="codigo-barras">
                        </div>
                    </div>
                </div>

                <div style="text-align: center; margin-top: 15px; display: flex; justify-content: center; gap: 10px;" data-html2canvas-ignore="true">
                    <a href="{{ route('agentes.edit', $agente->id) }}" style="background: #ccc; color: black; padding: 5px 15px; text-decoration: none; font-weight: bold; border: 2px solid black;">EDITAR DADOS</a>
                    
                    <form action="{{ route('agentes.destroy', $agente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja expurgar este agente da O.B.M.? Esta ação é irreversível.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #b30000; color: white; padding: 5px 15px; border: 2px solid black; font-weight: bold; cursor: pointer;">EXPURGAR</button>
                    </form>

                    <button onclick="baixarCarteirinha({{ $agente->id }}, '{{ $agente->nome }}')" style="background: #28a745; color: white; padding: 5px 15px; border: 2px solid black; font-weight: bold; cursor: pointer;">BAIXAR PNG</button>    
                </div>

            </div> @endforeach
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    
    <script>
        function baixarCarteirinha(id, nomeAgente) {
            const elemento = document.getElementById('carteirinha-' + id);
            
            html2canvas(elemento, { 
                backgroundColor: "#2b2b2b", 
                scale: 2
            }).then(canvas => {
                const link = document.createElement('a');
                let nomeArquivo = nomeAgente.toLowerCase().replace(/[^a-z0-9]/g, '-');
                
                link.download = 'obm-' + nomeArquivo + '.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            });
        }
    </script>
</body>
</html>



