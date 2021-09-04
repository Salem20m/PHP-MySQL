<?php
// Getting the name based on id  
$stmt = $pdo->prepare("SELECT name FROM client WHERE id = ?");  
$stmt->execute([$id]);  
$name = $stmt->fetchColumn();  

// Using query method
$data = $pdo->query('SELECT name FROM client')->fetchAll();  

// LIKE CLAUSE
$search = "%ia%";  
$stmt = $pdo->prepare("SELECT * FROM country WHERE name LIKE ?");  
$stmt->execute([$search]);  
$data = $stmt->fetchAll();  
