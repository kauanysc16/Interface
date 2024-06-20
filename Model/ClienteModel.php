<?php
class Cliente {
    public $nome;
    public $cnh;
    public $telefone;
    public $cartao;
    public $id_cliente;
    public $id_pagamento;

    public function __construct($nome, $cnh, $telefone, $cartao, $id_cliente, $id_pagamento) {
        $this->nome = $nome;
        $this->cnh = $cnh;
        $this->telefone = $telefone;
        $this->cartao = $cartao;
        $this->id_cliente = $id_cliente;
        $this->id_pagamento = $id_pagamento;
    }
}
?>
