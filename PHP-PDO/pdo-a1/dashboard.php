<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
$nome = $_SESSION['usuario']['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Painel</title>
</head>
<body>
    <div class="card">
        <h2>Painel</h2>
        <p>Olá, <?php echo htmlspecialchars($nome); ?>.<br>Você está logado.</p>
        
        <form action="logout.php" method="POST">
            <button type="submit" class="btn-red">Deslogar</button>
        </form>
    </div>
</body>
</html>