<?php

$preçoItens = [50, 30, 10, 15, 8];

$numeroPessoas = readline("Digite o número de pessoas: ");
function churrasco($preçoItens, $numeroPessoas) {
    $itensChurrasco = ["Picanha", "Cerveja", "Refrigerante", "Carvão", "Pão de Alho"];
    $preçoTotal = array_sum($preçoItens);
    $preçoPorPessoa = $preçoTotal / $numeroPessoas;
    $ValorMaisCaro = max($preçoItens);
    $indexItemMaisCaro = array_search($ValorMaisCaro, $preçoItens);
    $itemMaisCaro = $itensChurrasco[$indexItemMaisCaro];

    if ($numeroPessoas > 1){
        echo "Cada pessoa deve pagar: R$ " . number_format($preçoPorPessoa, 2) . "\n";
        echo "O item mais caro foi: " . $itemMaisCaro . " que custa R$ " . number_format($ValorMaisCaro, 2) . "\n";
    } else {
        echo "O churrasco foi cancelado, todo mundo furou!";
    };
};

churrasco($preçoItens, $numeroPessoas);