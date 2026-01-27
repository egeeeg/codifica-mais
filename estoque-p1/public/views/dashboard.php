<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>

    <aside>
        <div class="menu-header">≡</div>
        <div class="menu-item">° controle de estoque</div>
        <a href="/" class="menu-item active">° estoque</a>
    </aside>

    <main>
        <header>
            <h2>CONTROLE DE ESTOQUE</h2>
            <div class="user-icon">homemsegredo 👤</div>
        </header>

        <div class="content">
            <div class="toolbar">
                <form action="/" method="GET">
                    <input type="text" name="busca" class="search-bar" placeholder="alguma coisa 🔍" value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>">
                </form>
                <a href="/?acao=novo" class="btn-add">+ 🛒</a>
            </div>

            <div class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>NOME</th>
                            <th>UM</th>
                            <th>NOTA</th>
                            <th>PREÇO</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($produtos)): ?>
                            <tr><td colspan="5" style="text-align:center">Nenhum produto cadastrado.</td></tr>
                        <?php else: ?>
                            <?php foreach($produtos as $p): ?>
                            <tr>
                                <td><?= htmlspecialchars($p['nome']) ?></td>
                                <td><?= htmlspecialchars($p['unidade']) ?></td>
                                <td><?= htmlspecialchars($p['nota']) ?></td>
                                <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                                <td class="actions">
                                    <a href="/?acao=editar&id=<?= $p['id'] ?>">✏️</a>
                                    <a href="/excluir?id=<?= $p['id'] ?>" onclick="return confirm('Tem certeza?')">🗑️</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- MODAL POPUP -->
    <?php if ($acao == 'novo' || $acao == 'editar'): ?>
    <div class="modal-overlay">
        <div class="modal">
            <div class="modal-top">
                <span><?= $produtoEditar ? 'EDITAR' : 'NOVO ITEM' ?></span>
                <a href="/" class="close-modal">X</a>
            </div>
            <div class="modal-body">
                <form action="/salvar" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $produtoEditar['id'] ?? '' ?>">
                    <input type="hidden" name="imagem_atual" value="<?= $produtoEditar['imagem'] ?? '' ?>">

                    <div class="input-group">
                        <label>NOME</label>
                        <input type="text" name="nome" class="input-control" value="<?= $produtoEditar['nome'] ?? '' ?>" required>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <div class="input-group" style="width: 30%">
                            <label>UM</label>
                            <select name="unidade" class="input-control">
                                <option value="UN">UN</option>
                                <option value="KG">KG</option>
                                <option value="LT">LT</option>
                            </select>
                        </div>
                        <div class="input-group" style="flex: 1">
                            <label>PREÇO</label>
                            <input type="text" name="preco" class="input-control" value="<?= $produtoEditar['preco'] ?? '' ?>" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <label>NOTA</label>
                        <input type="text" name="nota" class="input-control" value="<?= $produtoEditar['nota'] ?? '' ?>">
                    </div>

                    <button type="submit" class="btn-save">SALVAR</button>
                    <div style="clear: both;"></div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>

</body>
</html>
