<?php
include 'entities/Cliente.php';
include 'models/clientemodel.php';
include 'models/carritomodel.php';

class ClienteController extends Controller{

   protected $clienteModel;
   protected $carritoModel;

    public function __construct(){
        $this->clienteModel = $this->model('cliente'); 
        $this->carritoModel = $this->model('carrito'); 
    }

    public function actionIndex(){
        $this->view('index');
    }

    public function actionHome(){
        $this->view('cliente/home');
    }

    public function actionError(){
        $datos = ["titlo" => 'error'];
        $this->view('error',$datos);
    }

    public function actionLogin(){
        if(isset($_POST['email'],$_POST['contraseña'])){
            session_start();
            $email = $_POST['email'];
            $contrasena = $_POST['contraseña'];
    
            $clienteModel = new ClienteModel();
                if($clienteModel->existe($email,$contrasena) != null){
                    $doc = $clienteModel->existe($email,$contrasena);
                    $_SESSION['cliente'] = $doc;
                    echo $_SESSION['cliente'];
                    $this->actionHome();
                }else{
                    echo "<script>alert('Datos Incorrectos')</script>";
                    $this->actionIndex();
                }
            $this->actionIndex();
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
            $this->actionIndex();
        }        
    }

}