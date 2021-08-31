<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Integer Type</title>
</head>
<body>
	
	<form action="D2-Integer-Type.php" method="GET">
		<input type="number" name="input" id="">
		<button type="submit">Send</button>
	</form>
	
	<?php
		if(isset($_GET['input'])) {
			$input = $_GET['input'];
			
			switch ($input <=> 0) {
				case 0:
					echo "Equal";
					break;
				case 1:
					echo "Positive";
					break;
				case -1:
					echo "Negative";
					break;
			}
		}
		
	?>
	
</body>
</html>