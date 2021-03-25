<?php
class perfilModel extends Model {
    public function __construct(){
        parent::__construct();
    }
    public function getDatosPerfil($id){
        try{
            $conexion=$this->db->conexion();
            $sql= " SELECT usuario, nombre, correo FROM admins WHERE id = $id ";
            $resultado = $conexion->query($sql);
            return $resultado;
            $this->db->cerrarConexion($conexion);
        }catch (Exception $e) {
            echo 'error:' . $e;
        }
    }//
    public function actualizar($datos){
        try{
            $conexion=$this->db->conexion();
            $stmt=$conexion->prepare(" UPDATE admins SET usuario = ?, nombre = ?, correo = ?, editado = NOW() WHERE id = ? ");
            $stmt->bind_param("sssi", $datos['username'], $datos['nombre'], $datos['correo'], $_SESSION['id'] );
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

    public function actualizarPass($datos){
        $opciones=array(
            'cost' => 12
        );
        $password= password_hash($datos['password'], PASSWORD_BCRYPT, $opciones);
        try{
            $conexion=$this->db->conexion();
            $stmt=$conexion->prepare(" UPDATE admins SET usuario = ?, nombre = ?, correo = ?, password = ?, editado = NOW() WHERE id = ? ");
            $stmt->bind_param("ssssi", $datos['username'], $datos['nombre'], $datos['correo'], $password, $_SESSION['id'] );
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
    }
}