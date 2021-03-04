<?php
class Buzon extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
    }
    function render(){
        $consultaDB=$this->model->getReclamos();
        $this->view->reclamos=array();
        while ($resultado=$consultaDB->fetch_assoc()) {
            array_push($this->view->reclamos, $resultado);
        }
        
        $this->view->render('buzon/index');
    }//
    function sin_resolver(){
        $consultaDB=$this->model->getReclamosSinResolver();
        $this->view->reclamos=array();
        while ($resultado=$consultaDB->fetch_assoc()) {
            array_push($this->view->reclamos, $resultado);
        }
        
        $this->view->render('buzon/sin_resolver');
    }
    function mensaje($idreclamo){
        $consultaDB=$this->model->getReclamo($idreclamo[0]);
        $this->view->mensajes=array();
        while ($resultado=$consultaDB->fetch_assoc()) {
            array_push($this->view->mensajes, $resultado);
        }
        var_dump($this->view->mensajes);
        $this->view->render('buzon/mensaje');
    }
    function nuevoMensaje(){
        $this->view->render('buzon/nuevoMensaje');
    }//

    function cambiarLeido(){
        $consultaDB=$this->model->cambiarLeido($_POST['id_mensaje']);
        $respuesta=array(
            'respuesta'=>$consultaDB,
            'tipo'=>'cambiarLeido',
            'enlace'=>$_POST['enlace']
        );
        die(json_encode($respuesta));
    }//
}