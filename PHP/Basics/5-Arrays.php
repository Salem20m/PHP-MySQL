<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Arrays</title>
</head>
<body>
	<?php
		$numbers = [4,3,22,54,1];
		echo $numbers[2] . "<br/>";
		
		$mixed = [0, 5, "Salem", ["x","y","z"]];
		echo $mixed[2] . "<br/>";
		echo $mixed[3][0] . "<br/>";
		
	//	print readable
		echo print_r($mixed) . "<br/>";
	?>
	<!--If we wrap it with <pre> it will be printed with nice spacing-->
	<pre>
		<?php echo print_r($mixed) . "<br/>"; ?>
	</pre>
	
	<?php
		$mixed[2] = "Saloom"; // changing index 2
		$mixed[] = "Hello"; // Will append "Hello to the end of the array
	?>
	
	<pre>
		<?php echo print_r($mixed) . "<br/>"; ?>
	</pre>
	
	<?php
		// ASSOCIATIVE ARRAYS
		// [key => value, key => value,...]
		$asso = ["firstName" => "Salem", "lastName" => "Ebrahim"];
		
		echo $asso["firstName"] . " " . $asso["lastName"];
	?>
</body>
</html>