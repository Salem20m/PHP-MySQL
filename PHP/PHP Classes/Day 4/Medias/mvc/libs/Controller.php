<?php

class Controller
{
    public function render($view, $data = array()) {
        extract($data);
        ob_start();
        include 'views/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();
        require_once 'views/layouts/main.php';
    }
}
?>