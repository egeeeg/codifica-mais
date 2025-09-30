<?php

$valor = readline("Qual temperatura você deseja converter?(Digite 1 para Celsius e 2 para Fahrenheit)");

if ($valor == "1") {
    $temp = readline("Qual a temperatura em Celsius?");
    echo "A temperatura em Fahrenheit é: " . ($temp * 9 / 5) + 32;
} elseif ($valor == "2") {
    $temp = readline("Qual a temperatura em Fahrenheit?");
    echo "A temperatura em Celsius é: " . ($temp - 32) * 5 / 9;
} else {
    echo "Valor inválido!";
}