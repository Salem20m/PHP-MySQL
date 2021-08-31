<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Text Converter</title>
</head>
<body>
	
	<form action="D1-Text_Converter.php" method="GET">
		<input type="text" name="input" id="">
		<button type="submit">Send</button>
	</form>
	
	<?php
		$input = $_GET['input'];
		
		
		$output = "";
		for($i = 0; $i<strlen($input); $i++) {
			if($i%2 == 0)
				$c = strtoupper($input[$i]);
			else
				$c = strtolower($input[$i]);
			
			$output .= $c;
		}
		echo $output;
		
	?>
	
</body>
</html>