<?php
require 'vendor/autoload.php';

use App\Controller\ProdutoController;

session_start();

$controller = new ProdutoController();

$rota = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($rota) {
    case '/':
        $controller->index();
        break;
    case '/salvar':
        $controller->salvar();
        break;
    case '/excluir':
        $id = $_GET['id'] ?? null;
        $controller->excluir($id);
        break;
    default:
        http_response_code(404);
        echo "Página não encontrada (404)";
        break;
}
