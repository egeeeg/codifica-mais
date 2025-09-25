<?php

function valorDesconto($valor, $desconto) {
    $valordoDesconto = $valor * ($desconto / 100);
    $valorcomDesconto = $valor - $valordoDesconto;
    return $valorcomDesconto;
};

echo valorDesconto(200, 50);