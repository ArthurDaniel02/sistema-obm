<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>O.B.M. - Atualização de Agente</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
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
            @method('PUT') 
            <div class="form-container">
        <h2 style="text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px;">REVISÃO DE FICHA - O.B.M.</h2>
        
        <form action="{{ route('agentes.update', $agente->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 
            
            <div class="form-group">
                <label>NOME COMPLETO:</label>
                <input type="text" name="nome" value="{{ $agente->nome }}" required>
            </div>

            <div class="form-group">
                <label>MATRÍCULA DO SISTEMA (Imutável):</label>
                <input type="text" name="matricula" value="{{ $agente->matricula }}" readonly style="background-color: #e0e0e0; color: #555; cursor: not-allowed;">
            </div>
                
            <div class="form-group">
                <label>TÉCNICA AMALDIÇOADA:</label>
                <input type="text" name="tecnica" value="{{ $agente->tecnica }}" required>
            </div>

            <div class="form-group">
                <label>EQUIPE:</label>
                <select name="equipe">
                    <option value="Ponto Cego" {{ $agente->equipe == 'Ponto Cego' ? 'selected' : '' }}>Ponto Cego</option>
                    <option value="Quarentena" {{ $agente->equipe == 'Quarentena' ? 'selected' : '' }}>Quarentena</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>CLASSIFICAÇÃO DE GRAU:</label>
                <select name="grau" required>
                    <option value="4" {{ $agente->grau == '4' ? 'selected' : '' }}>Grau 4</option>
                    <option value="3" {{ $agente->grau == '3' ? 'selected' : '' }}>Grau 3</option>
                    <option value="2" {{ $agente->grau == '2' ? 'selected' : '' }}>Grau 2</option>
                    <option value="1" {{ $agente->grau == '1' ? 'selected' : '' }}>Grau 1</option>
                    <option value="ESPECIAL" {{ $agente->grau == 'ESPECIAL' ? 'selected' : '' }}>Grau Especial</option>
                </select>
            </div>

            <div class="form-group">
                <label>ESPECIALIZAÇÃO:</label>
                <select name="especializacao">
                    <option value="Suporte" {{ $agente->especializacao == 'Suporte' ? 'selected' : '' }}>Suporte</option>
                    <option value="Lutador" {{ $agente->especializacao == 'Lutador' ? 'selected' : '' }}>Lutador</option>
                    <option value="Especialista em Técnica" {{ $agente->especializacao == 'Especialista em Técnica' ? 'selected' : '' }}>Especialista em Técnica</option>
                    <option value="Especialista em Combate" {{ $agente->especializacao == 'Especialista em Combate' ? 'selected' : '' }}>Especialista em Combate</option>
                    <option value="Controlador" {{ $agente->especializacao == 'Controlador' ? 'selected' : '' }}>Controlador</option>
                    <option value="Restringido" {{ $agente->especializacao == 'Restringido' ? 'selected' : '' }}>Restringido</option>
                </select>
            </div>

            <div class="form-group">
                <label>TIPO SANGUÍNEO:</label>
                <input type="text" name="tipo_sanguineo" value="{{ $agente->tipo_sanguineo }}" required>
            </div>

            <div class="form-group">
                <label>ATUALIZAR FOTO 3X4 (ARQUIVO JPG):</label>
                <input type="file" name="foto">
            </div>

            <button type="submit">ATUALIZAR REGISTRO OFICIAL</button>
            <a href="{{ route('agentes.index') }}" class="btn-voltar">CANCELAR E VOLTAR AO ARQUIVO</a>
        </form>
    </div>
</body>
</html>
