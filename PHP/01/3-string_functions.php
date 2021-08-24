<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Variables</title>
	<style>
		* {
			line-height: 1.5rem;
		}
	</style>
</head>
<body>
	<?php
		$var1 = "Hello";
		$var2 = "World";
		$var3 = $var1 . " " . $var2;
		echo "$var3 <br/>";
		
		$first = "The quick brown fox";
		$second = " jumped over the lazy dog.";
		
		// Concatinating and Assigning at the same time
		$third  = $first;
		$third .= $second;  // This is like $third = $first . $second;
	?>
	<br/>
	String To Lower: <?php echo strtolower($third); ?> <br/>
	String To Upper: <?php echo strtoupper($third); ?> <br/>
	Uppercase First: <?php echo ucfirst($third); ?> <br/>
	Uppercase Words: <?php echo ucwords($third); ?> <br/>
	
	<br/>
	
	Length: <?php echo strlen($third);?> <br/>
	Trim: <?php echo "A" . trim(" B C D ") . "E"; ?> <br/> <!-- Eemoves spaces at the start and end -->
	Find: <?php echo strstr($third, "brown"); ?> <br/> <!-- strstr(haystack, needle)
																	it returns the string from the needle onward-->
	Replace: <?php
				echo str_replace("quick", "fast", $third);  // str_replace(search, replace, haystack)
			 ?> <br/>
	
	<br/>
	
	<?php
		// str_repeat(string, x times) , will repeat the string x times
		echo "Repeat: " . str_repeat($third, 2) . "<br/>";
		
		// substr(string, offset, length)
		echo "Make Substring: " . substr($third, 4, 11) . "<br/>";
		
		// strpos(string, needle) , will return the position of the needle
		echo "Find Position: " . strpos($third, "quick") . "<br/>";
		
		// strchr(string, needle) , will return the string from this character onward
		echo "Find Character: " . strchr($third, "q") . "<br/>";
		
	?>
	
</body>
</html>