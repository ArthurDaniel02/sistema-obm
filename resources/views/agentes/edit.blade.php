<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>O.B.M. - Atualização de Agente</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { background-color: #2b2b2b; font-family: 'Courier New', Courier, monospace; display: flex; justify-content: center; padding: 50px; }
        .form-container { background: #fff; padding: 30px; border-radius: 8px; width: 500px; border: 2px solid #000; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; font-size: 12px; }
        input, select { width: 100%; padding: 8px; border: 1px solid #000; font-family: 'Courier New', monospace; box-sizing: border-box; }
        button { background: #000; color: #fff; padding: 10px; width: 100%; cursor: pointer; border: none; font-weight: bold; margin-top: 10px; }
        .btn-voltar { display: block; text-align: center; margin-top: 15px; color: #000; text-decoration: underline; font-weight: bold; font-size: 12px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 style="text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px;">REVISÃO DE FICHA - O.B.M.</h2>
        
        <form action="{{ route('agentes.update', $agente->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="form-group">
                <label>NOME COMPLETO:</label>
                <input type="text" name="nome" value="{{ $agente->nome }}" required>
            </div>

            <div class="form-group">
                <label>MATRÍCULA:</label>
                <input type="text" name="matricula" value="{{ $agente->matricula }}" required>
            </div>

            <div class="form-group">
                <label>EQUIPE TÁTICA:</label>
                <input type="text" name="equipe" value="{{ $agente->equipe }}" required>
            </div>

            <div class="form-group">
                <label>CLASSIFICAÇÃO DE GRAU:</label>
                <select name="grau" required>
                    <option value="4" {{ $agente->grau == '4' ? 'selected' : '' }}>Grau 4 (Baixa Ameaça)</option>
                    <option value="3" {{ $agente->grau == '3' ? 'selected' : '' }}>Grau 3</option>
                    <option value="2" {{ $agente->grau == '2' ? 'selected' : '' }}>Grau 2</option>
                    <option value="1" {{ $agente->grau == '1' ? 'selected' : '' }}>Grau 1 (Alta Ameaça)</option>
                    <option value="ESPECIAL" {{ $agente->grau == 'ESPECIAL' ? 'selected' : '' }}>Classe Especial</option>
                </select>
            </div>

            <div class="form-group">
                <label>ESPECIALIZAÇÃO TÁTICA:</label>
                <select name="especializacao">
                    <option value="Suporte" {{ $agente->especializacao == 'Suporte' ? 'selected' : '' }}>Suporte</option>
                    <option value="Supressão" {{ $agente->especializacao == 'Supressão' ? 'selected' : '' }}>Supressão</option>
                    <option value="Infiltração" {{ $agente->especializacao == 'Infiltração' ? 'selected' : '' }}>Infiltração</option>
                    <option value="Investigação" {{ $agente->especializacao == 'Investigação' ? 'selected' : '' }}>Investigação</option>
                </select>
            </div>

            <div class="form-group">
                <label>TIPO SANGUÍNEO:</label>
                <input type="text" name="tipo_sanguineo" value="{{ $agente->tipo_sanguineo }}" required>
            </div>

            <div class="form-group">
                <label>FOTO 3X4 (ARQUIVO JPG):</label>
                <input type="file" name="foto">
                <p style="font-size: 10px; margin-top: 5px; color: #555;">Deixe em branco para manter a foto atual do sistema.</p>
            </div>

            <button type="submit">SALVAR ALTERAÇÕES NO REGISTRO</button>
            <a href="{{ route('agentes.index') }}" class="btn-voltar">CANCELAR E VOLTAR AO ARQUIVO</a>
        </form>
    </div>
</body>
</html>