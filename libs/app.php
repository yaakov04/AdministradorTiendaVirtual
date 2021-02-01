<?php
class App{
    function __construct(){
        $url=isset($_GET['url'])?$_GET['url']:null;
        $url = rtrim($url, '/');
        $url =explode('/', $url);
        
        if (empty($url[0])) {
            $archivoControlador= 'controllers/dashboard.php';
            require_once $archivoControlador;
            $controlador = new Dashboard();
            $controlador->render();
            return false;
        }
        $archivoControlador='controllers/'.$url[0].'.php';
        if (file_exists($archivoControlador)) {
            require_once $archivoControlador;
            $controlador= new $url[0];
            //$controlador->render();
            $nparam=sizeof($url);
            if ($nparam>1) {
                if ($nparam>2) {
                    $param=array();
                    for($i=2;$i<$nparam;$i++){
                        array_push($param, $url[$i]);
                    }
                    $controlador->{$url[1]}($param);
                }else{
                    $controlador->{$url[1]}();
                }
            }else{
                $controlador->render();
            }
            // if (isset($url[1])) {
            //     $controlador->{$url[1]}();
            // }else{
            //     $controlador->render();
            // }
        }

        


    }//construct

}