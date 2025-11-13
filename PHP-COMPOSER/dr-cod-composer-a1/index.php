<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

$dataNascimento = readline("Digite sua data de nascimento (YYYY-MM-DD): ");

$nascimento = Carbon::parse($dataNascimento);
$dataAtual = Carbon::now();

$idade = $nascimento->diffInYears($dataAtual);

$diasDeVida = $nascimento->diffInDays($dataAtual);

$proximoAniversario = $nascimento->copy()->year($dataAtual->year);
if ($proximoAniversario->lt($dataAtual)) {
    $proximoAniversario->addYear();
}
$diasParaAniversario = $dataAtual->diffInDays($proximoAniversario);

$diaDaSemana = $nascimento->format('l');

echo "Faltam $diasParaAniversario dias para o seu próximo aniversário.\n";
echo "Você tem $idade anos de vida.\n";
echo "Você tem $diasDeVida dias de vida.\n";
echo "Você nasceu em uma $diaDaSemana.\n";