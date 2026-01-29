<?php
$host = 'localhost';
$dbname = 'estoque_p1';
$user = 'root';
$pass = 'Viniccius#13';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

session_start();

function uploadImage($file) {
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid() . "." . $ext;
        move_uploaded_file($file['tmp_name'], "uploads/" . $newName);
        return $newName;
    }
    return null;
}
?>
