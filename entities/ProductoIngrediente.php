<?php
class ProductoIngrediente{
    private $id;
    private $id_producto;
    private $id_ingrediente;
    private $extra;

    public function __construct(){
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getId_ingrediente(){
		return $this->id_ingrediente;
	}

	public function setId_ingrediente($id_ingrediente){
		$this->id_ingrediente = $id_ingrediente;
	}

	public function getExtra(){
		return $this->extra;
	}

	public function setExtra($extra){
		$this->extra = $extra;
	}
}