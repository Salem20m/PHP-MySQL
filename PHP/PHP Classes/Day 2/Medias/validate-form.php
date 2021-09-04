<?php
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["number"])) {  
    $numberErr = "Number is required";  
  } else {  
    $number = $_POST["number"];  
    // check if number is integer
    if (!filter_var($number, FILTER_VALIDATE_INT)) {  
      $numberErr  = "$number is not a integer number.";   
    }
  }

  if (empty($_POST["date"])) {  
    $dateErr = "Number is required";  
  } else {  
    $date = $_POST["date"];  
    // check if date is integer
    if (validateDate($date)) {  
      $dateErr  = "$date is an invalid date format.";   
    }
  }  

function validateDate($date)  
{  
    $d = DateTime::createFromFormat('Y-m-d', $date);  
    return $d && $d->format('Y-m-d') === $date;  
}  
