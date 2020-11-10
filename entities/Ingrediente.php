<?php
class Ingrediente{
    private $id;
    private $nombre;
    private $stock;
    private $precio;

    public function __construct(){
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getStock(){
		return $this->stock;
	}

	public function setStock($stock){
		$this->stock = $stock;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}
}