<?php
$host='localhost';
$db = 'php_classes';
$user = 'root';
$pass='';
$charset='utf8';
$dsn="mysql:host=$host; user=$user;dbname=$db;charset=$charset";
$opt = [  
    PDO::ATTR_ERRMODE                     => PDO::ERRMODE_EXCEPTION, //throw exceptions  
    PDO::ATTR_DEFAULT_FETCH_MODE          => PDO::FETCH_ASSOC,  
    // returns an array indexed by column name as returned in your result set  
];  
// PDO
$pdo = new PDO($dsn, $user, $pass, $opt);
?>