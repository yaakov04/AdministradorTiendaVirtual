<?php
class Buzon extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->render('buzon/index');
    }
    function mensaje($idmensaje){
        var_dump($idmensaje);
        $this->view->render('buzon/mensaje');
    }
    function nuevoMensaje(){
        $this->view->render('buzon/nuevoMensaje');
    }
}