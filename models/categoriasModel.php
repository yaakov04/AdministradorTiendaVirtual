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
    }//
    public function insertarDB($datos){
        $categoria=$datos['nombre'];
        $nombre_categoria=$datos['codigo'];
        try{
            $conexion=$this->db->conexion();
            $stmt = $conexion->prepare(" INSERT INTO categorias (categoria, nombre_categoria) VALUES (?, ?) ");
            $stmt->bind_param("ss", $categoria, $nombre_categoria);
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
            $respuesta='error:' . $e;
        }
        return $respuesta;
    }//
}