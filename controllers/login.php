<?php
class Login extends Controller{
    function __construct(){
        parent::__construct();
        if (isset($_GET['sesion'])) {
            if ($_GET['sesion']=='finalizada') {
                $_SESSION = array();
            }
        }

        if (isset($_SESSION['login'])) {
            if ($_SESSION['login']=true) {
                header('Location:'. URL.'dashboard');
            }
        }
    }
    function render(){
        $this->view->render('login/index');
    }
    function iniciarSesion(){
        if ($_POST['usuario']==''||$_POST['password']=='') {
            die('No pueden ir campos vacios');
        }else{
            $consultaDB=$this->model->iniciarSesion($_POST);
            switch ($consultaDB) {
                case 'exito':
                    header('Location: '.URL);
                    break;
                case 'error':
                    die('No existe el usuario o password incorrecto');
                    break;
                default:
                    # code...
                    break;
            }
        }
    }//
    
}//class