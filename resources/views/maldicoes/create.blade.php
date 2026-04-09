<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>I.F.T. - Novo Registro de Ameaça</title>
    <link rel="stylesheet" href="{{ asset('css/stylemal/stylem2.css') }}">
</head>
<body>
    <div class="form-container">
        <h2 style="text-align: center; color: #ff4d4d; margin-top: 0; border-bottom: 1px solid #333; padding-bottom: 15px;">CATALOGAR NOVA AMEAÇA</h2>
        
        <form action="{{ route('maldicoes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>NOME DA ANOMALIA / MALDIÇÃO:</label>
                <input type="text" name="nome" required>
            </div>

            <div class="form-group">
                <label>CLASSIFICAÇÃO DE PERICULOSIDADE:</label>
                <select name="grau" required>
                    <option value="Grau 4 (Baixo)">Grau 4 (Baixo)</option>
                    <option value="Grau 3 (Médio)">Grau 3 (Médio)</option>
                    <option value="Grau 2 (Alto)">Grau 2 (Alto)</option>
                    <option value="Grau 1 (Extremo)">Grau 1 (Extremo)</option>
                    <option value="Classe Especial">Classe Especial (Apocalíptico)</option>
                </select>
            </div>

            <div class="form-group">
                <label>DESCRIÇÃO DO RELATÓRIO:</label>
                <textarea name="descricao" required></textarea>
            </div>

            <div class="form-group">
                <label>MANIFESTAÇÃO E EFEITOS (O que faz):</label>
                <textarea name="efeitos" required></textarea>
            </div>

            <div class="form-group">
                <label>DIRETRIZ DE NEUTRALIZAÇÃO (Fraquezas):</label>
                <textarea name="neutralizacao" required></textarea>
            </div>

            <div class="form-group">
                <label>REGISTRO FOTOGRÁFICO (JPG/PNG):</label>
                <input type="file" name="foto">
            </div>

            <button type="submit">SALVAR NO ARQUIVO CONFIDENCIAL</button>
            <a href="{{ route('maldicoes.index') }}" class="btn-voltar">CANCELAR E VOLTAR</a>
        </form>
    </div>
</body>
</html>