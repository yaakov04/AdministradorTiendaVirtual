<?php
class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
        require_once 'config/sessions.php';
    }
    function render(){
        $this->view->render('dashboard/index');
    }

}//Class