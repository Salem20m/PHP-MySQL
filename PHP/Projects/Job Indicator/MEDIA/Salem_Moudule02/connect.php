<?php
	
	$user = 'root';
	$pass = '';
	
	$pdo = new PDO('mysql:host=localhost;dbname=job_indicator', $user, $pass);

	//$stmt = $pdo->prepare("SELECT * FROM job_indicator.applicant");
	//$stmt->execute(); // we pass the array to replace the placeholder
	//$user = $stmt->fetchAll(); // fetchAll returns all the rows
	//var_dump($user);
	
	
	function getAllAplicants()
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT * FROM job_indicator.applicant");
		$stmt->execute([]);
		return $stmt->fetchAll();
	}


?>

