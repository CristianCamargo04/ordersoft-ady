<?php

require_once 'entities/Categoria.php';


class CategoriaModel extends Model{

    protected $categoria;

    public function __construct(){
        parent::__construct();
        $this->categoria = new Categoria();
    }

    public function getCategorias($categoria)
    {
        $query = $this->db->conexion()->prepare('SELECT * FROM categorias');
        try {
              $query->execute();
             return true;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }
}