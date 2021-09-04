<?php

  // Basic Types Variables
  $variable = "String";
  $integer = 1;
  $boolean = true || false;
  $float = 1.10;
  const FIRST_CONSTANT = 0;

  // Arrays
  $old_array = array(0,1,3);
  $new_array = [0,1,3];
  $matrix = [
    [1,3,5],
    [0,2,4]
  ];
  
  $otherArray = [
    "name" => "Bruno",
    "age" => 28,
    "nationality" => "Brazil",
    "live_in" => "Abu Dhabi"
  ];

  $cars = [
    "Patrol",
    "Maxima",
    "Altima",
    "Sunny"
  ];


  // Print
  // echo is print
  echo $old_array[0]; // 0

  print_r($new_array); // Show only the index and values
  var_dump($matrix); // Show the type of data

  // Loops
  $size = count($new_array); // 3
  for ($i = 0; $i < 10; $i++) { 
    # code...
  }

  foreach ($otherArray as $key => $value) {
    echo $key . ": " . $value; // name: Bruno
  }

  foreach($cars as $car) {
    echo $car; // PatrolMaximaAltimaSunny
  }

  $a = 1;

  while ($a <= 10) {
    # code...
  }

  do {
    # code...
  } while ($a <= 10);

  // If statement
  if ($a > 1) {
    # code...
  } elseif ($a > 1) {
    # code...
  } else {
    # code...
  }

  // If ternary
  $retVal = ($a > 0) ? "Hi" : "Bye";
  echo $retVal; // Hi

  if($a > 0) {
    $retVal = "Hi";
  } else {
    $retVal = "Bye";
  }

  // Switch
  $variable = 7;
  switch ($variable) {
    case 10:
      echo "Is 10.";
      break;

    case 11:
      echo "Is 11.";
      break;

    case 9:
      echo "Is 9.";
      break;
    
    default:
      echo "Is none of the options";
      break;
  }

  // Functions
  function firstFunction() {
    echo "First PHP Class";
  }

  firstFunction(); // First PHP Class

  function withParameters($a, $b) {
    return $a + $b;
  }

  $sum = withParameters(10,20);
  echo $sum; // 30;

  // Defautl values on parameters
  function defaultValues($a, $b = 10) {
    
    $subs = $a - $b;

    return $subs;
  }

  $result = defaultValues(10); // a = 10, b = 10;
  echo $result; // 0;

  // https://www.php.net/manual/en/ 
  // Laravel
?>