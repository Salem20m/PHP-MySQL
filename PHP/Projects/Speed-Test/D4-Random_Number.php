<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Random Number</title>
</head>
<body>
	<form action="D4-Random_Number.php" method="GET">
		<input type="number" name="min" id="" placeholder="min">
		<input type="number" name="max" id="" placeholder="max">
		<button type="submit">Send</button>
	</form>
	
	<?php
		if(isset($_GET['min']) && isset($_GET['max'])) {
			$min = $_GET['min'];
			$max = $_GET['max'];
			
			echo "<br/>Random number between {$min} & {$max}: " . rand($min, $max);
		}
	
	?>
</body>
</html>