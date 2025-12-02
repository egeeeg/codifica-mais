<?php

class Funcionario {
    private $nome;
    private $cargo;
    private $salario;

    public function __construct($nome, $cargo, $salario) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = ($salario >= 0) ? $salario : 0;
    }

    public function alterarCargo($novoCargo) {
        if (!empty($novoCargo)) {
            $this->cargo = $novoCargo;
            echo "Cargo atualizado para: {$novoCargo}\n";
        } else {
            echo "Erro: O cargo não pode ser vazio.\n";
        }
    }

    public function alterarSalario($novoSalario) {
        if ($novoSalario >= 0) {
            $this->salario = $novoSalario;
            echo "Salário atualizado com sucesso.\n";
        } else {
            echo "Erro: O salário não pode ser negativo.\n";
        }
    }

    public function exibirDetalhes() {
        echo "---------------------------------\n";
        echo "Funcionário: {$this->nome}\n";
        echo "Cargo: {$this->cargo}\n";
        echo "Salário: R$ " . number_format($this->salario, 2, ',', '.') . "\n";
        echo "---------------------------------\n";
    }
}

$colaborador = new Funcionario("João da Silva", "Assistente Administrativo", 2500.00);

$colaborador->exibirDetalhes();

$colaborador->alterarCargo("Coordenador Pedagógico");
$colaborador->alterarSalario(4200.50);
$colaborador->alterarSalario(-100);

$colaborador->exibirDetalhes();
