<?php

require_once 'entities/Administrador.php';

class AdministradorModel extends Model{

    public function __construct(){
        parent::__construct();
    }


    // public function existe($user,$pass){
    //      $admin = false;
    //      $query = $this->db->conexion()->prepare('SELECT * FROM administrador WHERE usuario = :usuario AND contraseña = :contrasena');
    //      try {
    //          $query->execute([
    //              'usuario' => $user,
    //              'contrasena' => $pass,
    //          ]);
    //          while($row = $query->fetch()){
    //             $admins = new Administrador();
    //             $admins->setUsuario($row['usuario']);
    //             $admins->setContrasena($row['contrasena']);
    //          }
    //          $admin = true;
    //      } catch (PDOException $e) {
    //          return false;
    //      }
    //      return $admin;
    // }

}





?>