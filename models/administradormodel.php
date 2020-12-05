<?php

require_once 'entities/Administrador.php';

class AdministradorModel extends Model{

    protected $admin;

    public function __construct(){
        parent::__construct();
        $this->admin = new Administrador();
    }


    public function existe($user,$email,$pass){
         $query = $this->db->conexion()->prepare('SELECT * FROM administrador WHERE usuario = :usuario AND email = :email AND contraseña = :contrasena');
         try {
             $query->execute([
                 'usuario' => $user,
                 'email' => $email,
                 'contrasena' => $pass,
             ]);
             while($row = $query->fetch()){
                $this->admin->setId($row['id']);
                $this->admin->setUsuario($row['usuario']);
                $this->admin->setEmail($row['email']);
                $this->admin->setContrasena($row['contraseña']);
             }
             return $this->admin; 
         } catch (PDOException $e) {
             return null;
         }
         return null;
    }
}
