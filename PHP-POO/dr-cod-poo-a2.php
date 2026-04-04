<?php

class Produto {
    private $nome;
    private $preco;
    private $quantidade;

    public function __construct($nome, $preco, $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = ($quantidade >= 0) ? $quantidade : 0;
    }

    public function alterarPreco($novoPreco) {
        if ($novoPreco >= 0) {
            $this->preco = $novoPreco;
            echo "Preço alterado com sucesso.\n";
        } else {
            echo "Erro: O preço não pode ser negativo.\n";
        }
    }

    public function alterarQuantidade($novaQuantidade) {
        if ($novaQuantidade >= 0) {
            $this->quantidade = $novaQuantidade;
            echo "Quantidade alterada com sucesso.\n";
        } else {
            echo "Erro: A quantidade não pode ser negativa.\n";
        }
    }

    public function exibirDetalhes() {
        echo "---------------------------------\n";
        echo "Produto: {$this->nome}\n";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "\n";
        echo "Estoque: {$this->quantidade} unidades\n";
        echo "---------------------------------\n";
    }
}

$meuProduto = new Produto("Caixa de Aquarela", 45.90, 10);

$meuProduto->exibirDetalhes();

$meuProduto->alterarPreco(39.90);
$meuProduto->alterarQuantidade(15);
$meuProduto->alterarQuantidade(-5);

$meuProduto->exibirDetalhes();
