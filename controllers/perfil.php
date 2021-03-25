<?php
class Perfil extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
    }
    function render(){
        $this->view->datos_perfil=array();
        $consultaDB=$this->model->getDatosPerfil($_SESSION['id']);
        $resultado=$consultaDB->fetch_assoc();
        $this->view->datos_perfil=$resultado;
        $this->view->render('perfil/index');
    }

    function actualizar(){
        //comprueba si un campo viene vacio
        if ($_POST['email']==''&&$_POST['nombre']==''&&$_POST['username']=='') {
            $respuesta=array(
                'respuesta'=>'error'
            );
        }else{
            $correo=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
            $nombre=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $username=filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            if ($password=='') {
                
                $consultaDB=$this->model->actualizar(array(
                    'nombre'=>$nombre,
                    'username'=>$username,
                    'correo'=>$correo
                ));
                $respuesta=array(
                    'respuesta'=>$consultaDB,
                    'tipo'=>'actualizarPerfil'
                );
            }else{
                $consultaDB=$this->model->actualizarPass(array(
                    'nombre'=>$nombre,
                    'username'=>$username,
                    'correo'=>$correo,
                    'password'=>$password
                ));
                $respuesta=array(
                    'respuesta'=>$consultaDB,
                    'tipo'=>'actualizarPerfil'
                );
            }
            
        }
       
        
        die(json_encode($respuesta));
    }
}