<?php
require_once("connectDB.php");
// 1.
$id = $_GET['id'];
// 2.
$stmt = $pdo->prepare ("DELETE FROM auto_feature WHERE  feature_id = ?"); 
$stmt->execute([$id]);
// 2.1 
$stmt = $pdo->prepare ("DELETE FROM feature WHERE  id = ?"); 
$stmt->execute([$id]);
// 3.
header("Location: index.php?page=list-feature");
?>