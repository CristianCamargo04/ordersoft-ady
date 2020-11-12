<?php
include 'entities/Categoria.php';
include 'models/categoriamodel.php';
include 'entities/Producto.php';
include 'models/productomodel.php';

class CategoriaController extends Controller{
    protected $categoriaModel;
    protected $productoModel;

    public function __construct(){
        $this->categoriaModel = $this->model('categoria');
        $this->productoModel = $this->model('producto');
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

    public function actionListar(){
        $id_categoria = $_GET["id"];
        // echo $id_categoria;
        $productos = $this->productoModel->getProductos($id_categoria);
        $datos = [
            'productos' => $productos
        ];
        $this->view('categoria/vista-productos',$datos);
    }
}

?>