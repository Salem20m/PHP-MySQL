<?php
// INSERT
// unnamed placeholders  
$stmt = $pdo->prepare("INSERT INTO country (name, abbreviation) values (?, ?)");  
// named placeholders  
$stmt = $pdo->prepare("INSERT INTO country (name, abbreviation) value (:name, :abbreviation)");  

// UPDATE
$stmt = $db->prepare("UPDATE country SET name = ? WHERE abbreviation = ?");  
$stmt->execute([$name, $abbreviation]);  
$affected_rows = $stmt->rowCount();  

// DELETE
$stmt = $pdo->prepare("DELETE FROM client WHERE id = ?");  
$stmt->execute([$id]);  
$deleted = $stmt->rowCount();  
