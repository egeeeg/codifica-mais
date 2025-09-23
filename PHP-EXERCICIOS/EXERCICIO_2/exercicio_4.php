<?php

$ano = readline("digite o ano que vc nasceu: ");
$anoatual = readline("digite o ano que vc está: ");

$idade = $anoatual - $ano;

echo "sua idade é: " . $idade . "!";