<?php
require_once("connectDB.php");

// 1. Get the id from $_GET
$id = $_GET['id'];
$filename = getManufacturerImageName($id);

// 2. Delete row in DB
$stmt = $pdo->prepare ("DELETE FROM manufacturer WHERE  id = ?"); 
$stmt->execute([$id]);

// 3. Delete Image
unlink("uploads/".$filename);

// 4.
header("Location: index.php?page=list-manufacturer");
?>