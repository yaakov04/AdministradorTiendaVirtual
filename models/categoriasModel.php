<?php
class categoriasModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function getCategorias(){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT * FROM categorias  ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $this->db->cerrarConexion($conexion);
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }
}