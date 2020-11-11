<?php

require_once 'entities/Producto.php';


class ProductoModel extends Model{

    protected $producto;

    public function __construct(){
        parent::__construct();
        $this->producto = new Producto();
    }

    public function insertar($producto){
        $query = $this->db->conexion()->prepare('INSERT INTO producto (nombre, descr, id_categoria, precio) VALUES(:nombre, :descr, :id_categoria, :precio)');
        try {
              $query->execute([
                    'nombre' => $producto->getNombre(),
                    'descr' => $producto->getDesc(),
                    'id_categoria' => $producto->getId_categoria(),
                    'precio' => $producto->getPrecio()
              ]);
             return true;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }    
}