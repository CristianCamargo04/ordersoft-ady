<?php

require_once 'entities/Producto.php';


class ProductoModel extends Model{

    protected $producto;

    public function __construct(){
        parent::__construct();
        $this->producto = new Producto();
    }

    public function insertar($producto)
    {
        $query = $this->db->conexion()->prepare('INSERT INTO carrito (id_cliente) VALUES(:id_cliente)');
        try {
              $query->execute([
                    'id_cliente' => $producto->getId_cliente()
              ]);
             return true;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }
}