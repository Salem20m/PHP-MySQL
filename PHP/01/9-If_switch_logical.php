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
		
		
	?>
	
</body>
</html>
