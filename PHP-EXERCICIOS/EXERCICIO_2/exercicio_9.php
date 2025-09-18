<?php

$n1 = readline("solicite um numero: ");
$n2 = readline("solicite outro numero: ");

if ($n1 > $n2) {
    echo $n1 . " é maior que " . $n2 . PHP_EOL;
} else {
    echo $n2 . " é maior que " . $n1 . PHP_EOL;
};