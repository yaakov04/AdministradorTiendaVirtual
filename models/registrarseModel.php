<?php
class registrarseModel extends Model{
    public function __construct(){
        parent::__construct();
    }//
    public function registrarDB($datos){
        $usuario=$datos['usuario'];
        $nombre =$datos['nombre'].' '.$datos['apellido'];
        $correo=$datos['email'];
        $opciones=array(
            'cost' => 12
        );
        $password= password_hash($datos['password'], PASSWORD_BCRYPT, $opciones);
        try{
            $conexion=$this->db->conexion();
            $stmt = $conexion->prepare(" INSERT INTO admins (usuario,nombre, password,correo) VALUES (?,?,?,?) ");
            $stmt->bind_param("ssss", $usuario, $nombre, $password,$correo);
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
    }
}