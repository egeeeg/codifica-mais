<?php

$funcionarios = [
    ["Pedro", 2500.00, 10],
    ["Renata", 3000.00, 5],
    ["Sérgio", 2800.00, 8],
    ["Vanessa", 3200.00, 12],
    ["André", 1700.00, 0]
];

function calcularSalarioTotal($salarioBase, $horasExtras, $valorHoraExtra) {
    return $salarioBase + ($horasExtras * $valorHoraExtra);
}

function listarFuncionarios($funcionarios) {
    foreach ($funcionarios as $funcionario) {
        $nome = $funcionario[0];
        $salarioBase = $funcionario[1];
        $horasExtras = $funcionario[2];
        $valorHoraNormal = $salarioBase / 160;
        $valorHoraExtra = $valorHoraNormal * 1.5;
        $salarioTotal = calcularSalarioTotal($salarioBase, $horasExtras, $valorHoraExtra);

        echo "Nome: $nome" . PHP_EOL;
        echo "Salário Base: R$ " . number_format($salarioBase, 2, ',', '.') . PHP_EOL;
        echo "Horas Extras: $horasExtras" . PHP_EOL;
        echo "Salário Total: R$ " . number_format($salarioTotal, 2, ',', '.') . PHP_EOL;
    }
}

listarFuncionarios($funcionarios);