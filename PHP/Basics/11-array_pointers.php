<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Array pointers</title>
</head>
<body>
	<?php
		// by default, the pointer is at the first item in the array
		
		$numbers = [0,1,2,"3",4,5,6];
		
		// current(arr): tells you where the ointer is at
		echo "1. current pointer: " . current($numbers) . "<br/>";
		
		// next(arr): moves the pointer forward to the next item
		next($numbers);
		echo "2. current pointer: " . current($numbers) . "<br/>";
		next($numbers);
		next($numbers);
		echo "3. current pointer: " . current($numbers) . "<br/>";
		
		// prev(arr): moves the pointer backwards to the previous item
		prev($numbers);
		echo "4. current pointer: " . current($numbers) . "<br/>";
		
		// reset(arr): moves the pointer back to the start
		reset($numbers);
		echo "5. current pointer: " . current($numbers) . "<br/>";
		
		// end(arr): moves the pointer back to the start
		end($numbers);
		echo "6. current pointer: " . current($numbers) . "<br/>";
		
		// if we use next(arr) when we are at the last element, it will return null
		next($numbers);
		echo "7. current pointer: " . current($numbers) . "<br/>";
		
		
	
	?>
	
	
</body>
</html>
