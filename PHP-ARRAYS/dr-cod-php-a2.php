<?php

$largura = readline("Qual a largura do retângulo? ");
$altura = readline("Qual a altura do retângulo? ");

echo "A área do retângulo é: " . $largura * $altura . PHP_EOL . "e o perímetro é: " . ($largura + $altura) * 2;