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
                <input type="text" name="nome" value="{{ $maldicao->nome }}" required>
            </div>

            <div class="form-group">
                <label>CLASSIFICAÇÃO DE PERICULOSIDADE:</label>
                <select name="grau" required>
                    <option value="Grau 4 (Baixo)" {{ $maldicao->grau == 'Grau 4 (Baixo)' ? 'selected' : '' }}>Grau 4 (Baixo)</option>
                    <option value="Grau 3 (Médio)" {{ $maldicao->grau == 'Grau 3 (Médio)' ? 'selected' : '' }}>Grau 3 (Médio)</option>
                    <option value="Grau 2 (Alto)" {{ $maldicao->grau == 'Grau 2 (Alto)' ? 'selected' : '' }}>Grau 2 (Alto)</option>
                    <option value="Grau 1 (Extremo)" {{ $maldicao->grau == 'Grau 1 (Extremo)' ? 'selected' : '' }}>Grau 1 (Extremo)</option>
                    <option value="Classe Especial" {{ $maldicao->grau == 'Classe Especial' ? 'selected' : '' }}>Classe Especial (Apocalíptico)</option>
                </select>
            </div>

            <div class="form-group">
                <label>DESCRIÇÃO DO RELATÓRIO:</label>
                <textarea name="descricao" required>{{ $maldicao->descricao }}</textarea>
            </div>

            <div class="form-group">
                <label>MANIFESTAÇÃO E EFEITOS (O que faz):</label>
                <textarea name="efeitos" required>{{ $maldicao->efeitos }}</textarea>
            </div>

            <div class="form-group">
                <label>DIRETRIZ DE NEUTRALIZAÇÃO (Fraquezas):</label>
                <textarea name="neutralizacao" required>{{ $maldicao->neutralizacao }}</textarea>
            </div>

            <div class="form-group">
                <label>REGISTRO FOTOGRÁFICO (JPG/PNG):</label>
                <input type="file" name="foto">
            </div>

            <button type="submit">ATUALIZAR ARQUIVO CONFIDENCIAL</button>
            <a href="{{ route('maldicoes.index') }}" class="btn-voltar">CANCELAR E VOLTAR</a>
        </form>
    </div>
</body>
</html>