<?php
require 'config.php';

$erro = "";
$sucesso = "";

if (isset($_POST['register'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirma_senha'];

    if (empty($nome) || empty($email) || empty($senha)) {
        $erro = "Preencha todos os campos!";
    } elseif ($senha !== $confirmaSenha) {
        $erro = "As senhas não coincidem!";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $erro = "E-mail já cadastrado!";
        } else {
            $hash = password_hash($senha, PASSWORD_DEFAULT);

            try {
                $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$nome, $email, $hash]);
                
                $sucesso = "Conta criada com sucesso! <a href='login.php'>Faça login</a>";
            } catch (PDOException $e) {
                $erro = "Erro ao cadastrar: " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta - Estoque</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    <div class="login-card">
        <h2>Criar Nova Conta</h2>
        
        <?php if($erro): ?>
            <p class="error"><?= $erro ?></p>
        <?php endif; ?>
        
        <?php if($sucesso): ?>
            <p class="success"><?= $sucesso ?></p>
        <?php else: ?>
            <form method="POST">
                <input type="text" name="nome" placeholder="Seu Nome" required value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>">
                <input type="email" name="email" placeholder="E-mail" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
                <input type="password" name="senha" placeholder="Senha" required>
                <input type="password" name="confirma_senha" placeholder="Confirmar Senha" required>
                
                <button type="submit" name="register">Cadastrar</button>
            </form>
        <?php endif; ?>

        <div class="login-footer">
            <a href="login.php">Já tem uma conta? Entrar</a>
        </div>
    </div>
</body>
</html>
