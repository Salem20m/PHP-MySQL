<?php  
$host = 'localhost';  
$db   = 'russia';  
$user = 'root';  
$pass = '';  
$charset = 'utf8';  
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";  
$opt = [  
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //throw exceptions  
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  
	// returns an array indexed by column name as returned in your result set  
	];  
$pdo = new PDO($dsn, $user, $pass, $opt);  
?>  