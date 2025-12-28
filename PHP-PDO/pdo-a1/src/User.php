<?php
namespace App;

use App\Connect;
use PDO;

class User {
    public function register($nome, $email, $senha) {
        $conn = Connect::getConn();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "E-mail inválido.";
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', $hash);
            $stmt->execute();
            return true;
        } catch (\PDOException $e) {
            return "Erro: " . $e->getMessage();
        }
    }

    public function login($email, $senha) {
        $conn = Connect::getConn();

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            return $user;
        }
        return false;
    }
}
