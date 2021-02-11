<?php
class servicioVentas extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
    }//
    function render(){
        die('error');
    }
    function getVentasTotales(){
        $resultado=array();
        //obteniendo todas ventas 
        $consltaDB=$this->model->getNTotalVentas();
        $ventasTotales=$consltaDB->fetch_assoc()['numero_total_ventas'];
        array_push($resultado, $ventasTotales);
        //obteniendo ventas completadas
        $consltaDB=$this->model->getNTotalVentasCompletadas();
        $ventasCompletadas=$consltaDB->fetch_assoc()['numero_total_ventas'];
        array_push($resultado, $ventasCompletadas);
        //obteniendo ventas no completadas
        $consltaDB=$this->model->getNTotalVentasNoCompletadas();
        $ventasNoCompletadas=$consltaDB->fetch_assoc()['numero_total_ventas'];
        array_push($resultado, $ventasNoCompletadas);

        die(json_encode($resultado));
    }//

    function getVentasCompletas(){
        $numerosVentasPorDia=array();
        $dias=array();
        $consltaDB=$this->model->getVentasCompletas();
        
        while ($resultado=$consltaDB->fetch_assoc()) {
            array_push($numerosVentasPorDia, $resultado['numero_venta']);
            array_push($dias, $resultado['fecha']);
        }
        $respuesta=array(
            'numero_ventas_dias'   => $numerosVentasPorDia,
            'dia'                  => $dias
        );
        

        die(json_encode($respuesta));
    }
    
}