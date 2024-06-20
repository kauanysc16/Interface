<?php
class Funcionario {
    public $id_func;
    public $sobrenome;
    public $nome;
    public $cargo;
    public $data_contrata;
    public $salario;
    public $num_agencia;

    public function __construct($id_func, $sobrenome, $nome, $cargo, $data_contrata, $salario, $num_agencia) {
        $this->id_func = $id_func;
        $this->sobrenome = $sobrenome;
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->data_contrata = $data_contrata;
        $this->salario = $salario;
        $this->num_agencia = $num_agencia;
    }
}
?>
