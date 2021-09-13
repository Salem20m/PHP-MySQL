<?php
	
	if ($_POST) {
		$model = $_POST['model'];
		$man = $_POST['manufacturer'];
		$year = $_POST['year'];
		$featuresArray = $_POST['feature'] ?? [];
		
		$lastInsertedId = createCar($model, $year, $man, $featuresArray);
		
	}
	
	$cars = selectAllCars();
	
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header">
            List of Autos
            <a href="index.php?page=create-auto" class="btn btn-primary pull-right">Add Auto</a>
        </h1>
        
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Manufacturer</th>
                                <th class="text-center">Features</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach($cars as $c): ?>
	                            
	                            <tr>
		                            <td><?= str_pad($c['id'], 3, "0", STR_PAD_LEFT) ?></td>
		                            <td><?= $c['model'] ?></td>
		                            <td><?= $c['year'] ?></td>
		                            <td><?= getManName($c['manufacturer_id']); ?></td>
		                            <td><?= getFeatureNames(getFeatureIDs($c['id'])) ?></td>
		                            <td><a href="index.php?page=edit-auto&id=<?=$c['id']?>">Edit</a> |
			                            <a href="#" class="delete-btn" data-toggle="modal" data-target="#myModal"
			                               data-id="<?=$c['id']?>" data-name="<?=$c['model']?>"
		                                   data-year="<?=$c['year']?>">Delete</a></td>
	                            </tr>
							<?php endforeach; ?>
                        
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
<!-- /.row -->

<!-- Modal -->
<div class="modal car" id="myModal" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<p>Are you Sure you want to delete?</p>
			</div>
			<div class="modal-footer">
				<form action="index.php?page=delete-auto" method="post">
					<input type="hidden" name="id" value="0">
					
					<button type="submit" class="btn btn-primary">Yeah</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				</form>
			</div>
		</div>
	
	</div>
</div>


