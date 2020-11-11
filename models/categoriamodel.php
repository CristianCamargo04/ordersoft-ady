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
}