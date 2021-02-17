<?php
class ventasModel extends Model{
    public function __construct(){
        parent::__construct();
    }//
    public function getTodasVentas(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT ventas.id as id_venta, estados.estado as estatus, usuarios.nombre as comprador, DATE(ventas.fecha) as fecha, ventas.datos_envio as datos_envio, ventas.total as total, pedidos.id as id_pedido, pedidos.cantidad as cantidad_articulo, pedidos.precio as precio_articulo, productos.nombre_producto as nombre_producto ";
            $sql.=" FROM ventas INNER JOIN usuarios ON ventas.id_cliente = usuarios.id ";
            $sql.=" INNER JOIN pedidos ON ventas.id = pedidos.id_venta ";
            $sql.=" INNER JOIN estados ON ventas.estatus = estados.id ";
            $sql.=" INNER JOIN productos ON pedidos.id_producto = productos.id ORDER BY id_venta DESC";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;

        }catch(Exception $e){
            return 'Error '. $e;
        }
    }
    public function getVentasCompletadas(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT ventas.id as id_venta, estados.estado as estatus, usuarios.nombre as comprador, DATE(ventas.fecha) as fecha, ventas.datos_envio as datos_envio, ventas.total as total, pedidos.id as id_pedido, pedidos.cantidad as cantidad_articulo, pedidos.precio as precio_articulo, productos.nombre_producto as nombre_producto ";
            $sql.=" FROM ventas INNER JOIN usuarios ON ventas.id_cliente = usuarios.id ";
            $sql.=" INNER JOIN pedidos ON ventas.id = pedidos.id_venta ";
            $sql.=" INNER JOIN estados ON ventas.estatus = estados.id ";
            $sql.=" INNER JOIN productos ON pedidos.id_producto = productos.id WHERE estatus >= 2 ";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getVentasPendientes(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT ventas.id as id_venta, estados.estado as estatus, usuarios.nombre as comprador, DATE(ventas.fecha) as fecha, ventas.datos_envio as datos_envio, ventas.total as total, pedidos.id as id_pedido, pedidos.cantidad as cantidad_articulo, pedidos.precio as precio_articulo, productos.nombre_producto as nombre_producto ";
            $sql.=" FROM ventas INNER JOIN usuarios ON ventas.id_cliente = usuarios.id ";
            $sql.=" INNER JOIN pedidos ON ventas.id = pedidos.id_venta ";
            $sql.=" INNER JOIN estados ON ventas.estatus = estados.id ";
            $sql.=" INNER JOIN productos ON pedidos.id_producto = productos.id WHERE estatus < 2 ";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//

    public function detallesVentas($id){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT ventas.id as id_venta, estados.estado as estatus, usuarios.nombre as comprador, DATE(ventas.fecha) as fecha, ventas.datos_envio as datos_envio, ventas.total as total, pedidos.id as id_pedido, pedidos.cantidad as cantidad_articulo, pedidos.precio as precio_articulo, productos.nombre_producto as nombre_producto ";
            $sql.=" FROM ventas INNER JOIN usuarios ON ventas.id_cliente = usuarios.id ";
            $sql.=" INNER JOIN pedidos ON ventas.id = pedidos.id_venta ";
            $sql.=" INNER JOIN estados ON ventas.estatus = estados.id ";
            $sql.=" INNER JOIN productos ON pedidos.id_producto = productos.id WHERE ventas.id = ". $id;
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getEstados(){
        try{
            $conexion = $this->db->conexion();
            $sql=" SELECT * FROM estados ";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
}