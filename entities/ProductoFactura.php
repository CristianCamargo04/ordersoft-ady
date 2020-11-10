<?php
class ProductoFactura{
    private $id;
    private $id_factura;
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

	public function getId_factura(){
		return $this->id_factura;
	}

	public function setId_factura($id_factura){
		$this->id_factura = $id_factura;
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