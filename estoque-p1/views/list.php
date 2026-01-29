<div class="page-header">
    <h2>CONTROLE DE ESTOQUE</h2>
    <a href="?action=create" class="btn-add"><span class="material-icons">add_box</span></a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th style="width: 30px;"></th>
                <th>nome</th>
                <th>UM</th>
                <th>NOTA</th>
                <th>PREÇO</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $p): ?>
            <tr>
                <td>
                    <?php if($p['imagem']): ?>
                        <img src="uploads/<?= $p['imagem'] ?>" class="thumb-img">
                    <?php else: ?>
                        <div class="checkbox-mock"></div>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($p['nome']) ?></td>
                <td><?= htmlspecialchars($p['unidade']) ?></td>
                <td><?= htmlspecialchars($p['nota']) ?></td>
                <td>$<?= number_format($p['preco'], 2, ',', '.') ?></td>
                <td class="actions">
                    <a href="?action=edit&id=<?= $p['id'] ?>" class="icon-btn"><span class="material-icons">more_horiz</span></a>
                    <a href="?action=delete&id=<?= $p['id'] ?>" onclick="return confirm('Excluir?')" class="icon-btn delete"><span class="material-icons">delete</span></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
