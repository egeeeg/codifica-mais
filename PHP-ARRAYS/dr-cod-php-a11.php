<?php

function adicionarProduto($estoque, $codigo, $nomeProduto, $tamanho, $cor, $quantidade) {
    foreach ($estoque as &$produto) {
        if (
            $produto['codigo'] == $codigo &&
            $produto['tamanho'] == $tamanho &&
            $produto['cor'] == $cor
        ) {
            $produto['quantidade'] += $quantidade;
            return $estoque;
        }
    }
    $estoque[] = [
        'codigo' => $codigo,
        'nome' => $nomeProduto,
        'tamanho' => $tamanho,
        'cor' => $cor,
        'quantidade' => $quantidade
    ];
    return $estoque;
}

function venderProduto($estoque, $codigo, $quantidade) {
    foreach ($estoque as $key => &$produto) {
        if ($produto['codigo'] == $codigo) {
            if ($quantidade > $produto['quantidade']) {
                echo "Não tem como remover essa quantidade.\n";
            } else if ($quantidade < $produto['quantidade']) {
                $produto['quantidade'] -= $quantidade;
            } else if ($quantidade == $produto['quantidade']) {
                unset($estoque[$key]);
            }
            break;
        } else {
            echo "Produto não encontrado no estoque.\n";
        }
    }
    return $estoque;
}

function verificarEstoque($estoque, $codigo) {
    foreach ($estoque as &$produto) {
        if ($produto['codigo'] == $codigo) {
            return $produto['quantidade'];
        }
    }
}

function listarEstoque($estoque) {
    foreach ($estoque as $produto) {
        echo "-------------------------\n";
        echo "Código: " . $produto['codigo'] . "\n";
        echo "Nome: " . $produto['nome'] . "\n";
        echo "Tamanho: " . $produto['tamanho'] . "\n";
        echo "Cor: " . $produto['cor'] . "\n";
        echo "Quantidade: " . $produto['quantidade'] . "\n";
        echo "-------------------------\n";
    }
    if (empty($estoque)) {
        echo "O estoque está vazio.\n";
    }
}
function exibirMenu() {
    $numero = 0;
    $estoque = [];
    while ($numero != 5) {
        echo "-------------------------\n";
        echo "(1) Adicionar um produto\n";
        echo "(2) Remover um produto\n";
        echo "(3) Verificar o estoque\n";
        echo "(4) Listar o estoque\n";
        echo "(5) Sair\n";
        echo "-------------------------\n";
        $numero = readline("Escolha uma opção: ");
        if ($numero > 5 || $numero <= 0) {
            echo "Opção inválida. Tente novamente.\n";
            continue;
        }
        switch ($numero) {
            case 1:
                $codigo = readline("Código do produto: ");
                $nomeProduto = readline("Nome do produto: ");
                $tamanho = readline("Tamanho do produto: ");
                $cor = readline("Cor do produto: ");
                $quantidade = readline("Quantidade do produto: ");
                $estoque = adicionarProduto($estoque, $codigo, $nomeProduto, $tamanho, $cor, $quantidade);
                echo "Produto adicionado com sucesso!\n";
                break;
            case 2:
                $codigo = readline("Código do produto a ser removido: ");
                $quantidade = readline("Quantidade a ser removida: ");
                $estoque = venderProduto($estoque, $codigo, $quantidade);
                break;
            case 3:
                $codigo = readline("Código do produto para verificar o estoque: ");
                $quantidade = verificarEstoque($estoque, $codigo);
                echo "Quantidade em estoque: " . ($quantidade ?? 0) . "\n";
                break;
            case 4:
                listarEstoque($estoque);
                break;
        }
    }
}

exibirMenu();