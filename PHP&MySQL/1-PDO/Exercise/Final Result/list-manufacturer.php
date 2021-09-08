<?php
$manufacturers = $pdo->query('SELECT * FROM manufacturer')->fetchAll(); 
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="page-header">List of Manufacturer
                        <a href="index.php?page=create-manufacturer" class="btn btn-primary pull-right">Add Manufacturer</a>
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

                                    <?php if (empty($manufacturers)) : ?>
                                            <tr>
                                                <td colspan="3">No manufacturers added.</td>
                                            </tr>
                                        <?php endif; ?>                                    

                                        <?php foreach($manufacturers as $m):?>
                                        <tr>
                                            <td><?= str_pad($m['id' ], 4, "0", STR_PAD_LEFT);?></td>
                                            <td><?= $m['name']?></td>
                                            <td><a href="index.php?page=edit-manufacturer&id=<?= $m['id' ]?>">Edit</a> | <a href="delete-manufacturer.php?id=<?= $m['id' ]?>">Delete</a></td>
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
        </div>
        <!-- /#page-wrapper -->

        
