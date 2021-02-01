<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'libs/database.php';
require_once 'config/config.php';
require_once 'libs/model.php';
require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/app.php';



$app = new App();

?>