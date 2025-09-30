<?php

function aplicarDesconto($valorCompra, $percentualDesconto) {
    $desconto = $valorCompra * ($percentualDesconto / 100);
    return $valorCompra - $desconto;
}

function calcularDescontoProgressivo($valorCompra) {
    if ($valorCompra < 100) {
        return $valorCompra;
    } elseif ($valorCompra <= 500) {
        return aplicarDesconto($valorCompra, 10);
    } else {
        return aplicarDesconto($valorCompra, 20);
    }
}

echo "Digite o valor da compra: R$ ";
$valorCompra = floatval(trim(fgets(STDIN)));

$valorFinal = calcularDescontoProgressivo($valorCompra);

echo "Valor final após desconto progressivo: R$ " . number_format($valorFinal, 2, ',', '.');