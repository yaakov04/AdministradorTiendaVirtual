<?php
class App{
    function __construct(){
        $url=isset($_GET['url'])?$_GET['url']:null;
        $url = rtrim($url, '/');
        $url =explode('/', $url);
        
        if (empty($url[0])) {
            echo 'este es la pagina de inicio';
            return false;
        }
        


    }//construct

}