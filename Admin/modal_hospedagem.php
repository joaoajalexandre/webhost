<div id="modalForm" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Cadastro de Plano de Hospedagem</h2>
        <form id="formPlanoHospedagem">
            <label for="nome_plano">Nome do Plano:</label><br>
            <input type="text" id="nome_plano" name="nome_plano" required><br><br>

            <label for="descricao">Descrição:</label><br>
            <textarea id="descricao" name="descricao"></textarea><br><br>

            <label for="preco_mensal">Preço Mensal:</label><br>
            <input type="number" step="0.01" id="preco_mensal" name="preco_mensal" required><br><br>

            <label for="preco_anual">Preço Anual:</label><br>
            <input type="number" step="0.01" id="preco_anual" name="preco_anual"><br><br>

            <label for="recursos">Recursos:</label><br>
            <textarea id="recursos" name="recursos"></textarea><br><br>

            <label for="status">Status:</label><br>
            <select id="status" name="status" required>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select><br><br>

            <input type="submit" value="Salvar">
        </form>
    </div>
</div>