<?php

    $data = $_POST;    

    if(isset($data) && !empty($data)) {
        $model = $data['model'];
        $year = $data["year"]; 
        $manufacturerID = $data["manufacturer"];
        
        $stmt = $pdo->prepare("INSERT INTO auto(model, year, manufacturer_id) VALUES (?, ?, ?)");        
        $stmt->execute([$model, $year, $manufacturerID]);
                
        $features = $data['features'];

        // Get the MAX valeu of the column id from table auto        
        $maxID = $pdo->query("SELECT MAX(id) AS max_id FROM auto")->fetch(); // Return an Array
        $autoID = $maxID['max_id']; // Get the number inside the Array
        
        foreach($features as $feature) {            
            $stmt= $pdo->prepare("INSERT auto_feature(auto_id, feature_id) VALUES (?,?)");
            $stmt->execute([$autoID, $feature]);
        }
    }

    // MANUFACTURERS
    $manufacturers = $pdo->query('SELECT * FROM manufacturer')->fetchAll();      
    $features=$pdo->query('SELECT * FROM feature')->fetchAll();
?>

<div id="page-wrapper">
  <div class="row">
      <div class="col-md-4 col-md-offset-4">
          <h1 class="page-header">Create Auto</h1>
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
                                  <label>Model</label>
                                  <input class="form-control" placeholder="Enter the model" name="model" type="text">
                                  
                              </div>

                              <div class="form-group">
                                  <label>Year</label>
                                  <input class="form-control" placeholder="Enter year" name="year" type="number" min="1970" max="2022">
                              </div>           

                              <div class="form-group">
                                  <label>Manufacturer: </label>
                                  <select class="form-control" name="manufacturer">                                      
                                      <option>Select manufacturer</option>
                                      
                                      <?php foreach($manufacturers as $m): ?>
                                          <option value="<?= $m['id'] ?>"><?= $m['name'] ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label>Features</label>
                                  <?php foreach($features as $f): ?>
                                    <div class="checkbox">
                                        <label class="col-md-6">
                                            <input type="checkbox" name="features[]" value="<?= $f['id']; ?>"/> <?= $f['name'] ?>
                                        </label>
                                    </div>
                                  <?php endforeach; ?>                                                                   
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