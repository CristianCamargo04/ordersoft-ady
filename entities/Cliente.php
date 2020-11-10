<?php
class Cliente{
    private $documento;
    private $nombres;
    private $apellidos;
    private $email;
    private $contrasena;
    private $createdAt;
    private $updateAt;
    private $imagen;
    private $telefono;
    private $direccion;
    private $supervisor;

    public function __construct($documento=null,$nombres=null,$apellidos=null,$email=null,$contrasena=null,$telefono=null,$direccion=null){
		$this->documento = $documento;
		$this->nombres = $nombres;
		$this->apellidos = $apellidos;
		$this->email = $email;
		$this->contrasena = $contrasena;
		$this->telefono = $telefono;
		$this->direccion = $direccion;
    }

    public function getDocumento(){
		return $this->documento;
	}

	public function setDocumento($documento){
		$this->documento = $documento;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
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

	public function getUpdateAt(){
		return $this->updateAt;
	}

	public function setUpdateAt($updateAt){
		$this->updateAt = $updateAt;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getSupervisor(){
		return $this->supervisor;
	}

	public function setSupervisor($supervisor){
		$this->supervisor = $supervisor;
	}
}