<?php 
class buzonModel extends Model{
    public function __construct(){
        parent::__construct();
    }//
    public function getReclamos(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT mensajes.id as id_mensaje,mensajes.id_pedido as pedido, mensajes.nombre as nombre, mensajes.correo as correo, mensajes.asunto as asunto, DATE(mensajes.fecha) as fecha, mensajes.leido as leido, mensajes.id_reclamo as reclamo, reclamos.resuelto as resuelto FROM mensajes ";
            $sql.= " INNER JOIN reclamos ON mensajes.id_reclamo = reclamos.id ";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;

        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getReclamosSinResolver(){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT mensajes.id as id_mensaje,mensajes.id_pedido as pedido, mensajes.nombre as nombre, mensajes.correo as correo, mensajes.asunto as asunto, DATE(mensajes.fecha) as fecha, mensajes.leido as leido, mensajes.id_reclamo as reclamo, reclamos.resuelto as resuelto FROM mensajes ";
            $sql.= " INNER JOIN reclamos ON mensajes.id_reclamo = reclamos.id ";
            $sql.=" WHERE reclamos.resuelto = 0 ";
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;

        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    public function getReclamo($idreclamo){
        try{
            $conexion=$this->db->conexion();
            $sql=" SELECT mensajes.id as id_mensaje,mensajes.id_pedido as pedido, mensajes.nombre as nombre, mensajes.correo as correo, mensajes.asunto as asunto, DATE(mensajes.fecha) as fecha, mensajes.leido as leido, mensajes.id_venta as venta, mensajes.mensaje as mensaje, mensajes.id_reclamo as reclamo, reclamos.resuelto as resuelto FROM mensajes ";
            $sql.= " INNER JOIN reclamos ON mensajes.id_reclamo = reclamos.id ";
            $sql.=" WHERE mensajes.id_reclamo =".$idreclamo;
            $resultado=$conexion->query($sql);
            $conexion->close();
            return $resultado;

        }catch(Exception $e){
            return 'Error '. $e;
        }
    }//
    

    public function cambiarLeido($id_mensaje){
        try{
            $conexion=$this->db->conexion();
            $stmt = $conexion->prepare(" UPDATE `mensajes` SET `leido` = 1 WHERE `id` = ? ");
            $stmt->bind_param("i", $id_mensaje);
            $stmt->execute();
            
            if($stmt->affected_rows > 0){
                $respuesta='exito';
            }else{
                $respuesta='error';
            }
            $stmt->close();
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    
        return $respuesta;
    }//
    public function hayReclamo($reclamos_id, $venta_id, $pedido_id, $respuesta_mensaje){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT id FROM `mensajes` WHERE id_reclamo = $reclamos_id AND id_venta = $venta_id AND id_pedido = $pedido_id AND id = $respuesta_mensaje ";
            $resultado = $conexion->query($sql);
            $conexion->close();
            return $resultado;
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
        return $resultado;
    }//
    public function responderMensaje($datos){
        try{
            $conexion=$this->db->conexion();
            $stmt = $conexion->prepare(" INSERT INTO mensajes (id_reclamo, id_venta, id_pedido, nombre, asunto, mensaje) VALUES (?,?,?,?,?,?) ");
            $stmt->bind_param("iiisss", $datos['id_reclamo'], $datos['id_venta'], $datos['id_pedido'], $datos['nombre'],  $datos['asunto'], $datos['mensaje']);
            $stmt->execute();
            
            if($stmt->affected_rows > 0){
                $respuesta='exito';
            }else{
                $respuesta='error';
            }
            $stmt->close();
            $conexion->close();
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    
        return $respuesta;
    }//

}