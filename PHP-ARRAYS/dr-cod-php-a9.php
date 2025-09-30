<?php

$estoque = [
    ["Bermuda", 59.9, 6],   // Produto 1
    ["Camisa", 89.9, 5],    // Produto 2
    ["Sapato", 179.9, 10],  // Produto 3
    ["Calça", 99.9, 7]      // Produto 4
];

$valorTotal = 0;

foreach ($estoque as $produto) {
    $valorTotal += $produto[1] * $produto[2];
}

echo "Valor total do estoque: R$ " . number_format($valorTotal, 2, ',', '.');