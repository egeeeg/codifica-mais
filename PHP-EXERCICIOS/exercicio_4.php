<?php
$numeros = [];
do {
    $n1 = readline("informe um número (ou digite -1 para terminar): ");  
    if ($n1 != -1) {
        array_push($numeros, $n1);
    }  
} while ($n1 != -1);

$maior = max($numeros);
$menor = min($numeros);

echo "o maior número é: $maior e o menor número é: $menor";