<?php
class dashboardModel extends Model{
    public function __parent(){
        parent::__parent();
    }//
    public function getNEnviosPendientes(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT COUNT(*) AS numero_envios_pendientes FROM ventas WHERE estatus = 2 ";
        
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getNVentasTotales(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT COUNT(*) AS numero_ventas_totales FROM ventas WHERE MONTH(fecha)= MONTH(CURRENT_DATE()) ";
        
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getNVentasCompletadas(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT COUNT(*) AS numero_ventas_completadas FROM ventas WHERE MONTH(fecha)= MONTH(CURRENT_DATE()) AND estatus >= 2 ";
        
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getNVentasPendientes(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT COUNT(*) AS numero_ventas_completadas FROM ventas WHERE MONTH(fecha)= MONTH(CURRENT_DATE()) AND estatus < 2 ";
        
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getGananciasTotales(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT SUM(total) AS ganancias_totales FROM ventas WHERE estatus >= 2 AND MONTH(fecha)= MONTH(CURRENT_DATE()) ";
        
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }
    public function getEnviosPendientes(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT ventas.id as id_venta, estados.estado as estatus, usuarios.nombre as comprador, DATE(ventas.fecha) as fecha, ventas.datos_envio as datos_envio, ventas.total as total, pedidos.id as id_pedido, pedidos.cantidad as cantidad_articulo, pedidos.precio as precio_articulo, productos.nombre_producto as nombre_producto ";
            $sql.=" FROM ventas INNER JOIN usuarios ON ventas.id_cliente = usuarios.id ";
            $sql.=" INNER JOIN pedidos ON ventas.id = pedidos.id_venta ";
            $sql.=" INNER JOIN estados ON ventas.estatus = estados.id ";
            $sql.=" INNER JOIN productos ON pedidos.id_producto = productos.id WHERE estatus = 2 ";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getReclamos(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT count(*) as numero_reclamos FROM reclamos WHERE resuelto = 0 ";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }
}//Class