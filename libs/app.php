<?php
class App{
    function __construct(){
        $url=isset($_GET['url'])?$_GET['url']:null;
        $url = rtrim($url, '/');
        $url =explode('/', $url);
        
        if (empty($url[0])) {
            $archivoControlador= 'controllers/dashboard.php';
            require $archivoControlador;
            $controlador = new Dashboard();
            $controlador->render();
            return false;
        }
        


    }//construct

}