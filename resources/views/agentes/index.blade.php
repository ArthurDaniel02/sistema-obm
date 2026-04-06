<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquivo da O.B.M. - Agentes Ativos</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .painel-controle {
            text-align: center;
            margin-bottom: 40px;
            color: white;
        }
        .btn-novo {
            background-color: white;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            border: 2px solid black;
        }
        .galeria-agentes {
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            justify-content: center;
        }
    </style>
</head>
<body>

    <div class="painel-controle">
        <img src="{{ asset('public/img/logoobm.png') }}" alt="Logo OBM" class="logoobm">
        <h1>SISTEMA DE REGISTRO DA ORDEM BRASILEIRA DE MAGIA (O.B.M.)</h1>
        <p>DEPARTAMENTO DE TRIAGEM E DESPACHO - DISTRITO FEDERAL</p>
        <br>
        <a href="{{ route('agentes.create') }}" class="btn-novo">+ REGISTRAR NOVO AGENTE</a>
    </div>

    @if(session('sucesso'))
        <div style="color: lime; text-align: center; margin-bottom: 20px;">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="galeria-agentes">
        @foreach($agentes as $agente)
            <div class="container-carteirinhas">
                
                <div class="carteirinha">
                    <div class="cabecalho">
                        <img src="{{ asset('img/obm.png') }}" alt="Logo OBM" class="logoobm">
                        <div class="textos-cabecalho">
                            <h1>REPÚBLICA FEDERATIVA DO BRASIL</h1>
                            <h2>ORDEM BRASILEIRA DE MAGIA (O.B.M.)</h2>
                            <p>INSTITUTO DE FORJA TÁTICA - I.F.T.</p>
                        </div>
                    </div>

                    <div class="conteudo">
                        <div class="bloco-esquerdo">
                            <img src="{{ $agente->foto ? asset($agente->foto) : asset('img/foto-padrao.jpg') }}" alt="Foto do Agente" class="foto-3x4">
                        </div>

                        <div class="bloco-direito">
                            <div><strong>NOME:</strong> {{ $agente->nome }}</div>
                            <div><strong>MATRÍCULA:</strong> {{ $agente->matricula }}</div>
                            <div><strong>EQUIPE:</strong> {{ $agente->equipe }}</div>
                            <div><strong>GRAU:</strong> {{ $agente->grau }}</div>
                            <div><strong>TIPO SANGUÍNEO:</strong> {{ $agente->tipo_sanguineo }}</div>
                            <div><strong>ESPECIALIZAÇÃO:</strong> {{ $agente->especializacao }}</div>
                            <div><strong>EMISSÃO:</strong> {{ $agente->emissao }}</div>
                        </div>
                        
                        <img src="{{ asset('img/pc.png') }}" alt="Carimbo Equipe PC" class="carimbo carimbo-direita">
                    </div>
                </div>

                <div class="carteirinha carteirinha-verso">
                    <div class="tarja-magnetica"></div>
                    <div class="conteudo-verso">
                        <div class="aviso-destaque">DOCUMENTO DE PORTE OBRIGATÓRIO EM ÁREAS DE QUARENTENA.</div>
                        <div class="texto-legal"><strong>Autorização:</strong> O portador deste documento possui autoridade federal nível 4 para acesso a cenas de crime...</div>
                        <div class="texto-legal"><strong>Diretriz de Óbito:</strong> Em caso de recolhimento deste documento junto a restos mortais, favor devolver à Central de Triagem...</div>
                        <div class="area-assinaturas">
                            <div class="bloco-assinatura">
                                <div class="linha-assinatura"></div><p>Assinatura do Portador</p>
                            </div>
                            <div class="bloco-assinatura">
                                <div class="linha-assinatura assinatura-diretor">Valter Bigorna</div><p>Diretor Responsável</p>
                            </div>
                        </div>
                        <div class="area-codigo">
                            <img src="{{ asset('img/codigo-barras.png') }}" alt="Código de Barras" class="codigo-barras">
                        </div>
                    </div>
                </div>

            </div>
            
            <div style="text-align: center; margin-top: 15px; display: flex; justify-content: center; gap: 10px;">
                <a href="{{ route('agentes.edit', $agente->id) }}" style="background: #ccc; color: black; padding: 5px 15px; text-decoration: none; font-weight: bold; border: 2px solid black;">EDITAR DADOS</a>
                
                <form action="{{ route('agentes.destroy', $agente->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja expurgar este agente da O.B.M.? Esta ação é irreversível.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: #b30000; color: white; padding: 5px 15px; border: 2px solid black; font-weight: bold; cursor: pointer;">EXPURGAR</button>
                </form>
            </div>
            @endforeach
    </div>

</body>
</html>