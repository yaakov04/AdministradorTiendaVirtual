<?php
class Database{
    private $host;
    private $user;
    private $password;
    private $db;

    public function __construct(){
        error_reporting(E_ALL);
        $this->host=HOST;
        $this->user=USER;
        $this->password=PASSWORD;
        $this->db=DB;
    }
    public function conexion(){
        $conexion= new mysqli($this->host, $this->user, $this->password, $this->db);
        if ($conexion->connect_error) {
            echo $conexion->connect_error;
            die();
        }
        return $conexion;
    }//
    public function cerrarConexion($conexion){
        $conexion->close();
    }
    
}