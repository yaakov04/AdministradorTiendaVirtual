<?php
class Categorias extends Controller{
    function __construct(){
        parent::__construct();
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
}