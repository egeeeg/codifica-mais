<?php

$n1 = readline("digite um número: ");
$n2 = readline("digite outro número maior que o primeiro número: ");

$soma = 0;
if ($n1 < $n2) {
    for($i = $n1; $i <= $n2; $i++) {
        if($i % 2 != 0) {
            $soma += $i;
        }
    }
} else {
    echo "execute o código novamente";
};

echo "a soma dos números ímpares entre $n1 e $n2 é: $soma";