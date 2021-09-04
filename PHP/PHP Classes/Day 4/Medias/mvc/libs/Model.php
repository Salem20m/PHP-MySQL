<?php

class Model extends PDO
{
    public $attributes = [];

    public function __construct() {
        parent::__construct('mysql:host=localhost;dbname=mvc;charset=utf8', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }    
}
?>