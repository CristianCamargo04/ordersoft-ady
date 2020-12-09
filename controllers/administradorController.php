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
        $this->view('home', $datos);
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
                    var_dump($administrador);
                    header("location: " . URL . "administrador/home");
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
            $this->view('nuevo', $datos);
        } catch (\Throwable $th) {
            $this->actionHome();
        }
    }

    public function actionCategorias()
    {
        $categorias = $this->categoriaModel->getCategorias();
        $datos = [
            'categorias' => $categorias
        ];
        $this->view('categorias', $datos);
    }

    public function actionRegistrar()
    {
        # definimos la carpeta destino
        $carpetaDestino = "products/";
        # si hay algun archivo que subir
        if (isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]) {
            # recorremos todos los arhivos que se han subido
            for ($i = 0; $i < count($_FILES["archivo"]["name"]); $i++) {
                # si es un formato de imagen
                if ($_FILES["archivo"]["type"][$i] == "image/jpeg" || $_FILES["archivo"]["type"][$i] == "image/pjpeg" || $_FILES["archivo"]["type"][$i] == "image/gif" || $_FILES["archivo"]["type"][$i] == "image/png") {
                    # si exsite la carpeta o se ha creado
                    if (file_exists($carpetaDestino) || @mkdir($carpetaDestino)) {
                        $origen = $_FILES["archivo"]["tmp_name"][$i];
                        $destino = $carpetaDestino . $_FILES["archivo"]["name"][$i];

                        # movemos el archivo
                        if (@move_uploaded_file($origen, $destino)) {
                            $string = $_FILES["archivo"]["name"][$i] . " movido correctamente";
                            $imagen = $_FILES["archivo"]["name"][$i];
                            echo "<script>alert('$string')</script>";
                        } else {
                            $string = "No se ha podido mover el archivo: " . $_FILES["archivo"]["name"][$i];
                            $imagen = "";
                            echo "<script>alert('$string')</script>";
                        }
                    } else {
                        $string = "No se ha podido crear la carpeta: " . $carpetaDestino;
                        echo "<script>alert('$string')</script>";
                    }
                } else {
                    $string = $_FILES["archivo"]["name"][$i] . " - NO es imagen jpg, png o gif";
                    echo "<script>alert('$string')</script>";
                }
            }
        } else {
            echo "<script>alert('No se ha subido ninguna imagen')</script>";
        }
        
        if (
            isset($_POST['nombre'], $_POST['descr'], $_POST['id_categoria'], $_POST['precio'])
            && is_numeric($_POST['precio'])
        ) {
            $nombre = $_POST['nombre'];
            $desc = $_POST['descr'];
            $id_categoria = $_POST['id_categoria'];
            $precio = $_POST['precio'];
            $producto = new Producto($nombre, $desc, $id_categoria, $precio);
            $producto->setImagen(URL."products/".$imagen);
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
