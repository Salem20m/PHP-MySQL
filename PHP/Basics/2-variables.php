<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Variables</title>
</head>
<body>
	<?php
		/*
		 * VARIABLES
		 * - They have to start with $
		 * - Followed by letter or underscore
		 * - Can contain: letters, numbers, underscores, dashes
		 * - Case-sensitive
		 */
		
		$var1 = 10;
		$myVariable = 5;
		$var2 = "Hello Bro";
		$var3 = true;
		
		echo ($var1 + $myVariable); // 5 + 10
		
		echo "<br/>";
		
		echo "$var2 <br/>";
		
		echo ($var3 ? "T <br/>" : "F");
		
		
	?>
	
	<pre>
		<?php
			var_dump($var2);
			
			print_r(get_defined_vars());
			
			debug_backtrace(); // prints all the calls that have been done until this point
		?>
	</pre>
</body>
</html>