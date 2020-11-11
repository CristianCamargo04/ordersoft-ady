<?php
class Producto{
    private $id;
    private $imagen;
    private $nombre;
    private $desc;
    private $id_categoria;
    private $precio;

    public function __construct($nombre=null,$desc=null,$id_categoria=null,$precio=null){
		$this->nombre = $nombre;
		$this->desc = $desc;
		$this->id_categoria = $id_categoria;
		$this->precio = $precio;
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDesc(){
		return $this->desc;
	}

	public function setDesc($desc){
		$this->desc = $desc;
	}

	public function getId_categoria(){
		return $this->id_categoria;
	}

	public function setId_categoria($id_categoria){
		$this->id_categoria = $id_categoria;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}
}
