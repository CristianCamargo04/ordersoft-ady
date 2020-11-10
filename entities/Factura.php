<?php
class Factura{
    private $id;
    private $id_cliente;
    private $fecha;
    private $total;
    private $realizado;
    private $espera;

    public function __construct(){    
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_cliente(){
		return $this->id_cliente;
	}

	public function setId_cliente($id_cliente){
		$this->id_cliente = $id_cliente;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getTotal(){
		return $this->total;
	}

	public function setTotal($total){
		$this->total = $total;
	}

	public function getRealizado(){
		return $this->realizado;
	}

	public function setRealizado($realizado){
		$this->realizado = $realizado;
	}

	public function getEspera(){
		return $this->espera;
	}

	public function setEspera($espera){
		$this->espera = $espera;
	}
}