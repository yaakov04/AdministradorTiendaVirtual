<?php
class loginModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function iniciarSesion($datos){
        $usuario = $datos['usuario'];
        $password = $datos['password'];

        try{
        $conexion=$this->db->conexion();
        $stmt = $conexion->prepare(" SELECT id, usuario, nombre, password FROM admins WHERE usuario = ? ");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($result_id, $result_usuario, $result_nombre, $result_password);
        $usuario_existe= $stmt->fetch();

        if ($usuario_existe) {
            if (password_verify($password, $result_password)) {
                //inicia sesion
                $_SESSION['id']=$result_id;
                $_SESSION['nombre']=$result_nombre;
                $_SESSION['usuario']=$result_usuario;
                $_SESSION['login']=true;
                $respuesta='exito';
            }else{
                //password incorrecto
                $respuesta='error';
            }
        }else{
            //No existe el usuario
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