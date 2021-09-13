<?php
	
	if ($_POST) {
		$id = $_POST['id'];
		deleteFeature($id);
	}
	
	header("Location: index.php?page=list-features");
?>