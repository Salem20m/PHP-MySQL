<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Integers</title>
</head>
<body>
	<?php
		
		/*
			+= , -= , *= , /= , works
			$var++ , $var--   , works
		 */

		
		$var1 = 3;
		$var2 = 4;
		$var3 = -5;
		
		echo abs($var3) . "<br/>";
		echo pow(2,3) . "<br/>"; // This is 2^3
		echo sqrt(100) . "<br/>";
		echo "Modulo: " . fmod(20,7) . "<br/>"; // %
		echo "rand(): " . rand() . "<br/>"; // random
		echo "rand(min,max): " . rand(1,10) . "<br/><br/>"; // random between 1 and 10
		
		$var4 = 3.14;
		echo $var4 . "<br/>";
		echo "Round: " . round($var4) . "<br/>";
		echo "ceil: " . ceil($var4) . "<br/>";
		echo "floor: " . floor($var4) . "<br/><br/>";
		
		echo "Is $var4 a float? " . is_float($var4) . "<br/>";
		echo "Is $var4 an integer? " . is_int($var4) . "<br/>";
		echo "Is $var4 a number? " . is_numeric($var4) . "<br/>";
		
		
	?>
	
	<!--<form action="4-numbers.php" method="get">-->
	<!--	<input type="text" name="input" id="">-->
	<!--	<button type="submit">Send</button>-->
	<!--</form>-->
	
	<?php
		//$input = $_GET['input'];
		//echo $input;
	?>
</body>
</html>