<?php
include 'entities/Cliente.php';
include 'models/clientemodel.php';
include 'models/carritomodel.php';
include 'entities/Categoria.php';
include 'models/categoriamodel.php';

class ClienteController extends Controller{

   protected $clienteModel;
   protected $carritoModel;
   protected $categoriaModel;

    public function __construct(){
        $this->clienteModel = $this->model('cliente'); 
        $this->carritoModel = $this->model('carrito'); 
        $this->categoriaModel = $this->model('categoria');
    }

    public function actionIndex(){
        $categorias = $this->categoriaModel->getCategorias();
            $datos = [
                'categorias' => $categorias
            ];
        $this->view('index',$datos);
    }

    public function actionHome(){
        $categorias = $this->categoriaModel->getCategorias();
            $datos = [
                'categorias' => $categorias
            ];
        $this->view('home',$datos);
    }

    public function actionError(){
        $datos = ["titlo" => 'error'];
        $this->view('error',$datos);
    }

    public function actionLogin(){
        if(isset($_POST['email'],$_POST['contraseña'])){
            
            $email = $_POST['email'];
            $contrasena = $_POST['contraseña'];
            $clienteModel = new ClienteModel();

                if($clienteModel->existe($email,$contrasena) != null){
                    session_start();
                    $cliente = $clienteModel->existe($email,$contrasena);
                    $_SESSION['cliente'] = $cliente;
                    header("location: ". URL. "cliente/home/");
                //     echo "<script>
                //     window.location='" . URL . "cliente/home';
                //  </script>";
                }else{
                    echo "<script>alert('Datos Incorrectos')</script>";
                    $this->actionIndex();
                }
        }else{
            echo "<script>alert('Datos Incompletos')</script>";
            $this->actionIndex();
        }
    }

    public function actionCerrar(){
        session_start();
        session_unset();
        session_destroy();
        $this->actionIndex();
    }

    public function actionregistrar(){
        if(isset($_POST['documento'],$_POST['nombres'],$_POST['apellidos'],$_POST['email'],$_POST['contraseña'],$_POST['telefono'],$_POST['direccion']) 
        && is_numeric($_POST['documento']) && is_numeric($_POST['telefono'])){
                
            $documento = $_POST['documento'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $contrasena = $_POST['contraseña'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];

            $cliente = new Cliente($documento,$nombres,$apellidos ,$email,$contrasena,$telefono,$direccion);
            $carrito = new Carrito($documento);

            try {
                $this->clienteModel->insertar($cliente);
                $this->carritoModel->insertar($carrito);
                $this->actionIndex();
            } catch (\Throwable $th) {
                echo $th;
            }
        }else{
            echo "<script>alert('Datos Incompletos)</script>";
            header("location: ". URL);
        }        
    }

}