<?php
class Carrito{
    private $id_cliente;
    private $valor_total;

    public function __construct($id_cliente=null){
		$this->id_cliente = $id_cliente;
    }

    public function getId_cliente(){
		return $this->id_cliente;
	}

	public function setId_cliente($id_cliente){
		$this->id_cliente = $id_cliente;
	}

	public function getValor_total(){
		return $this->valor_total;
	}

	public function setValor_total($valor_total){
		$this->valor_total = $valor_total;
	}
}

