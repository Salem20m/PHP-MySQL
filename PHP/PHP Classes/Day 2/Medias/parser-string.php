<?php

// PARSE_STR
parse_str("name=Igor&age=24");  
echo $name."<br>";  
echo $age;  

// EXPLODE
$explode = "Privet mir. Eto prekrasnyy den'.";  
print_r (explode(" ",$explode));  
// Result: Array ( [0] => Privet [1] => mir. [2] => Eto  [3] => prekrasnyy [4] => den'. )

// IMPLODE
$implode = array('Hello','World!','Beautiful','Day!');  
echo implode(" ",$implode);  
// Result: Hello World! Beautiful Day! 

// STR_REPLACE
echo str_replace("world","Igor","Hello world!");  
// Result: Hello Igor!  

// STRLEN
$strlen = 'abcdef';  
echo strlen($strlen); // 6  
  
$strlen = ' ab cd ';  
echo strlen($strlen); // 7  

//TRIM
$trim = "Hello World!";  
echo $trim . "<br>"; //Hello World!  
echo trim($trim,"Hed!"); //llo Worl  

$trim = " Hello World! ";  
echo "Without trim: " . $trim;  
echo "<br>";  
echo "With trim: " . trim($trim);  
// Result  
// Without trim: Hello World!  
// With trim: Hello World!  
