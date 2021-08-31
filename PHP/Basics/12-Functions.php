<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Functions</title>
</head>
<body>
	<?php
		
		function sayHello() {
			echo "Hello World! <br/>";
		}
		sayHello();
		
		function sayAnything($phrase) {
			echo $phrase . "<br/>";
		}
		sayAnything("Hey hello hi oi ahlan aloha");
		
		function add($a=0, $b=1) { // default arguments are 0 and 1
			return $a + $b;
		}
		echo add(99,2) . "<br/>";
		
		
		//Returning more than one value
		function add_sub($a, $b) {
			$add = $a + $b;
			$sub = $a - $b;
			
			return [$add, $sub];
		}
		list($addResult, $subResult) = add_sub(5,4);
		echo $addResult . "<br/>"; // 9
		echo $subResult . "<br/>"; // 1
		
		
	?>
</body>
</html>