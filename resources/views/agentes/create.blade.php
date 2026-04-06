<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>O.B.M. - Registro de Novo Agente</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .form-container { background: #fff; padding: 30px; border-radius: 8px; width: 500px; border: 2px solid #000; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; font-size: 12px; }
        input, select { width: 100%; padding: 8px; border: 1px solid #000; font-family: 'Courier New', monospace; }
        button { background: #000; color: #fff; padding: 10px; width: 100%; cursor: pointer; border: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>FICHA DE ALISTAMENTO - O.B.M.</h2>
        <form action="{{ route('agentes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label>NOME COMPLETO:</label>
                <input type="text" name="nome" required>
            </div>

            <div class="form-group">
                <label>NATUREZA DO REGISTRO:</label>
                <select name="prefixo" required>
                    <option value="409">Derivação Padrão (409)</option>
                    <option value="001">Clãs Fundadores (001)</option>
                    <option value="088">Auditoria Corporativa (088)</option>
                    <option value="104">Transferência Internacional (104)</option>
                    <option value="302">Imigração / Transferência (302)</option>
                    <option value="510">Registro Médico-Tático (510)</option>
                    <option value="616">Anomalia (616)</option>
                    <option value="777">Registro Inato (777)</option>
                    <option value="990">Anomalia Biológica / Híbrido (990)</option>
                </select>
                <p style="font-size: 10px; color: #555; margin-top: 5px;">O sistema gerará o sufixo numérico e o ano base automaticamente.</p>
            </div>

            <div class="form-group">
                <label>TÉCNICA AMALDIÇOADA:</label>
                <input type="text" name="tecnica" placeholder="Ex: Ilimitado" required>
            </div>

            <div class="form-group">
                <label>EQUIPE:</label>
                <select name="equipe">
                    <option value="Ponto Cego">Ponto Cego</option>
                    <option value="Quarentena">Quarentena</option>
                </select>
            </div>

           <div class="form-group">
                <label>CLASSIFICAÇÃO DE GRAU:</label>
                <select name="grau" required>
                    <option value="4">Grau 4</option>
                    <option value="3">Grau 3</option>
                    <option value="2">Grau 2</option>
                    <option value="1">Grau 1</option>
                    <option value="ESPECIAL">Grau Especial</option>
                </select>
            </div>

            <div class="form-group">
                <label>ESPECIALIZAÇÃO:</label>
                <select name="especializacao">
                    <option value="Suporte">Suporte</option>
                    <option value="Lutador">Lutador</option>
                    <option value="Especialista em Técnica">Especialista em Técnica</option>
                    <option value="Especialista em Combate">Especialista em Combate</option>
                    <option value="Controlador">Controlador</option>
                    <option value="Restringido">Restringido</option>
                </select>
            </div>

            <div class="form-group">
                <label>TIPO SANGUÍNEO:</label>
                <input type="text" name="tipo_sanguineo" placeholder="Ex: O-" required>
            </div>

            <div class="form-group">
                <label>FOTO 3X4 (ARQUIVO JPG):</label>
                <input type="file" name="foto">
            </div>

            <button type="submit">GERAR REGISTRO OFICIAL</button>
        </form>
    </div>
</body>
</html>