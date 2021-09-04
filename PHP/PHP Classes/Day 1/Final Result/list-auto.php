<?php
$auto = $pdo->query("SELECT * FROM auto")->fetchAll();
?>
<div id="page-wrapper">
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

                                        <?php if (empty($auto)) : ?>
                                            <tr>
                                                <td colspan="6">No auto added.</td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php foreach($auto as  $a): ?>
                                        <tr>
                                            <td><?= str_pad($a['id'], 4,"0",STR_PAD_LEFT); ?></td>
                                            <td><?= $a['model']; ?></td>
                                            <td><?= $a['year']; ?></td>
                                            <td><?= getManufacturerName($a['manufacturer_id']); ?></td>
                                            <td><?= getFeaturesName($a['id']); ?></td>
                                            <td><a href="index.php?page=edit-auto&id=<?= $a['id']; ?>">Edit</a> | <a href="delete-auto.php?id=<?= $a['id']; ?>">Delete</a></td>
                                        </tr>  
                                        <?php endforeach;?>                                      
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
