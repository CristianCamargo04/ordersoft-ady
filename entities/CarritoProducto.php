<?php
class CarritoProducto{
    private $id;
    private $id_carrito;
    private $id_producto;
    private $cantidad;
    private $precio;

    public function __construct(){
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId_carrito(){
		return $this->id_carrito;
	}

	public function setId_carrito($id_carrito){
		$this->id_carrito = $id_carrito;
	}

	public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}
}