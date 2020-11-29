<?php

require_once 'entities/Valoracion.php';


class ValoracionModel extends Model{

    protected $valoracion;

    public function __construct(){
        parent::__construct();
        $this->valoracion = new Valoracion();
    }
    
    public function getValoraciones($id_producto){
        $data = array();
        $query = $this->db->conexion()->prepare("SELECT concat_ws(' ', c.nombres, c.apellidos) as cliente, v.calificacion, v.comentario FROM valoracion v JOIN cliente c ON c.documento = v.id_cliente JOIN producto p ON p.id = v.id_producto WHERE p.id = :id_producto");
        try {
            $query->execute(
                ['id_producto' => $id_producto]
            );
            while($row = $query->fetch()){
                $nuevaValoracion = new Valoracion($row['cliente'],$row['calificacion'],$row['comentario']);
                array_push($data, $nuevaValoracion);
            }
            return $data;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }
}
