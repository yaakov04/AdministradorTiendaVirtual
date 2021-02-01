<?php
class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        // $test= new Database();
        // //var_dump($test->conexion());
        // try{
        //     $conexion=$test->conexion();
        //     $sql= " SELECT * FROM productos  ";

        //     $resultado = $conexion->query($sql);
            
        //     var_dump($resultado->fetch_assoc());
        //     $test->cerrarConexion($conexion);
            
        // }catch (Exception $e) {
        //     echo 'error:' . $e;
        // }
        $this->view->render('dashboard/index');
    }

}//Class