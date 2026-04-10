<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cozinha I.F.T. - Nova Receita</title>
    <link rel="stylesheet" href="{{ asset('css/stylecan/stylec2.css') }}">
</head>
<body>
    <div class="form-container">
        <h2 style="text-align: center; color: #fff; margin-top: 0; border-bottom: 1px dashed #5c5c47; padding-bottom: 15px;">NOVA RECEITA DA CIDA</h2>
        
        <form action="{{ route('comidas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label>NOME DO PRATO / BEBIDA:</label>
                <input type="text" name="nome" required placeholder="Ex: Feijoada Intransponível">
            </div>

            <div class="form-group">
                <label>CATEGORIA:</label>
                <select name="tipo" required>
                    <option value="1. Pratos do Dia (Consumo Base)">Prato do Dia (Consumo na Base)</option>
                    <option value="2. Infusões e Bebidas">Infusões e Bebidas (Florinda)</option>
                    <option value="3. Marmitas e Suprimentos de Campo">Marmita (Levar na Mochila)</option>
                </select>
            </div>

            <div class="form-group">
                <label>CUSTO EM TOKENS (TDC):</label>
                <input type="number" name="preco" required min="0" placeholder="Ex: 2">
            </div>

            <div class="form-group">
                <label>EFEITOS E BUFFS (Mecânica do RPG):</label>
                <textarea name="efeito" required placeholder="Ex: Recebe +10 PV Temporários para a missão..."></textarea>
            </div>

            <div class="form-group">
                <label>FOTO DO PRATO (Opcional):</label>
                <input type="file" name="foto">
            </div>

            <button type="submit">COLOCAR NO CARDÁPIO</button>
            <a href="{{ route('comidas.index') }}" class="btn-voltar">CANCELAR E VOLTAR</a>
        </form>
    </div>
</body>
</html>