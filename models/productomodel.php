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
    // WHERE id_categoria = :id_categoria
    // ['id_categoria' => $id_categoria]
    public function getProductos($id_categoria){
        $data = array();
        $query = $this->db->conexion()->prepare('SELECT * FROM producto WHERE id_categoria = :id_categoria');
        try {
            $query->execute(
                ['id_categoria' => $id_categoria]
            );
            while($row = $query->fetch()){
                $nuevoProducto = new Producto($row['nombre'],$row['descr'],$row['id_categoria'],$row['precio']);
                array_push($data, $nuevoProducto);
            }
            return $data;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }
}
