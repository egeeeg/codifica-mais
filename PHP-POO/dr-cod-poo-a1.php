<?php

class ContaBancaria {
    private $numeroConta;
    private $nomeTitular;
    private $saldo;

    public function __construct($numeroConta, $nomeTitular) {
        $this->numeroConta = $numeroConta;
        $this->nomeTitular = $nomeTitular;
        $this->saldo = 0;
    }

    public function depositar($quantia) {
        if ($quantia > 0) {
            $this->saldo += $quantia;
            echo "Depósito de R$ " . number_format($quantia, 2, ',', '.') . " realizado.\n";
        } else {
            echo "Valor inválido para depósito.\n";
        }
    }

    public function sacar($quantia) {
        if ($quantia > 0 && $this->saldo >= $quantia) {
            $this->saldo -= $quantia;
            echo "Saque de R$ " . number_format($quantia, 2, ',', '.') . " realizado.\n";
        } else {
            echo "Erro: Saldo insuficiente ou valor inválido para saque de R$ " . number_format($quantia, 2, ',', '.') . ".\n";
        }
    }

    public function exibirSaldo() {
        echo "Conta: {$this->numeroConta} | Titular: {$this->nomeTitular}\n";
        echo "Saldo Atual: R$ " . number_format($this->saldo, 2, ',', '.') . "\n";
    }
}

$minhaConta = new ContaBancaria("12345-X", "Professor");

$minhaConta->exibirSaldo();

$minhaConta->depositar(500.00);
$minhaConta->sacar(200.00);
$minhaConta->sacar(400.00);

$minhaConta->exibirSaldo();
