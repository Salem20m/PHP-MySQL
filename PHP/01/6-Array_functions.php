<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Array Functions</title>
</head>
<body>

	<pre>
		<?php
			$numbers = [4,3,22,54,1,69,420,36];
			echo print_r($numbers)
		?>
	</pre>
	
	<?php
		echo "Count: " . count($numbers) . "<br/>";
		echo "Max Value: " . max($numbers) . "<br/>";
		echo "Min Value: " . min($numbers) . "<br/>";
	?>
	
	dasd
	
	<pre>
		Sort: <?php sort($numbers); print_r($numbers); ?><br/>
		Reverse Sort: <?php rsort($numbers); print_r($numbers); ?><br/>
	</pre>
	<br/>
	
	<?php
		//	Implode converts the array into a string
		//	implode("seperateor" , array)
		$arrToString = implode(", ",$numbers);
		echo "Implode: " . $arrToString . "<br/>";
		
		//	Explode converts a String into an array
		//	explode("seperateor" , string)
		$strToArray = explode(", ",$arrToString);
		echo "Explode: ";
		print_r($strToArray);
		echo "<br/>";
	?>
	<br/>
	
	<?php
		echo "is 69 in the array? " . in_array(69, $numbers) . "<br/>";
		echo "is 15 in the array? " . in_array(15, $numbers) . "<br/>";
	
	?>
	
</body>
</html>
