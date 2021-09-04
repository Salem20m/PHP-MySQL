<?php
// Null Coalese Operator
$email = $_POST['email'] ?? 'default value';  

// Scalar Types
function sum($x, $y) : float  
{  
    return $x + $y + 1.5;  
}  

// Spaceship Operator
var_dump(2 <=> 3); // return  -1  
var_dump(2 <=> 2); // return  0  
var_dump(2 <=> 1); // return  1  