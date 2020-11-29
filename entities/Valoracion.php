<?php
class Valoracion{
    private $id;
	private $id_cliente;
	private $cliente;
    private $id_producto;
    private $calificacion;
    private $comentario;

    public function __construct($cliente=null, $calificacion=null, $comentario=null){
		$this->cliente = $cliente;
		$this->calificacion = $calificacion;
		$this->comentario = $comentario;
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

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function getCliente(){
		return $this->cliente;
	}

	public function setId_cliente($id_cliente){
		$this->id_cliente = $id_cliente;
	}

	public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getCalificacion(){
		return $this->calificacion;
	}

	public function setCalificacion($calificacion){
		$this->calificacion = $calificacion;
	}

	public function getComentario(){
		return $this->comentario;
	}

	public function setComentario($comentario){
		$this->comentario = $comentario;
	}
}