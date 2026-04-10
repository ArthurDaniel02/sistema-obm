<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cozinha I.F.T. - Editar Receita</title>
    <link rel="stylesheet" href="{{ asset('css/stylecan/stylec2.css') }}">
</head>
<body>
    <div class="form-container">
        <h2 style="text-align: center; color: #fff; margin-top: 0; border-bottom: 1px dashed #5c5c47; padding-bottom: 15px;">EDITAR RECEITA</h2>
        
        <form action="{{ route('comidas.update', $comida->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>NOME DO PRATO / BEBIDA:</label>
                <input type="text" name="nome" value="{{ $comida->nome }}" required>
            </div>

            <div class="form-group">
                <label>CATEGORIA:</label>
                <select name="tipo" required>
                    <option value="1. Pratos do Dia (Consumo Base)" {{ $comida->tipo == '1. Pratos do Dia (Consumo Base)' ? 'selected' : '' }}>Prato do Dia (Consumo na Base)</option>
                    <option value="2. Infusões e Bebidas" {{ $comida->tipo == '2. Infusões e Bebidas' ? 'selected' : '' }}>Infusões e Bebidas (Florinda)</option>
                    <option value="3. Marmitas e Suprimentos de Campo" {{ $comida->tipo == '3. Marmitas e Suprimentos de Campo' ? 'selected' : '' }}>Marmita (Levar na Mochila)</option>
                </select>
            </div>

            <div class="form-group">
                <label>CUSTO EM TOKENS (TDC):</label>
                <input type="number" name="preco" value="{{ $comida->preco }}" required min="0">
            </div>

            <div class="form-group">
                <label>EFEITOS E BUFFS (Mecânica do RPG):</label>
                <textarea name="efeito" required>{{ $comida->efeito }}</textarea>
            </div>

            <div class="form-group">
                <label>SUBSTITUIR FOTO (Opcional):</label>
                <input type="file" name="foto">
            </div>

            <button type="submit">ATUALIZAR CARDÁPIO</button>
            <a href="{{ route('comidas.index') }}" class="btn-voltar">CANCELAR E VOLTAR</a>
        </form>
    </div>
</body>
</html>