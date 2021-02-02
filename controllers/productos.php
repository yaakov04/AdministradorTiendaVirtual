<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->productos=array();
        $this->view->categorias=array();
    }
    function render(){
        $consultaDB=$this->model->getProductos();
        while($resultado=$consultaDB->fetch_assoc()){
            array_push($this->view->productos, $resultado);
        }
        $this->view->render('productos/index');
    }
    function agregar(){
        $consultaDB= $this->model->getCategorias();
        while($resultado=$consultaDB->fetch_assoc()){
            array_push($this->view->categorias, $resultado);
        }
        $this->view->render('productos/agregar');
    }
    function insertar(){
       if ($_POST['categoria']==''||$_POST['costo_envio']==''||$_POST['descripcion']=='' || $_POST['nombre']==''||$_POST['precio']==''||$_POST['stock']==''||!isset($_FILES)) {
            $respuesta=$respuesta=array(
                'respuesta'=>'error',
                'mensaje'=>'campos vacios'
            );
        }else{
            $directorio='../elPuestito/public/img/img_productos/';
            //¬$directorio->mkdir
            if (!is_dir($directorio)) {
                mkdir($directorio, 0755, true);
                $test=$directorio;
            }
            //guardar archivo
            if (move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio.$_FILES['archivo']['name'])) {
                $img_url=$_FILES['archivo']['name'];
                $img_result='La imagen se subio correctamente';
            }else{
                $respuesta=array(
                    'respuesta' => error_get_last()
                );
                die(json_encode($respuesta));
            }
            $consultaDB=$this->model->insertarDB($_POST,$img_url);
            $respuesta=array(
                'respuesta'=>$consultaDB,
                'tipo'=>'registrarProducto',
                'mensaje'=>'Producto agregado correctamente',
                'resultado_imagen'=> $img_result
            );
        }
        
        die(json_encode($respuesta));
    }
}