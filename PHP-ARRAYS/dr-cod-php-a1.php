<?php

$conta = readline("Qual o valor da conta? ");
$gorjeta = readline("Qual a porcentagem da gorjeta? ");
echo "O valor total com gorjeta foi: " . $conta * $gorjeta / 100 + $conta;