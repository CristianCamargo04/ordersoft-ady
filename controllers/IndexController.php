<?php

class IndexController extends Controller{

    public function __construct(){
    }

    public function actionIndex(){
        $this->view('index');
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