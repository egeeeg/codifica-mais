<?php
namespace App\Config;
use PDO;
use PDOException;

class Database {
    public static function getConnection() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=estoque_db", "root", "Viniccius#13");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro crítico de conexão: " . $e->getMessage());
        }
    }
}
