<?php
class productosModel extends Model{
    public function __construct(){
        parent::__construct();
    }//
    public function getProducto($id){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT * FROM productos WHERE id = $id ";

            $resultado = $conexion->query($sql);
            $this->db->cerrarConexion($conexion);
            return $resultado;
            
            
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }
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
    }//
    public function actualizarWithImg($datos, $img_url){
        $enOferta=(int) filter_var($datos['enOferta'], FILTER_VALIDATE_BOOLEAN);
        
        try{
            $conexion=$this->db->conexion();
            $stmt=$conexion->prepare(" UPDATE productos SET nombre_producto = ?, categoria = ?, img_producto = ?, precio = ?, descripcion_producto = ?, envio = ?, stock = ?, oferta = ?, editado = NOW() WHERE id = ? ");
            $stmt->bind_param("sissssiii", $datos['nombre'], $datos['categoria'], $img_url, $datos['precio'], $datos['descripcion'], $datos['costo_envio'], $datos['stock'], $enOferta, $datos['id_producto'] );
            $stmt->execute();
            if ($stmt->affected_rows>0) {
                $respuesta='exito';
            }else{
                $respuesta='error';
            }
        }catch(Exception $e){
            $respuesta='error: '. $e;
        }
        return $respuesta;
    }//

    public function actualizar($datos){
        $enOferta=(int) filter_var($datos['enOferta'], FILTER_VALIDATE_BOOLEAN);
        
        try{
            $conexion=$this->db->conexion();
            $stmt=$conexion->prepare(" UPDATE productos SET nombre_producto = ?, categoria = ?, precio = ?, descripcion_producto = ?, envio = ?, stock = ?, oferta = ?, editado = NOW() WHERE id = ? ");
            $stmt->bind_param("sisssiii", $datos['nombre'], $datos['categoria'], $datos['precio'], $datos['descripcion'], $datos['costo_envio'], $datos['stock'], $enOferta, $datos['id_producto'] );
            $stmt->execute();
            if ($stmt->affected_rows>0) {
                $respuesta='exito';
            }else{
                $respuesta='error';
            }
        }catch(Exception $e){
            $respuesta='error: '. $e;
        }
        return $respuesta;
    }//
}//Class