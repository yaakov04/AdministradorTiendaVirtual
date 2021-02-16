<?php
class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
    }
    function render(){
        $this->view->render('dashboard/index');
    }//
    function enviosPendientes(){
        $consultaDB=$this->model->getEnviosPendientes();
        $ventas=array();
        while ($resultado =$consultaDB->fetch_assoc()) {
            //comprobar si existe venta
            if (isset($ventas[$resultado['id_venta']])) {
                //existe->comprueba si existe pedido
                if (isset($ventas[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']])) {
                    //existe->no hagas nada
                }else{
                    //existe->agrega pedido
                    $ventas[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']]=array(
                        'nombre_producto' =>$resultado['nombre_producto'],
                        'cantidad_producto'=>$resultado['cantidad_articulo'],
                        'precio_producto'=>$resultado['precio_articulo']
                    );
                }
                
            }else{
                //¬exista->agregaVenta
                $total=new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
                $total=$total->formatCurrency($resultado['total'], 'MXN');
                $precio =new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
                $precio=$precio->formatCurrency((int)$resultado['precio_articulo'], 'MXN');
                $ventas[$resultado['id_venta']]=array(
                    'id_venta'          =>$resultado['id_venta'],
                    'estatus'           =>$resultado['estatus'],
                    'comprador'         =>$resultado['comprador'],
                    'fecha_venta'       =>$resultado['fecha'],
                    'detalles_pedido'   =>array(
                        $resultado['id_pedido']     =>array(
                            'nombre_producto' =>$resultado['nombre_producto'],
                            'cantidad_producto'=>$resultado['cantidad_articulo'],
                            'precio_producto'=>$precio
                        )
                    ),
                    'datos_envio'       =>$resultado['datos_envio'],
                    'total'             =>$total
                );
            }
            
        }//while
        //
        $this->view->ventas=$ventas;
        $this->view->render('dashboard/enviosPendientes');
    }

}//Class