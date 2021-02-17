<?php
class Ventas extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
        $this->view->ventas=array();
    }
    function render(){
        $consultaDB=$this->model->getTodasVentas();
        $ventas=array();
        while ($resultado =$consultaDB->fetch_assoc()) {
            //comprobar si existe venta
            if (isset($ventas[$resultado['id_venta']])) {
                //existe->comprueba si existe pedido
                if (isset($ventas[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']])) {
                    //existe->no hagas nada
                }else{
                    //existe->agrega pedido
                    $precio =new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
                    $precio=$precio->formatCurrency((int)$resultado['precio_articulo'], 'MXN');
                    $ventas[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']]=array(
                        'nombre_producto' =>$resultado['nombre_producto'],
                        'cantidad_producto'=>$resultado['cantidad_articulo'],
                        'precio_producto'=>$precio
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
        $this->view->ventas=$ventas;
        $this->view->render('ventas/index');
    }//
    function completadas(){
        $consultaDB=$this->model->getVentasCompletadas();
        $ventas=array();
        while ($resultado =$consultaDB->fetch_assoc()) {
            //comprobar si existe venta
            if (isset($ventas[$resultado['id_venta']])) {
                //existe->comprueba si existe pedido
                if (isset($ventas[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']])) {
                    //existe->no hagas nada
                }else{
                    //existe->agrega pedido
                    $precio =new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
                    $precio=$precio->formatCurrency((int)$resultado['precio_articulo'], 'MXN');
                    $ventas[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']]=array(
                        'nombre_producto' =>$resultado['nombre_producto'],
                        'cantidad_producto'=>$resultado['cantidad_articulo'],
                        'precio_producto'=>$precio
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
        $this->view->ventas=$ventas;
        $this->view->render('ventas/completadas');
    }//
    function pendientes(){
        $consultaDB=$this->model->getVentasPendientes();
        $ventas=array();
        while ($resultado =$consultaDB->fetch_assoc()) {
            //comprobar si existe venta
            if (isset($ventas[$resultado['id_venta']])) {
                //existe->comprueba si existe pedido
                if (isset($ventas[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']])) {
                    //existe->no hagas nada
                }else{
                    //existe->agrega pedido
                    $precio =new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
                    $precio=$precio->formatCurrency((int)$resultado['precio_articulo'], 'MXN');
                    $ventas[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']]=array(
                        'nombre_producto' =>$resultado['nombre_producto'],
                        'cantidad_producto'=>$resultado['cantidad_articulo'],
                        'precio_producto'=>$precio
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
        $this->view->ventas=$ventas;
        $this->view->render('ventas/pendientes');
    }//
    
    function detallesVentas($param){
        $id = $param[0];
        $consultaDB=$this->model->detallesVentas($id);
        if ($consultaDB->num_rows>0) {
            $venta=array();
            while ($resultado=$consultaDB->fetch_assoc()) {
                //comprobar si existe venta
                if (isset($venta[$resultado['id_venta']])) {
                    //existe->comprueba si existe pedido
                    if (isset($venta[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']])) {
                        //existe->no hagas nada
                    }else{
                        //existe->agrega pedido
                        $precio =new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
                        $precio=$precio->formatCurrency((int)$resultado['precio_articulo'], 'MXN');

                        $venta[$resultado['id_venta']]['detalles_pedido'][$resultado['id_pedido']]=array(
                            'nombre_producto' =>$resultado['nombre_producto'],
                            'cantidad_producto'=>$resultado['cantidad_articulo'],
                            'precio_producto'=>$precio
                        );
                    }
                    
                }else{
                    //¬exista->agregaVenta
                    $total=new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
                    $total=$total->formatCurrency($resultado['total'], 'MXN');
                    $precio =new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
                    $precio=$precio->formatCurrency((int)$resultado['precio_articulo'], 'MXN');
                    $venta[$resultado['id_venta']]=array(
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
            }
            $this->view->ventas=$venta;
            $consultaDB=$this->model->getEstados();
            $this->view->estatus=array();
            while ($resultado=$consultaDB->fetch_assoc()) {
                array_push($this->view->estatus, $resultado);
            }
            var_dump($this->view->estatus);
            $this->view->render('ventas/detallesVentas');
        }else{
            die('No se encontro el recurso');
        }
        
    }
}//Class