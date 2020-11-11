<?php

require_once 'entities/Cliente.php';


class ClienteModel extends Model{

    protected $cliente;

    public function __construct(){
        parent::__construct();
        $this->cliente = new Cliente();
    }

    public function insertar($cliente){
        $query = $this->db->conexion()->prepare('INSERT INTO cliente (documento, nombres, apellidos, email, contraseña, telefono, direccion) VALUES(:documento, :nombres, :apellidos, :email, :contrasena, :telefono, :direccion)');
        try {
              $query->execute([
                    'documento' => $cliente->getDocumento(),
                    'nombres' => $cliente->getNombres(),
                    'apellidos' => $cliente->getApellidos(),
                    'email' => $cliente->getEmail(),
                    'contrasena' => $cliente->getContrasena(),
                    'telefono' => $cliente->getTelefono(),
                    'direccion' => $cliente->getDireccion()
              ]);
             return true;
        } catch (PDOException $e) {
            //throw $th;
            print_r('Ocurrio un fallo', $e);
            return false;
        }
    }

    public function existe($email,$pass){
        $find = null;
        $query = $this->db->conexion()->prepare('SELECT * FROM cliente WHERE email = :email AND contraseña = :contrasena');
        try{
            $query->execute([
                'email' => $email,
                'contrasena' => $pass
            ]);
            while($row = $query->fetch()){
                $this->cliente->setDocumento($row['documento']);
                $this->cliente->setEmail($row['email']);
                $this->cliente->setContrasena($row['contraseña']);
            }
            $find = $this->cliente->getDocumento();
        }catch(PDOException $e){
            return null;
        }  
        return $find;
    }

}


?>