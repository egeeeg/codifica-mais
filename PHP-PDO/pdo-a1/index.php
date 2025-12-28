<?php
require 'vendor/autoload.php';
session_start();

use App\User;

if (isset($_POST['email'])) {
    $user = new User();
    $result = $user->login($_POST['email'], $_POST['senha']);

    if ($result) {
        $_SESSION['usuario'] = $result;
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "E-mail ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="card">
        <h2>Login</h2>
        <?php if(isset($erro)) echo "<span class='error'>$erro</span>"; ?>
        <form method="POST">
            <label>E-mail</label>
            <input type="email" name="email" value="email@email.com" required>
            
            <label>Senha</label>
            <input type="password" name="senha" placeholder="********" required>
            
            <button type="submit" class="btn-blue">Entrar</button>
        </form>
        <a href="register.php">Crie sua conta</a>
    </div>
</body>
</html>