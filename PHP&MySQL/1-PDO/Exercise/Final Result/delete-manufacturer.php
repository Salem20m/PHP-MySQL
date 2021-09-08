<?php
require_once("connectDB.php");
// 1.
$id = $_GET['id'];
// 2.
$stmt = $pdo->prepare ("DELETE FROM manufacturer WHERE  id = ?"); 
$stmt->execute([$id]);

// 3.
header("Location: index.php?page=list-manufacturer");
?>