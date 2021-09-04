<?php
  
    $data = $_POST;    
    $nameButton = "Register";

    require_once('upload-image.php');

    // Insert a new manufacturer
    if(isset($data['name']) && empty($data['id'])) {        
        $file = $_FILES["upload-image"]["name"];
        $canInsert = uploadImage($file);

        if($canInsert) {
            $stmt = $pdo->prepare("INSERT INTO manufacturer(name, image) VALUES (:name, :image)");
            $name = $data['name'];
            $stmt->execute(["name" => $name, "image" => $file]);
        }
    }
    
    // Fill the name of selected manufacturer
    $id = $_GET['id'] ?? null;
    if(isset($id)) {          
      // Select the name of manufacturer using the $id
      $name = getManufacturerName($id);      
      $nameButton = "Edit";      
    }
    
    // UPDATE the name of the manufacturer    
    if(isset($data['id']) && !empty($data['id'])) {

      $name = $data['name'];
      $id = $data['id'];
      $filename = getManufacturerImageName($id);

      // Delete new old image using unlink
      unlink("uploads/".$filename);

      // Inser the new one, using function uploadImage
      $file = $_FILES["upload-image"]["name"];
      $canUpdate = uploadImage($file);      

      if($canUpdate) {          
          $stmt = $pdo->prepare("UPDATE manufacturer SET name = ?, image = ? WHERE id = ?");
          $stmt->execute([$name, $file, $id]);     
    
          header("Location: index.php?page=list-manufacturer");
      }
    }
?>

<!-- /.row -->
<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" placeholder="Enter the name" name="name" type="text" value="<?= $name ?? ""; ?>" required>
                                    <input type="hidden" name="id" value="<?= $id ?>">                                    
                                </div>                                        

                                <div class="form-group">
                                    <label for="upload-image">Image</label>
                                    <input type="file" name="upload-image" id="upload-image"/>
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