<?php
namespace App\Controller;
use App\Config\Database;
use PDO;

class ProdutoController {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function index() {
        $busca = $_GET['busca'] ?? '';
        $acao = $_GET['acao'] ?? null;
        $produtoEditar = null;

        $sql = "SELECT * FROM produtos WHERE nome LIKE :busca ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['busca' => "%$busca%"]);
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($acao === 'editar' && isset($_GET['id'])) {
            $stmtEdit = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
            $stmtEdit->execute([$_GET['id']]);
            $produtoEditar = $stmtEdit->fetch(PDO::FETCH_ASSOC);
        }

        require dirname(__DIR__, 2) . '/views/dashboard.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'];
        $unidade = $_POST['unidade'];
        $nota = $_POST['nota'];
        $preco = str_replace(',', '.', $_POST['preco']); 
        
        $imagemNome = $_POST['imagem_atual'] ?? null;
        
        if (!empty($_FILES['imagem']['name'])) {
            $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid() . "." . $ext;
            $destino = __DIR__ . '/../../public/uploads/' . $novoNome;
            
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
                $imagemNome = $novoNome;
            }
        }

        try {
            if ($id) {
                $sql = "UPDATE produtos SET nome=?, unidade=?, nota=?, preco=?, imagem=? WHERE id=?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$nome, $unidade, $nota, $preco, $imagemNome, $id]);
            } else {
                $sql = "INSERT INTO produtos (nome, unidade, nota, preco, imagem) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$nome, $unidade, $nota, $preco, $imagemNome]);
            }
        } catch (\Exception $e) {
            die("Erro ao salvar: " . $e->getMessage());
        }

        header('Location: /');
        exit;
    }

    public function excluir($id) {
        if ($id) {
            $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id = ?");
            $stmt->execute([$id]);
        }
        header('Location: /');
        exit;
    }
}
