<?php

$stmt = $pdo->prepare('SELECT * FROM country WHERE name = ? AND abbreviation = ?');  
$stmt->execute([$name, $abbreviation]);  
$user = $stmt->fetch();  
// or  
$stmt = $pdo->prepare('SELECT * FROM country WHERE name = :name AND abbreviation = :abbreviation');  
$stmt->execute([name => $name, 'abbreviation' => $abbreviation]);  
$user = $stmt->fetch();  

