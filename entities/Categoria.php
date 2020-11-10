<?php
class Categoria{
    private $id;
    private $nombre;
    private $desc;
    
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

	public function getDesc(){
		return $this->desc;
	}

	public function setDesc($desc){
		$this->desc = $desc;
	}
}
