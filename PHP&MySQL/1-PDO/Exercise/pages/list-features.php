<?php
	// if we got a post to add a feature
	if($_POST){
		$name = $_POST['name'];
		createFeature($name);
	}
	
	$features = getAllFeatures();
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="page-header">List of Features
            <a href="index.php?page=create-feature" class="btn btn-primary pull-right">Add Feature</a>
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
                                <th class="text-center">Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach($features as $f):
	
	                            ?>
	                            <tr>
		                            <td> <?= str_pad($f['id'], 3, "0", STR_PAD_LEFT) ?> </td>
		                            <td><?=  $f['name'] ?> </td>
		                            <td><a href="index.php?page=edit-feature&id=<?=$f['id']?>">Edit</a> |
			                            <a href="#" class="delete-btn" data-toggle="modal" data-target="#myModal"
			                               data-id="<?=$f['id']?>" data-name="<?=$f['name']?>">Delete</a></td>
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
<div class="modal feature" id="myModal" role="dialog">
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
				<form action="index.php?page=delete-feature" method="post">
					<input type="hidden" name="id" value="0">
					
					<button type="submit" class="btn btn-primary">Yeah</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				</form>
			</div>
		</div>
	
	</div>
</div>
