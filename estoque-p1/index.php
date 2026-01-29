<?php
require 'config.php';

// Controle de Sessão
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

// Lógica de CRUD (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'store') {
        $img = uploadImage($_FILES['imagem']);
        $sql = "INSERT INTO produtos (nome, unidade, nota, preco, imagem) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['nome'], $_POST['unidade'], $_POST['nota'], $_POST['preco'], $img]);
        header("Location: index.php");
    } 
    elseif ($action === 'update') {
        $img = uploadImage($_FILES['imagem']);
        $sql = "UPDATE produtos SET nome=?, unidade=?, nota=?, preco=?" . ($img ? ", imagem=?" : "") . " WHERE id=?";
        $params = [$_POST['nome'], $_POST['unidade'], $_POST['nota'], $_POST['preco']];
        if ($img) $params[] = $img;
        $params[] = $id;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        header("Location: index.php");
    }
}

// Ações GET (Delete / Logout)
if ($action === 'delete' && $id) {
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
}

if ($action === 'logout') {
    session_destroy();
    header("Location: login.php");
    exit;
}

// Carrega Views
$view = 'views/list.php';
$productToEdit = null;
if ($action === 'create' || $action === 'edit') {
    $view = 'views/form.php';
    if ($action === 'edit' && $id) {
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        $productToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// Pesquisa
$search = $_GET['search'] ?? '';
$sqlList = "SELECT * FROM produtos WHERE nome LIKE ? ORDER BY id DESC";
$stmtList = $pdo->prepare($sqlList);
$stmtList->execute(["%$search%"]);
$produtos = $stmtList->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <!-- Top Bar Principal -->
    <header class="top-bar">
        <div class="brand-logo">
            <span class="material-icons">inventory_2</span> Estoque
        </div>

        <form action="index.php" method="GET" class="search-box">
            <input type="text" name="search" placeholder="Pesquisar produtos..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit"><span class="material-icons">search</span></button>
        </form>

        <!-- Área do Usuário com Dropdown -->
        <div class="user-controls" id="userMenuBtn">
            <div class="user-profile">
                <span class="material-icons">account_circle</span>
                <?= htmlspecialchars($_SESSION['user_name']) ?>
                <span class="material-icons" style="font-size: 16px;">expand_more</span>
            </div>
            
            <!-- Menu Dropdown -->
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="?action=logout" class="dropdown-item logout">Sair</a>
            </div>
        </div>
    </header>

    <!-- Conteúdo -->
    <main class="content">
        <?php include $view; ?>
    </main>

    <!-- Script Simples para o Menu Dropdown -->
    <script>
        const menuBtn = document.getElementById('userMenuBtn');
        const dropdown = document.getElementById('dropdownMenu');

        menuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdown.classList.toggle('show');
        });

        document.addEventListener('click', function(e) {
            if (!menuBtn.contains(e.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>
</body>
</html>
