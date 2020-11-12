<?php

require_once 'entities/Categoria.php';


class CategoriaModel extends Model{

    protected $categoria;

    public function __construct(){
        parent::__construct();
        $this->categoria = new Categoria();
    }

    public function getCategorias(){
        $data = array();
        $query = $this->db->conexion()->prepare('SELECT * FROM categoria');
        try {
            $query->execute();
            while($row = $query->fetch()){
                $nuevaCategoria = new Categoria($row['id'],$row['nombre']);
                array_push($data, $nuevaCategoria);
            }
            return $data;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }

    public function existeEnProducto($id){
        $existe = 0;
        $query = $this->db->conexion()->prepare('SELECT COUNT(c.id) as existe FROM categoria c JOIN producto p ON c.id = p.id_categoria WHERE c.id = :id');
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

    public function insertar($nombre){
        $query = $this->db->conexion()->prepare('INSERT INTO categoria (nombre) VALUES(:nombre)');
        try {
              $query->execute([
                'nombre' => $nombre
              ]);
             return true;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }

    public function eliminar($id){
        $query = $this->db->conexion()->prepare('DELETE FROM categoria WHERE id = :id');
        try {
            $query->execute([
                'id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }
}