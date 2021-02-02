<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->productos=array();
        $this->view->categorias=array();
    }
    function render(){
        $consultaDB=$this->model->getProductos();
        while($resultado=$consultaDB->fetch_assoc()){
            array_push($this->view->productos, $resultado);
        }
        $this->view->render('productos/index');
    }
    function agregar(){
        $consultaDB= $this->model->getCategorias();
        //var_dump($consultaDB->fetch_assoc());
        while($resultado=$consultaDB->fetch_assoc()){
            array_push($this->view->categorias, $resultado);
        }
        $this->view->render('productos/agregar');
    }
    function insertar(){
        //$consultaDB=$this->model->insertarDB();
        die(json_encode($_POST));
    }
}