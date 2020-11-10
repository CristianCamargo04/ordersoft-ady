<?php

require_once 'entities/Carrito.php';


class CarritoModel extends Model{

    protected $carrito;

    public function __construct(){
        parent::__construct();
        $this->carrito = new Carrito();
    }

    public function insertar($carrito)
    {
        $query = $this->db->conexion()->prepare('INSERT INTO carrito (id_cliente) VALUES(:id_cliente)');
        try {
              $query->execute([
                    'id_cliente' => $carrito->getId_cliente()
              ]);
             return true;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }
}