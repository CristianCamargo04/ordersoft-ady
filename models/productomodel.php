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
            return false;
        }
    }

    public function descontinuar($id){
        $query = $this->db->conexion()->prepare('UPDATE producto SET descontinuado = 1 WHERE id = :id');
        try{
            $query->execute([
                'id' => $id
            ]);
        }catch(PDOException $e){
            return false;
        }
    }

    public function continuar($id){
        $query = $this->db->conexion()->prepare('UPDATE producto SET descontinuado = 0 WHERE id = :id');
        try{
            $query->execute([
                'id' => $id
            ]);
        }catch(PDOException $e){
            return false;
        }
    }

    public function existeEnFactura($id){
        $existe = 0;
        $query = $this->db->conexion()->prepare('SELECT COUNT(p.id) as existe FROM producto p JOIN producto_factura f ON p.id = f.id_producto WHERE p.id = :id');
        try {
            $query->execute([
                'id' => $id
            ]);
            while($row = $query->fetch()){
                $existe = $row['existe'];
            }
            return $existe;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return $existe;
        }
    }
    
    public function getProductos($id_categoria){
        $data = array();
        $query = $this->db->conexion()->prepare('SELECT * FROM producto WHERE id_categoria = :id_categoria AND descontinuado = 0');
        try {
            $query->execute(
                ['id_categoria' => $id_categoria]
            );
            while($row = $query->fetch()){
                $nuevoProducto = new Producto($row['nombre'],$row['descr'],$row['id_categoria'],$row['precio']);
                $nuevoProducto->setId($row['id']);
                $nuevoProducto->setImagen($row['imagen']);
                array_push($data, $nuevoProducto);
            }
            return $data;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }

    public function getProducto($id){
        $data = array();
        $query = $this->db->conexion()->prepare('SELECT * FROM producto WHERE id = :id AND descontinuado = 0');
        try {
            $query->execute(
                ['id' => $id]
            );
            while($row = $query->fetch()){
                $nuevoProducto = new Producto($row['nombre'],$row['descr'],$row['id_categoria'],$row['precio']);
                $nuevoProducto->setId($row['id']);
                $nuevoProducto->setImagen($row['imagen']);
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
