<?php
	
	if ($_POST) {
		$id = $_POST['id'];
		deleteCar($id);
	}
	
	header("Location: index.php?page=list-auto");
?>