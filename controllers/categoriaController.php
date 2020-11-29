<?php
include 'entities/Categoria.php';
include 'models/categoriamodel.php';
include 'entities/Producto.php';
include 'models/productomodel.php';
include 'entities/Valoracion.php';
include 'models/valoracionmodel.php';

class CategoriaController extends Controller{
    protected $categoriaModel;
    protected $productoModel;
    protected $valoracionModel;

    public function __construct(){
        $this->categoriaModel = $this->model('categoria');
        $this->productoModel = $this->model('producto');
        $this->valoracionModel = $this->model('valoracion');
    }

    public function actionIndex(){
        $categorias = $this->categoriaModel->getCategorias();
        $datos = [
            'categorias' => $categorias
        ];
        $this->view('index',$datos);
    }

    public function actioncategorias(){
        $categorias = $this->categoriaModel->getCategorias();
            $datos = [
                'categorias' => $categorias
            ];
        $this->view('administrador/categorias',$datos);
    }

    public function actionError(){
        $datos = ["titlo" => 'error'];
        $this->view('error',$datos);
    }

    public function actionListar(){
        $id_categoria = $_GET["id"];
        $categorias = $this->categoriaModel->getCategorias();
        $productos = $this->productoModel->getProductos($id_categoria);
        $datos = [
            'productos' => $productos,
            'categorias' => $categorias
        ];
        $this->view('categoria/vista-productos',$datos);
    }



    public function actionGetproducto(){
        $id_producto = $_POST["id_producto"];
        $categorias = $this->categoriaModel->getCategorias();
        $valoraciones = $this->valoracionModel->getValoraciones($id_producto);
        $cant = 0;
        foreach ($valoraciones as $v){
            $cant+=$v->getCalificacion();
        }
        $total = $cant/count($valoraciones);
        $producto = $this->productoModel->getProducto($id_producto);

        $datos = [
            'producto' => $producto,
            'valoraciones' => $valoraciones,
            'total' => $total,
            'categorias' => $categorias
        ];
        $this->view('categoria/ver-producto', $datos);
    }

    public function actionregistrar(){
        if(isset($_POST['nombre']) && is_string($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            try {
                $this->categoriaModel->insertar($nombre);
                $this->actioncategorias();
            } catch (\Throwable $th) {
                echo $th;
            }
        }else{
            echo "<script>alert('Datos Incompletos)</script>";
            $this->actioncategorias();
        }        
    }

    public function actioneliminar(){
        $id = $_GET['id'];
        try {
            if (!($this->categoriaModel->existeEnProducto($id))) {
                $this->categoriaModel->eliminar($id);
            }else{
                echo "<script>alert('Esta categoria ya se encuentra dentro de un producto')</script>";
            }
            $this->actioncategorias();
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}

?>