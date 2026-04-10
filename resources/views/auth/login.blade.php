<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Terminal de Acesso - O.B.M.</title>
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
</head>
<body>

    <div class="login-container">
        <div class="login-box">
            <div class="cabecalho-login">
                <img src="{{ asset('img/logoobm.png') }}" alt="Logo O.B.M." class="logo-login">
                <h1>TERMINAL DE ACESSO</h1>
                <p>INSTITUTO DE FORJA TÁTICA - I.F.T.</p>
            </div>

            @if ($errors->any())
                <div class="alerta-erro">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>CREDENCIAL (E-MAIL):</label>
                    <input type="email" name="email" required placeholder="agente@obm.gov">
                </div>

                <div class="form-group">
                    <label>CÓDIGO DE AUTORIZAÇÃO (SENHA):</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="btn-login">INICIAR SESSÃO</button>
            </form>
            
            <div class="rodape-login">
                <p style="margin-bottom: 15px;">Acesso restrito a pessoal autorizado. O monitoramento é constante.</p>
                
                <a href="{{ route('register') }}" style="color: #cc8800; text-decoration: none; font-weight: bold; font-size: 12px; border: 1px solid #444; padding: 8px 15px; border-radius: 4px; display: inline-block; transition: 0.3s; background: #1a1a1a;" onmouseover="this.style.background='#332200'" onmouseout="this.style.background='#1a1a1a'">
                    NÃO POSSUI CREDENCIAL? SOLICITE ALISTAMENTO
                </a>
            </div>
        </div>
    </div>

</body>
</html>