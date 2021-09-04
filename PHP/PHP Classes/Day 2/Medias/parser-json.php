<?php
// DECODE
// Array
$json = file_get_contents($url);  
$data = json_decode($json);  

// Object
$data = json_decode($json, TRUE);  

//ENCODE
// Array
$json = json_encode($array);  

// Object
$json = json_encode((array)$object);  
