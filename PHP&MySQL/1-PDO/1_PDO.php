<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PDO</title>
</head>
<body>
	<?php
		// CONNECTING
		$host = 'localhost';
		$db = 'test';
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
		
		
		$year = 1990;
		
		// Unnamed placeholder: ?
		$stmt = $pdo->prepare("SELECT * FROM test.movies_basic WHERE release_year > ? ");
		$stmt->execute([$year]); // we pass the array to replace the placeholder
		$user = $stmt->fetchAll(); // fetchAll returns all the rows
		//OR
		// Named placeholder: :name
		$stmt = $pdo->prepare("SELECT * FROM test.movies_basic WHERE release_year > :year ");
		$stmt->execute(['year' => $year]); // we pass the array to replace the placeholder
		$user = $stmt->fetch(); // fetch returns the first row found
		
		print_r($user);
		echo "<br/>";
		
		// INSERT
		$stmt = $pdo->prepare("INSERT INTO test.movies_basic
    							(title, genre, release_year, director, studio, rating) VALUES (?,?,?,?,?,?) ");
		$stmt->execute(['Salem In The House 2', 'Horror', 2022, 'Salem Alhadrami', 'Reem Studios', 9.3]);
		$affected_rows = $stmt->rowCount();
		
		// UPDATE
		$stmt = $pdo->prepare("UPDATE test.movies_basic SET title = ? WHERE title LIKE ? AND id > 100");
		$stmt->execute(['Salem in The House 2', '%Salem%']);
		$affected_rows = $stmt->rowCount();
		echo "Affected rows: " . $affected_rows . "<br/>";
		
		// query() , if we will not use any variables in the query
		$data = $pdo->query('SELECT title FROM test.movies_basic')->fetchAll();
	?>
</body>
</html>