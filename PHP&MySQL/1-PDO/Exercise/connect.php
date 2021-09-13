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
	
	//Car
	function selectCar($id)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT * FROM auto WHERE id = ?");
		$stmt->execute([$id]); // we pass the array to replace the placeholder
		$user = $stmt->fetch(); // fetchAll returns all the rows
		
		return $user;
	}
	function selectAllCars()
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT * FROM auto");
		$stmt->execute([]); // we pass the array to replace the placeholder
		$user = $stmt->fetchAll(); // fetchAll returns all the rows
		
		return $user;
	}
	function createCar($model, $year, $manufaturer_id, $featureArray)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("INSERT INTO auto
    							(model, year, manufacturer_id) VALUES (?,?,?) ");
		$stmt->execute([$model, $year, $manufaturer_id]);
		$last_id = $pdo->lastInsertId();
		
		foreach($featureArray as $f){
			addFeature($last_id, $f);
		}
		
		return $last_id;
	}
	
	function updateCar($id, $model, $year, $manufaturer_id, $featureArray)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("UPDATE auto SET model = ?, year=?, manufacturer_id= ?
                WHERE id = ?;");
		$stmt->execute([$model, $year, $manufaturer_id, $id]);
		

		
		
		$stmt = $pdo->prepare("DELETE FROM auto_feature
                WHERE auto_id = ?;");
		$stmt->execute([$id]);

		foreach($featureArray as $f){
			addFeature($id, $f);
		}
		return "Hello";
		
	}

	
	//Manufacturer
	function selectMan($id)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT name FROM manufacturer WHERE id = ?");
		$stmt->execute([$id]); // we pass the array to replace the placeholder
		$user = $stmt->fetchColumn(); // fetchAll returns all the rows
		
		return $user;
	}
	function getManName($id)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT name FROM manufacturer WHERE id = ?");
		$stmt->execute([$id]); // we pass the array to replace the placeholder
		
		return $stmt->fetchColumn(); // fetchColumn - Returns a single column from the next row of a result set
	}
	function selectAllMans()
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT * FROM manufacturer ORDER BY name");
		$stmt->execute([]); // we pass the array to replace the placeholder
		$user = $stmt->fetchAll(); // fetchAll returns all the rows
		
		return $user;
	}
	function createMan($name)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("INSERT INTO manufacturer
    							(name) VALUES (?) ");
		$stmt->execute([$name]);
	}
	function updateMan($id, $newName)
	{
		global $pdo;
		
		$check = $pdo->prepare("SELECT name FROM manufacturer WHERE name= ? ");
		$check->execute([$newName]);
		$result = $check->fetch();
		if($result != []) return false;
		
		$check = $pdo->prepare("UPDATE manufacturer SET name = ?
    								WHERE id = ?; ");
		$check->execute([$newName, $id]);
		return true;
	}
	
	
	//Features
	function getFeatureName($id)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT name FROM feature WHERE id = ?");
		$stmt->execute([$id]); // we pass the array to replace the placeholder
		$user = $stmt->fetchColumn(); // fetchAll returns all the rows
		
		return $user;
	}
	function selectAllFeatures()
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT * FROM feature");
		$stmt->execute([]); // we pass the array to replace the placeholder
		$user = $stmt->fetchAll(); // fetchAll returns all the rows
		
		return $user;
	}
	function createFeature($name)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("INSERT INTO feature
    							(name) VALUES (?) ");
		$stmt->execute([$name]);
	}
	function updateFeature($id, $newName)
	{
		global $pdo;
		
		$check = $pdo->prepare("SELECT name FROM feature WHERE name= ? ");
		$check->execute([$newName]);
		$result = $check->fetch();
		if($result != []) return false;
		
		$check = $pdo->prepare("UPDATE feature SET name = ?
    								WHERE id = ?; ");
		$check->execute([$newName, $id]);
		
		return true;
	}
	
	//Auto_feature
	function addFeature($carId, $featureId)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("INSERT INTO auto_feature
    							(auto_id, feature_id) VALUES (?,?) ");
		$stmt->execute([$carId, $featureId]);
	}

	function getFeatureIDs($carId) // Will return an array of the feature id's in the car
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT feature_id FROM auto_feature WHERE auto_id = ?");
		$stmt->execute([$carId]);
		$featureIDs = $stmt->fetchAll(PDO::FETCH_COLUMN);
		
		return $featureIDs;
	}
	
	function getFeatureNames($featureIDs)
	{
		if ($featureIDs == []) return 'No Features';
		
		global $pdo;
		
		// https://stackoverflow.com/questions/14767530/php-using-pdo-with-in-clause-array
		$in  = str_repeat('?,', count($featureIDs) - 1) . '?'; // Create plaholder for each id on $features array ?,?,?,?
		
		$stmt = $pdo->prepare("SELECT name FROM feature WHERE id IN (" . $in . ")");
		$stmt->execute($featureIDs);
		$featureNames = $stmt->fetchAll(PDO::FETCH_COLUMN);
		
		return implode(", ",$featureNames);
	}
	
	function getAllFeatures() // Will return an array of the feature id's in the car
	{
		global $pdo;
		
		$stmt = $pdo->prepare("SELECT * FROM feature");
		$stmt->execute();
		$features = $stmt->fetchAll();
		
		return $features;
	}
	// DELETING
	function deleteCar($id)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("DELETE FROM auto_feature WHERE auto_id=?");
		$stmt->execute([$id]);
		
		$stmt = $pdo->prepare("DELETE FROM auto WHERE id=?");
		$stmt->execute([$id]);
		
		$stmt = $pdo->prepare("ALTER TABLE auto AUTO_INCREMENT = 1;");
		$stmt->execute([]);

	}
	function deleteMan($id)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("DELETE FROM manufacturer WHERE id=?");
		$stmt->execute([$id]);
		
		$stmt = $pdo->prepare("ALTER TABLE manufacturer AUTO_INCREMENT = 1;");
		$stmt->execute([]);
	}
	function deleteFeature($id)
	{
		global $pdo;
		
		$stmt = $pdo->prepare("DELETE FROM feature WHERE id=?");
		$stmt->execute([$id]);
		
		$stmt = $pdo->prepare("ALTER TABLE feature AUTO_INCREMENT = 1;");
		$stmt->execute([]);
	}
	
?>

