<?php
class servicioVentasModel extends Model{
    public function __construct(){
        parent::__construct();
    }//

    public function getNTotalVentas(){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT COUNT(*) as 'numero_total_ventas' FROM ventas WHERE MONTH(fecha)= MONTH(CURRENT_DATE()) ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $this->db->cerrarConexion($conexion);
        }catch (Exception $e) {
            echo 'error:' . $e;
            return 'error:' . $e;
        }
    }//

    public function getNTotalVentasCompletadas(){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT COUNT(*) as 'numero_total_ventas' FROM ventas WHERE estatus >= 2 AND MONTH(fecha)= MONTH(CURRENT_DATE()) ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $this->db->cerrarConexion($conexion);
        }catch (Exception $e) {
            echo 'error:' . $e;
            return 'error:' . $e;
        }
    }//

    public function getNTotalVentasNoCompletadas(){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT COUNT(*) as 'numero_total_ventas' FROM ventas WHERE estatus < 2 AND MONTH(fecha)= MONTH(CURRENT_DATE()) ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $this->db->cerrarConexion($conexion);
        }catch (Exception $e) {
            echo 'error:' . $e;
            return 'error:' . $e;
        }
    }//

    public function getVentasCompletas(){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT COUNT(*) as numero_venta, DATE(fecha) as fecha FROM ventas WHERE estatus >= 2 AND MONTH(fecha)= MONTH(CURRENT_DATE()) GROUP BY DATE(fecha) ORDER BY fecha ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $this->db->cerrarConexion($conexion);
        }catch (Exception $e) {
            echo 'error:' . $e;
            return 'error:' . $e;
        }
    }

}//Class