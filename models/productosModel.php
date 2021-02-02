<?php
class productosModel extends Model{
    public function __construct(){
        parent::__construct();
    }//
    public function getProductos(){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT * FROM productos  ";

            $resultado = $conexion->query($sql);
            
            //var_dump($resultado->fetch_assoc());
            return $resultado;
            $this->db->cerrarConexion($conexion);
            
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//
    public function insertarDB(){
        return 'model';
    }
}