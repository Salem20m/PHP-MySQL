<?php

    require_once("connectDB.php");

    $data = $_POST;    

    if(isset($data['name'])) {        
        $stmt = $pdo->prepare("INSERT INTO manufacturer(name) VALUES (:name)");
        $name = $data['name'];
        $stmt->execute(["name" => $name]);
    }
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header">Create Manufacturer</h1>
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

                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" placeholder="Enter the name" name="name" type="text">
                                </div>                                        
                                <button type="submit" class="btn btn-primary pull-right">Register</button>                                        
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
</div>
<!-- /#page-wrapper -->