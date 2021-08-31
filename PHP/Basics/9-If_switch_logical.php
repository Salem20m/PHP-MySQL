<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>if, switch, logical operators</title>
</head>
<body>
	
	<?php
		$a = 4;
		$b = 2;
		
		if ($a > $b) {
			echo "$a is larger than $b";
		} elseif ($b > $a) {
			echo "$b is larger than $a";
		} else {
			echo "$a & $b are equal";
		}
		
	?>
	
		<br/>
	
	<?php // Only Welcome new users!!
		$new_user = true;
		
		if ($new_user) {
			echo "<h1>Welcome</h1>";
		}
	?>
	
	
	<?php // Logical Operators
		
		if ($a == $b) {
			echo "<h1>Welcome</h1>";
		}
		
		if ($a != $b) {
			echo "<h1>Welcome</h1>";
		}
		
		if ($a != $b && $a < $b) {
			echo "<h1>Welcome</h1>";
		}
		
	?>
	
	<?php // Switch
		$year = 2020;
		
		switch ($year) {
			case 2020: echo "Pandemic";
				break;
			case 2021: echo "Pandemic * 2";
				break;
			case 2022: echo "Pandemic * 3";
				break;
		}
	?>
	
	<?php // Spaceship operator.
		$year = 9;
		
		switch ($year <=> 0) {
			case 1: echo "Positive";
				break;
			case 0: echo "Equal to 0";
				break;
			case -1: echo "Negative";
				break;
		}
	?>
	
</body>
</html>
