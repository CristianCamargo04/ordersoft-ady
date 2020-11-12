<?php
include 'entities/Categoria.php';
include 'models/categoriamodel.php';

class IndexController extends Controller{
    protected $categoriaModel;

    public function __construct(){
        $this->categoriaModel = $this->model('categoria');
    }

    public function actionIndex(){
        $categorias = $this->categoriaModel->getCategorias();
            $datos = [
                'categorias' => $categorias
            ];
        $this->view('index',$datos);
    }

    public function actionError(){
        $datos = ["titlo" => 'error'];
        $this->view('error',$datos);
    }

    public function actionAdmin(){
        $datos = ['titulo' => 'Administrador'];
        $this->view('login',$datos);
    }
}

?>