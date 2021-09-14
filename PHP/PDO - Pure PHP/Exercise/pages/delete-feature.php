<?php
	
	if ($_POST) {
		$id = $_POST['id'];
		
		try {
			deleteFeature($id);
			header("Location: index.php?page=list-features");
		} catch (PDOException $exception) {
			if($exception->getCode() == 23000) {
				echo "You can't delete a feature that is being used in a car :)";
			}
		}
	}
?>