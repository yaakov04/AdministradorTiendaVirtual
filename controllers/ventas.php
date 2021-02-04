<?php
class Ventas extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
    }
    function render(){
        $this->view->render('ventas/index');
    }
    function completadas(){
        $this->view->render('ventas/completadas');
    }
    function pendientes(){
        $this->view->render('ventas/pendientes');
    }
}