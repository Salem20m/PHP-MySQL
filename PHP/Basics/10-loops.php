<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Loops</title>
</head>
<body>
	<?php // Loops
		$i = 1;
		// WHILE LOOP
		while($i<10) {
			echo $i . " ";
			$i++;
		}
		echo "<br/>";
		
		// FOR LOOP
		for($i = 1; $i<20; $i+=2) {
			echo $i . " ";
		}
		echo "<br/>";
	?>
	
	<?php // FOREACH LOOP
		$arr = ["a","b","c","d","e","f"];
		
		foreach($arr as $element) { //
			echo strtoupper($element) . " ";
		}
		echo "<br/><br/>";
		
		// ForEach For Asscociative arrays
		$person = array(
				"first_name" => "Kevin",
				"last_name"  => "Skoglund",
				"address"    => "123 Main Street",
				"city"       => "Beverly Hills",
				"state"      => "CA",
				"zip_code"   => "90210"
		);
		
		foreach($person as $attribute => $data) {
			$attr_nice = ucwords(str_replace("_", " ", $attribute));
			echo "{$attr_nice}: {$data}<br />";
		}
		
	//	continue/break:
	//		- if you have a nested loop and you are in the inner loop
	//		  you can continue/break out of the outer loop
	//        u can use: continue(2) , break(2)
	
	?>
	
</body>
</html>
