<?php
	// CONNECTING
	$host = 'localhost';
	$db = 'auto';
	$user = 'root';
	$pass = '';
	$charset = 'utf8';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	
	$opt = [
		PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION, // to throw exceptions
		PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC
		// returns an array indexed by column name as returned in your result set
	];
	$pdo = new PDO($dsn, $user, $pass, $opt);
	
	function selectCar($id)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT * FROM auto WHERE id = ?");
		$stmt->execute([$id]); // we pass the array to replace the placeholder
		$user = $stmt->fetch(); // fetchAll returns all the rows
		
		return $user;
	}
	
	selectCar(1);
	
?>