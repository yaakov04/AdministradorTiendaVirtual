<?php
class Categorias extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
        $this->view->categorias=array();
    }
    function render(){
        $consultaDB=$this->model->getCategorias();
        while ($resultado = $consultaDB->fetch_assoc()) {
            array_push($this->view->categorias, $resultado);
        }
        $this->view->render('categorias/index');
    }
    function agregar(){
        $this->view->render('categorias/agregar');
    }

    function insertar(){
        if ($_POST['nombre']==''||$_POST['codigo']=='') {
            $respuesta=$respuesta=array(
                'respuesta'=>'error',
                'mensaje'=>'campos vacios'
            );
        }else{
            $consultaDB=$this->model->insertarDB($_POST);
            $respuesta=array(
                'respuesta'=>$consultaDB,
                'tipo'=>'registrarCategoria',
                'mensaje'=>'Categoria agregada correctamente'
            );
        }
        die(json_encode($respuesta));
    }
}