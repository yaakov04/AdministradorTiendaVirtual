<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('productos/index');
    }
    function agregar(){
        $this->view->render('productos/agregar');
    }
}