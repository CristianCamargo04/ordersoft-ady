<?php
include 'entities/Administrador.php';
include 'models/administradormodel.php';
include 'entities/Producto.php';
include 'models/productomodel.php';
include 'entities/Categoria.php';
include 'models/categoriamodel.php';

class AdministradorController extends Controller
{
    protected $administradorModel;
    protected $productoModel;
    protected $categoriaModel;

    public function __construct()
    {
        $this->administradorModel = $this->model('administrador');
        $this->productoModel = $this->model('producto');
        $this->categoriaModel = $this->model('categoria');
    }

    public function actionIndex()
    {
        $categorias = $this->categoriaModel->getCategorias();
        $datos = [
            'categorias' => $categorias
        ];
        $this->view('index', $datos);
    }

    public function actionError()
    {
        $datos = ["titlo" => 'error'];
        $this->view('error', $datos);
    }

    // public function actionAdmin(){
    //     $this->view('administrador/admin-login');
    // }

    public function actionHome()
    {
        $categorias = $this->categoriaModel->getCategorias();
        $datos = [
            'categorias' => $categorias
        ];
        $this->view('administrador/home', $datos);
    }

    public function actionLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['usuario'], $_POST['email'], $_POST['contraseña'])) {
                $usuario = $_POST['usuario'];
                $email = $_POST['email'];
                $contrasena = $_POST['contraseña'];
                if ($this->administradorModel->existe($usuario, $email, $contrasena)->getUsuario() != null) {
                    session_start();
                    $administrador = $this->administradorModel->existe($usuario, $email, $contrasena);
                    $_SESSION['admin'] = $administrador;
                    header("location: " . URL . "administrador/home/");
                } else {
                    echo "<script>alert('Datos Incorrectos')</script>";
                    $this->actionIndex();
                }
            } else {
                echo "<script>alert('Datos Incompletos')</script>";
                $this->actionIndex();
            }
        } else {
            $this->view('admin-login');
        }
    }

    public function actionCerrar()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->actionIndex();
    }

    public function actionNuevo()
    {
        try {
            $categorias = $this->categoriaModel->getCategorias();
            $datos = [
                'categorias' => $categorias
            ];
            $this->view('administrador/nuevo', $datos);
        } catch (\Throwable $th) {
            $this->actionHome();
        }
    }

    public function actioncategorias()
    {
        $categorias = $this->categoriaModel->getCategorias();
        $datos = [
            'categorias' => $categorias
        ];
        $this->view('administrador/categorias', $datos);
    }

    public function actionregistrar()
    {
        if (
            isset($_POST['nombre'], $_POST['descr'], $_POST['id_categoria'], $_POST['precio'])
            && is_numeric($_POST['precio'])
        ) {
            $nombre = $_POST['nombre'];
            $desc = $_POST['descr'];
            $id_categoria = $_POST['id_categoria'];
            $precio = $_POST['precio'];
            $producto = new Producto($nombre, $desc, $id_categoria, $precio);
            try {
                $this->productoModel->insertar($producto);
                $this->actionNuevo();
            } catch (\Throwable $th) {
                echo $th;
            }
        } else {
            echo "<script>alert('Datos Incompletos)</script>";
            $this->actionNuevo();
        }
    }
}
