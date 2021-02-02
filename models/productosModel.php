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
    public function getCategorias(){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT id, categoria FROM categorias  ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $this->db->cerrarConexion($conexion);
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//
    public function insertarDB($datos, $img_url){
        $img_producto=$img_url;
        $categoria=$datos['categoria'];
        $envio=$datos['costo_envio'];
        $descripcion_producto=$datos['descripcion'];
        $nombre=$datos['nombre'];
        $precio=$datos['precio'];
        $stock=$datos['stock'];

        try{
            $conexion=$this->db->conexion();
            $stmt = $conexion->prepare(" INSERT INTO productos (nombre_producto, categoria,img_producto,precio,descripcion_producto,envio,stock) VALUES (?,?,?,?,?,?,?) ");
            $stmt->bind_param("sissssi", $nombre, $categoria, $img_producto, $precio, $descripcion_producto, $envio, $stock);
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
    }
}