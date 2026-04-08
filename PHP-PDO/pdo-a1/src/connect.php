<?php
namespace App;

use PDO;
use PDOException;

class Connect {
    private static $host = 'localhost';
    private static $dbname = 'sistema_login';
    private static $user = 'root';
    private static $pass = 'Viniccius#13';

    public static function getConn() {
        try {
            $conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$user, self::$pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}