<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->productos=array();
    }
    function render(){
        $consultaDB=$this->model->getProductos();
        while($resultado=$consultaDB->fetch_assoc()){
            array_push($this->view->productos, $resultado);
        }
        $this->view->render('productos/index');
    }
    function agregar(){
        $this->view->render('productos/agregar');
    }
}