<?php
include 'entities/Administrador.php';
include 'models/administradormodel.php';
include 'entities/Producto.php';
include 'models/productomodel.php';
include 'entities/Categoria.php';
include 'models/categoriamodel.php';

class AdministradorController extends Controller{
    protected $administradorModel;
    protected $productoModel;
    protected $categoriaModel;

    public function __construct(){
        $this->administradorModel = $this->model('administrador');
        $this->productoModel = $this->model('producto');
        $this->categoriaModel = $this->model('categoria');
    }

    public function actionIndex(){
        $this->view('index');
    }

    public function actionError(){
        $datos = ["titlo" => 'error'];
        $this->view('error',$datos);
    }

    public function actionHome(){
        $this->view('administrador/home');
    }

    public function actionNuevo(){
        $this->view('administrador/nuevo');
    }
}