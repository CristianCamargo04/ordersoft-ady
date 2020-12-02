<?php

require_once 'entities/Producto.php';
require_once 'entities/CarritoProducto.php';


class CarritoproductoModel extends Model{

    protected $carritoproducto;

    public function __construct(){
        parent::__construct();
        $this->carritoproducto = new CarritoProducto();
        $this->producto = new Producto();
    }

    // public function insert(){
    //     $query = $this->db->conexion()->prepare('INSERT INTO cliente (documento, nombres, apellidos, email, contraseña, telefono, direccion) VALUES(:documento, :nombres, :apellidos, :email, :contrasena, :telefono, :direccion)');
    //     try {
    //           $query->execute([
    //                 'documento' => $cliente->getDocumento(),
    //                 'nombres' => $cliente->getNombres(),
    //                 'apellidos' => $cliente->getApellidos(),
    //                 'email' => $cliente->getEmail(),
    //                 'contrasena' => $cliente->getContrasena(),
    //                 'telefono' => $cliente->getTelefono(),
    //                 'direccion' => $cliente->getDireccion()
    //           ]);
    //          return true;
    //     } catch (PDOException $e) {
    //         print_r('Ocurrio un fallo', $e);
           
    // }

    public function listarCarrito($id_carrito)
    {
        $data = array();
        $query = $this->db->conexion()->prepare('SELECT p.id, p.imagen, p.nombre, p.precio, cp.cantidad FROM producto p JOIN carrito_producto cp ON cp.id_producto = p.id WHERE cp.id_carrito = :id_carrito');
        try {
            $query->execute(
                ['id_carrito' => $id_carrito]
            );
            while($row = $query->fetch()){
                $nuevoProducto = new Producto();
                $nuevoProducto->setId($row['id']);
                $nuevoProducto->setNombre($row['nombre']);
                $nuevoProducto->setPrecio($row['precio']);
                $nuevoProducto->setImagen($row['imagen']);
                $nuevoProducto->setCantidad($row['cantidad']);

                array_push($data, $nuevoProducto);
            }
            return $data;
        } catch (PDOException $e) {
            print_r('Ocurrio un fallo', $e);
            return false;
        }return false;
        
    }

    public function eliminar($id_producto,$id_carrito){
        $query = $this->db->conexion()->prepare('DELETE FROM carrito_producto WHERE id_producto = :id_producto AND id_carrito = :id_carrito');
        try {
              $query->execute([
                    'id_producto' => $id_producto,
                    'id_carrito' => $id_carrito
              ]);
             return true;
        } catch (PDOException $e) {
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }

}