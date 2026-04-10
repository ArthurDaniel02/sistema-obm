<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Inventário - {{ $agente->nome }}</title>
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
</head>
<body>

    <div class="login-container" style="align-items: flex-start; padding-top: 50px;">
        <div class="login-box" style="max-width: 600px; border-top-color: #cc8800;">
            <div class="cabecalho-login">
                <h1 style="color: #cc8800;">GERENCIAR INVENTÁRIO</h1>
                <p>Agente: <strong>{{ $agente->nome }}</strong> ({{ $agente->equipe }})</p>
                <p style="color: #fff; margin-top: 10px;">Saldo Atual: <strong style="color: #00ff00;">{{ $agente->saldo }} TDC</strong></p>
            </div>

            <form action="{{ route('agentes.inventario.salvar', $agente->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label style="color: #cc8800;">CONTEÚDO DA MOCHILA (Texto Livre):</label>
                    <p style="font-size: 11px; color: #888; margin-top: -5px; margin-bottom: 10px;">
                        Digite os itens um abaixo do outro. Você pode colocar quantidades ou condições livremente. O que estiver aqui será exibido na tela do jogador.
                    </p>
                    
                    <textarea name="inventario" style="width: 100%; height: 250px; background: #0a0a0a; border: 1px solid #444; color: #fff; font-family: 'Courier New', monospace; padding: 15px;">{{ $agente->inventario }}</textarea>
                </div>

                <button type="submit" class="btn-login" style="background-color: #cc8800; color: #000;">SALVAR ALTERAÇÕES</button>
            </form>
            
            <a href="{{ route('agentes.index') }}" style="display: block; text-align: center; margin-top: 20px; color: #888; text-decoration: none; font-size: 12px;">← Voltar para a lista de Agentes</a>
        </div>
    </div>

</body>
</html>