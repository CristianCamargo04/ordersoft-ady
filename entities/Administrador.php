<?php
class Administrador{
    private $id;
    private $usuario;
    private $email;
    private $contrasena;
    private $createdAt;
    private $updatedAt;

    public function __construct(){
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getContrasena(){
		return $this->contrasena;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}

	public function getCreatedAt(){
		return $this->createdAt;
	}

	public function setCreatedAt($createdAt){
		$this->createdAt = $createdAt;
	}

	public function getUpdatedAt(){
	    return $this->updatedAt;
	}

	public function setUpdatedAt($updatedAt){
		$this->updatedAt = $updatedAt;
	}
}
