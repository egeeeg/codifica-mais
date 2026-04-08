<?php
require 'vendor/autoload.php';
use App\User;

if (isset($_POST['nome'])) {
    if ($_POST['senha'] === $_POST['confirma_senha']) {
        $user = new User();
        $result = $user->register($_POST['nome'], $_POST['email'], $_POST['senha']);
        
        if ($result === true) {
            header("Location: index.php");
            exit;
        } else {
            $erro = $result;
        }
    } else {
        $erro = "As senhas não conferem.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Registro</title>
</head>
<body>
    <div class="card">
        <h2>Registro</h2>
        <?php if(isset($erro)) echo "<span class='error'>$erro</span>"; ?>
        <form method="POST">
            <label>Nome</label>
            <input type="text" name="nome" placeholder="Usuário da Silva" required>

            <label>E-mail</label>
            <input type="email" name="email" placeholder="email@email.com" required>

            <label>Senha</label>
            <input type="password" name="senha" placeholder="********" required>

            <label>Confirmar senha</label>
            <input type="password" name="confirma_senha" placeholder="********" required>
            
            <div style="display:flex; justify-content: space-between; align-items: center; gap: 10px;">
                <a href="index.php" style="margin:0;">Cancelar</a>
                <button type="submit" class="btn-blue">Criar conta</button>
            </div>
        </form>
    </div>
</body>
</html>