<div class="modal-overlay">
    <div class="modal-card">
        <div class="modal-header">
            <h3><?= $productToEdit ? 'EDITAR ITEM' : 'ADICIONAR ITEM' ?></h3>
            <a href="index.php" class="close-btn">X</a>
        </div>

        <!-- Caixa de Erro JavaScript (Invisível até dar erro) -->
        <div id="custom-error-box" class="error-box-js">
            Preencha todos os campos obrigatórios!
        </div>
        
        <!-- 'novalidate' desliga o balão feio do navegador -->
        <form id="product-form" action="?action=<?= $productToEdit ? 'update&id='.$productToEdit['id'] : 'store' ?>" method="POST" enctype="multipart/form-data" novalidate>
            
            <label>Nome do Produto</label>
            <input type="text" name="nome" placeholder="Ex: Parafuso Sextavado" value="<?= $productToEdit['nome'] ?? '' ?>" required>

            <div class="row">
                <div class="col">
                    <label>Unidade (UM)</label>
                    <input type="text" name="unidade" placeholder="UN/KG/L" value="<?= $productToEdit['unidade'] ?? '' ?>" required>
                </div>
                <div class="col">
                    <label>Nota / Obs</label>
                    <input type="text" name="nota" placeholder="Opcional" value="<?= $productToEdit['nota'] ?? '' ?>">
                </div>
            </div>

            <label>Preço ($)</label>
            <input type="number" step="0.01" name="preco" placeholder="0,00" value="<?= $productToEdit['preco'] ?? '' ?>" required>

            <div class="upload-area">
                <label for="file-upload" class="custom-file-upload">
                    <span class="material-icons" style="vertical-align: middle;">cloud_upload</span> 
                    Clique para escolher imagem
                </label>
                <input id="file-upload" type="file" name="imagem" accept="image/*">
                
                <div class="preview-box">
                    <?php if(isset($productToEdit['imagem']) && $productToEdit['imagem']): ?>
                        <img id="image-preview" src="uploads/<?= $productToEdit['imagem'] ?>">
                    <?php else: ?>
                        <img id="image-preview" style="display: none;"> 
                        <span id="icon-placeholder" class="material-icons" style="font-size: 40px; color: #ccc;">image</span>
                    <?php endif; ?>
                </div>
            </div>

            <button type="submit" class="btn-save">Salvar Alterações</button>
        </form>
    </div>
</div>

<script>
    // Preview de Imagem
    document.getElementById('file-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgPreview = document.getElementById('image-preview');
                const iconPlaceholder = document.getElementById('icon-placeholder');
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block';
                if(iconPlaceholder) iconPlaceholder.style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    });

    // Validação Customizada (Substitui a nativa)
    document.getElementById('product-form').addEventListener('submit', function(e) {
        const inputs = this.querySelectorAll('input[required]');
        let hasError = false;
        const errorBox = document.getElementById('custom-error-box');

        // Limpa erros anteriores
        errorBox.style.display = 'none';
        inputs.forEach(input => input.classList.remove('input-error'));

        // Valida campos
        inputs.forEach(input => {
            if (!input.value.trim()) {
                hasError = true;
                input.classList.add('input-error'); // Pinta borda de vermelho
            }
        });

        if (hasError) {
            e.preventDefault(); // Impede o envio
            errorBox.innerText = "Preencha os campos destacados!";
            errorBox.style.display = 'block'; // Mostra a caixa vermelha
        }
    });
</script>
