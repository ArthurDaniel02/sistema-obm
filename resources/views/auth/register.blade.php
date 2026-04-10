<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alistamento - O.B.M.</title>
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
</head>
<body>

    <div class="login-container">
        <div class="login-box">
            <div class="cabecalho-login">
                <img src="{{ asset('img/logoobm.png') }}" alt="Logo O.B.M." class="logo-login">
                <h1>ALISTAMENTO DE AGENTE</h1>
                <p>INSTITUTO DE FORJA TÁTICA - I.F.T.</p>
            </div>

            @if ($errors->any())
                <div class="alerta-erro">
                    @foreach ($errors->all() as $error)
                        <p style="margin: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>NOME DE REGISTRO:</label>
                    <input type="text" name="name" required placeholder="Ex: Luciano">
                </div>

                <div class="form-group">
                    <label>E-MAIL DE CONTATO:</label>
                    <input type="email" name="email" required placeholder="agente@obm.gov">
                </div>

                <div class="form-group">
                    <label>CRIAR SENHA:</label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label>CONFIRMAR SENHA:</label>
                    <input type="password" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn-login">SOLICITAR CREDENCIAL</button>
            </form>
            
            <div class="rodape-login">
                <a href="{{ route('login') }}" style="color: #888; text-decoration: none;">Já possui credencial? Iniciar Sessão</a>
            </div>
        </div>
    </div>

</body>
</html>