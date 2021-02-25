<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
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
    }//
    function editarProducto($param){
        $id=$param[0];
        $consultaDB=$this->model->getProducto($id);
        $resultado=$consultaDB->fetch_assoc();
        $this->view->producto=$resultado;
        
        if ($consultaDB->num_rows>0) {
            $consultaDB= $this->model->getCategorias();
            while($resultado=$consultaDB->fetch_assoc()){
                array_push($this->view->categorias, $resultado);
            }
            $this->view->render('productos/editarProducto');
        }else{
            die('no existe ese producto');
        }
        
    }//
    function editar(){
        if ($_POST['categoria']==''||$_POST['costo_envio']==''||$_POST['descripcion']=='' || $_POST['nombre']==''||$_POST['precio']==''||$_POST['stock']=='') {
            $respuesta=$respuesta=array(
                'respuesta'=>'error',
                'mensaje'=>'campos vacios'
            );
        }else{
            if (!empty($_FILES)) {
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
                $consultaDB=$this->model->actualizarWithImg($_POST, $img_url);
                $respuesta=array(
                    'respuesta'=>$consultaDB,
                    'tipo'=>'editarProducto',
                    'mensaje'=>'Producto editado correctamente',
                    'resultado_imagen'=> $img_result
                );
            }else{
                $consultaDB=$this->model->actualizar($_POST);
                $respuesta=array(
                    'respuesta'=>$consultaDB,
                    'tipo'=>'editarProducto',
                    'mensaje'=>'Producto editado correctamente'
                );
            }

        }//comprobacion
        
        die(json_encode($respuesta));
    }//

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