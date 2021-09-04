<?php

class App
{
    public function init() {
        // var_dump($_GET['q']);
        
        $action = 'actionIndex';
        $param = null;

        if (isset($_GET['q'])) {
            $splitted = explode('/', $_GET['q']);
            $controllerName = array_shift($splitted) . 'Controller';
            if (isset($splitted[0])) {
                $action = 'action' . array_shift($splitted);
            }
            
            if (isset($splitted[0])) {
                $param = array_shift($splitted);
            }
            
            require_once 'controllers/' . $controllerName . '.php';
            $controller = new $controllerName;
            $controller->{$action}($param);
        } 
    }
}

?>