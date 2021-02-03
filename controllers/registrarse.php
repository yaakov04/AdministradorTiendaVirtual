<?php
class registrarse extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('registrarse/index');
    }
    function registrar(){
        if ($_POST['usuario']==''||$_POST['nombre']==''||$_POST['apellido']==''||$_POST['password']=='') {
            die('Ningún campo debe ir vacio');
        }else{
            $consultaDB=$this->model->registrarDB($_POST);
            $respuesta=array(
                'respuesta'=>$consultaDB,
                'tipo'=>'registrarAdministrador',
                'mensaje'=>'Administrador registrado correctamente'
            );
            echo '<pre>';
            var_dump($respuesta);
            echo '</pre>';
            echo '<a href='.URL.'>Volver a la pagina principal</a>';
        }
        
        
    }
}