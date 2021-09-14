<?php
	if (isset( $_GET['id'])) {
		$id = $_GET['id'];
		$name = getFeatureName($id);
	}
	
	if($_POST) {
		$newName = $_POST['name'];
		updateFeature($id, $newName);
		
		header("Location: index.php?page=list-features");
	}
	//
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="page-header">Edit Feature: <?=$name?></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form action="index.php?page=edit-feature&id=<?= $id ?>" role="form" method="post">
							<div class="form-group">
								<label>Name</label>
								<input class="form-control" placeholder="<?=$name?>"
								       value="<?=$name?>" name="name" type="text">
							</div>
							<button type="submit" class="btn btn-primary pull-right">Edit</button>
						</form>
					</div>
					<!-- /.col-lg-12 (nested) -->
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

