<?php

function calcularMedia() {
    $notasAlunos = [
    [8.5, 6.0, 7.8, 9.2, 5.5], // Aluno 1
    [7.0, 8.0, 6.5, 7.5, 8.5], // Aluno 2
    [6.5, 7.5, 4.5, 5.5, 7.0], // Aluno 3
    [5.0, 4.6, 7.8, 9.0, 6.0] // Aluno 4
];
    foreach ($notasAlunos as $index => $notas) {
    $media = array_sum($notas) / count($notas);
    echo "A média do Aluno " . ($index + 1) . " é: " . number_format($media, 2) . "\n";
}
    return array_sum($notas) / count($notas);
}

calcularMedia();