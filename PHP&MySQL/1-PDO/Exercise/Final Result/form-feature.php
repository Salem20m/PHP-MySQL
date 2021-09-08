<?php
  
    $data = $_POST;    
    $nameButton = "Register";

    // Insert a new feature
    if(isset($data['name']) && empty($data['id'])) {        
        $stmt = $pdo->prepare("INSERT INTO feature(name) VALUES (:name)");
        $name = $data['name'];
        $stmt->execute(["name" => $name]);
    }

    // Fill the name of selected feature
    
    $id = $_GET['id'] ?? null;
    if(isset($id)) {          
      // Select the name of feature using the $id
      $name = getFeatureName($id);      
      $nameButton = "Edit";      
    }
    
    // UPDATE the name of the feature    
    if(isset($data['id'])) {

      $name = $data['name'];
      $id = $data['id'];

      $stmt = $pdo->prepare("UPDATE feature SET name = ? WHERE id = ?");
      $stmt->execute([$name, $id]);     

      header("Location: index.php?page=list-feature");
    }
?>
<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" placeholder="Enter the name" name="name" type="text" value="<?= $name ?? ""; ?>" required>
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                </div>                                        
                                <button type="submit" class="btn btn-primary pull-right"><?= $nameButton ?></button>                                        
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