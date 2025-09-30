<?php

$peso = readline("Qual o seu peso? ");
$altura = readline("Qual a sua altura? ");

$IMC = $peso / ($altura * $altura);

echo "Seu IMC é: " . number_format($IMC, 2) . "\n";

if ($IMC <= 18.5) {
    echo "Abaixo do peso";
} elseif ($IMC > 18.5 && $IMC <= 24.9) {
    echo "Peso normal";
} elseif ($IMC >= 25 && $IMC <= 29.9) {
    echo "Sobrepeso";
} elseif ($IMC >= 30 && $IMC <= 34.9) {
    echo "Obesidade grau I";
} elseif ($IMC >= 35 && $IMC <= 39.9) {
    echo "Obesidade grau II";
} else {
    echo "Obesidade grau III";
}