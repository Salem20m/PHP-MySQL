<?php
	$manufacturers = selectAllMans();
	$features = selectAllFeatures();
	
	if (isset( $_GET['id'])) {
		$id = $_GET['id'];
		$car = selectCar($id);
		$model = $car['model'];
		$year = $car['year'];
		$man_id = $car['manufacturer_id'];
		$featureIDs = getFeatureIDs($id);
	}
	
	if($_POST) {
		$newModel = $_POST['model'];
		echo $newModel;
		$newYear = $_POST['year'];
		echo $newYear;
		$newMan = $_POST['manufacturer'];
		echo $newMan;
		$newFeatureArray = $_POST['feature'] ?? [];
		print_r($newFeatureArray);
		updateCar($id, $newModel, $newYear, $newMan, $newFeatureArray);
		//createCar($newModel, $newYear, $newMan, $newFeatureArray);
		
		header("Location: index.php?page=list-auto");
	}
	//
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="page-header">Edit Auto: <?= $model ?> </h1>
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
						<form role="form" method="post" action="index.php?page=edit-auto&id=<?= $id ?>">
							<div class="form-group">
								<label>Model</label>
								<input class="form-control" value="<?= $model ?>"
								       placeholder="<?= $model ?>" name="model" type="text">
							</div>
							<div class="form-group">
								<label>Year</label>
								<input class="form-control" value="<?= $year ?>"
								       placeholder="<?= $year ?>" name="year" type="number" min="1970" max="2022">
							</div>
							<div class="form-group">
								<label>Manufacturer: </label>
								<select name="manufacturer" class="form-control">
									<option>Select manufacturer</option>
									
									<?php foreach($manufacturers as $m): ?>
											<option value="<?=$m['id']?>"
												<?php if($m['id'] == $man_id) echo "selected ";?> >
												<?=$m['name'];?>
											</option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<label>Features</label>
								
								<?php foreach($features as $f): ?>
									
									<div class="checkbox">
										<!--feature[] to post it as an array     !  -->
										<label class="col-md-6">
											<input type="checkbox" name="feature[]"
											       value="<?= $f['id'] ?>"
											       <?php if(in_array($f['id'], $featureIDs)) echo "checked" ;?>
											> <?= $f['name'] ?>
										</label>
									</div>
								<?php endforeach; ?>
							
							</div>
							<button
								type="submit" class="btn btn-primary pull-right">Edit
							</button>
						
						
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