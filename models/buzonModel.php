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

}