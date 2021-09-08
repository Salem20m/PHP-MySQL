<?php
    $features = $pdo->query('SELECT * FROM feature')->fetchAll(); // Get all the features inside table feature 
?>
        <div id="page-wrapper">
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

                                        <?php if (empty($features)) : ?>
                                            <tr>
                                                <td colspan="3">No features added.</td>
                                            </tr>
                                        <?php endif; ?>                 

                                        <?php foreach($features as $f): ?>
                                        <tr>
                                            <td><?= str_pad($f['id' ], 4, "0", STR_PAD_LEFT); ?></td>
                                            <td><?= $f['name']?></td>
                                            <td><a href="index.php?page=edit-feature&id=<?= $f['id'] ?>"> Edit</a> | <a href="delete-feature.php?id=<?= $f['id'] ?>">Delete</a></td>
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