<?php
	
	if ($_POST) {
		$id = $_POST['id'];
		deleteMan($id);
	}
	
	header("Location: index.php?page=list-manufacturer");
?>