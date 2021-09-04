<?php

require_once 'App.php';
require_once 'Controller.php';
require_once 'Model.php';

function __autoload($className) {
    require_once 'models/' . $className . '.php';
}
?>