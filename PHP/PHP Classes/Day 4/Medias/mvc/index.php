<?php

define("URL", "http://".$_SERVER['SERVER_NAME'].explode("index.php", $_SERVER['SCRIPT_NAME'])[0]);

ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once 'libs/autoload.php';
$app = new App;
$app->init();

?>