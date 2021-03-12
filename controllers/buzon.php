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
        $this->view->render('buzon/mensaje');
    }
    function nuevoMensaje(){
        //validando el get
        $respuesta_mensaje=filter_var($_GET['respuesta_mensaje'], FILTER_VALIDATE_INT);
        $reclamos_id=filter_var($_GET['reclamo_id'], FILTER_VALIDATE_INT);
        $venta_id=filter_var($_GET['venta_id'], FILTER_VALIDATE_INT);
        $pedido_id=filter_var($_GET['pedido_id'], FILTER_VALIDATE_INT);
        $asunto=filter_var($_GET['asunto'], FILTER_SANITIZE_STRING);
        if ($respuesta_mensaje&&$reclamos_id&&$venta_id&&$pedido_id) {
            //validando si existe reclamo
            $consultaDB=$this->model->hayReclamo($reclamos_id, $venta_id, $pedido_id, $respuesta_mensaje);
            if ($consultaDB->num_rows==1) {
                $this->view->datos=array(
                    'reclamos_id'       =>$reclamos_id,
                    'venta_id'          =>$venta_id,
                    'pedido_id'         =>$pedido_id,
                    'respuesta_mensaje' =>$respuesta_mensaje,
                    'asunto'            =>$asunto
                );
                $this->view->render('buzon/nuevoMensaje');
            }else{
                die('No existe ese reclamo');
            }
            
        }else{
            die('No es un campo valido');
        }
        
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
    function responderMensaje(){
        //validando post
        $reclamos_id=filter_var($_POST['reclamos_id'], FILTER_VALIDATE_INT);
        $venta_id=filter_var($_POST['venta_id'], FILTER_VALIDATE_INT);
        $pedido_id=filter_var($_POST['pedido_id'], FILTER_VALIDATE_INT);
        $respuesta_mensaje=filter_var($_POST['respuesta_mensaje'], FILTER_VALIDATE_INT);
        $asunto=filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);
        $mensaje_nuevo=filter_var($_POST['mensaje-nuevo'], FILTER_SANITIZE_STRING);
        if ($reclamos_id&&$venta_id&&$pedido_id&&$respuesta_mensaje) {
            //validando si existe reclamo
            $consultaDB=$this->model->hayReclamo($reclamos_id, $venta_id, $pedido_id, $respuesta_mensaje);
            if ($consultaDB->num_rows==1) {
                //insertar en la BD
                $consultaDB=$this->model->responderMensaje([
                    'id_reclamo'    =>$reclamos_id,
                    'id_venta'      =>$venta_id,
                    'id_pedido'     =>$pedido_id,
                    'nombre'        =>$_SESSION['nombre'],
                    'asunto'        =>$asunto,
                    'mensaje'       =>$mensaje_nuevo
                ]);
                $respuesta=array(
                    'respuesta'=>$consultaDB,
                    'tipo'=>'responderMensaje',
                    'reclamo'=>$reclamos_id,
                    'post'=>$_POST
                );
                
            }else{
                $respuesta=array(
                    'respuesta'=>'error',
                    'mensaje'=>'No existe ese reclamo'
                );
            }
        }else{
            $respuesta=array(
                'respuesta'=>'error',
                'mensaje'=>'Campos no validos'
            );
        }
        die(json_encode($respuesta));
    }
}