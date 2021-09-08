<?php
  
  $data = $_POST;    
  $nameButton = "Register";
   
  // INSERT
  if(isset($data) && !empty($data) && empty($data['id'])) {
    $model = $data['model'];
    $year = $data["year"]; 
    $manufacturerID = $data["manufacturer"];
    
    $stmt = $pdo->prepare("INSERT INTO auto(model, year, manufacturer_id) VALUES (?, ?, ?)");        
    $stmt->execute([$model, $year, $manufacturerID]);
            
    $features = $data['features'] ?? null;

    if(isset($features)) {
      // Get the MAX valeu of the column id from table auto        
      $maxID = $pdo->query("SELECT MAX(id) AS max_id FROM auto")->fetch(); // Return an Array
      $autoID = $maxID['max_id']; // Get the number inside the Array
      
      foreach($features as $feature) {            
          $stmt= $pdo->prepare("INSERT auto_feature(auto_id, feature_id) VALUES (?,?)");
          $stmt->execute([$autoID, $feature]);
      }
    }
  }
     
  // SELECT THE DATA TO UPDATE
  $id = $_GET['id'] ?? null;
  if(isset($id)) {          
    
    $auto = getAuto($id);

    $model = $auto['model'];
    $year = $auto['year'];
    $manufacturerID = $auto['manufacturer_id'];
    $manufacturerName = getManufacturerName($manufacturerID);
    $selectedFeatures = getFeaturesName($id, false);
    $nameButton = "Edit";          
  }
          
  // UPDATE
  if(isset($data['id']) && !empty($data['id'])) {

    // 1. Select all the input values (id, model, year, manufacturer and features)
    $model = $data['model'];
    $year = $data['year'];
    $manufacturerID =  $data['manufacturer'];  
    $autoID = $data['id'];

    // 2. Delete all relation between auto and feature on table auto_feature
    $stmt = $pdo->prepare('DELETE FROM auto_feature WHERE auto_id = ?');
    $stmt->execute([$autoID]);

    // 3. update model, year and manufacturer_id from table auto    
    $stmt = $pdo->prepare("UPDATE auto SET model = ?, year = ?, manufacturer_id = ? WHERE id = ?");
    $stmt->execute([$model, $year, $manufacturerID, $autoID]);     

    // 4. update relation between auto and feature
    $features = $data['features'];
    
    foreach($features as $feature) {            
      $stmt= $pdo->prepare("INSERT auto_feature(auto_id, feature_id) VALUES (?,?)");
      $stmt->execute([$autoID, $feature]);
    }

    // 5. redirect page
    header("Location: index.php?page=list-auto");
  }

  // ALL MANUFACTURERS AND ALL FEATURES
  $manufacturers = $pdo->query('SELECT * FROM manufacturer')->fetchAll();      
  $features=$pdo->query('SELECT * FROM feature')->fetchAll();
 
?>
<div class="row">
      <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                          <form role="form" method="post">
                              <input type="hidden" name="id" value="<?= $id ?>">

                              <div class="form-group">
                                  <label>Model</label>
                                  <input class="form-control" placeholder="Enter the model" name="model" type="text" value="<?= $model ?? ""; ?>" required>                               
                              </div>

                              <div class="form-group">
                                  <label>Year</label>
                                  <input class="form-control" placeholder="Enter year" name="year" type="number" min="1970" max="2022" value="<?= $year ?? ""; ?>" required>
                              </div>           

                              <div class="form-group">
                                  <label>Manufacturer: </label>
                                  <select class="form-control" name="manufacturer" required>                                      
                                      <option value="">Select manufacturer</option>                                    
                                      <?php foreach($manufacturers as $m): ?>
                                          <?php if($m['id'] == $manufacturerID) : ?>
                                            <option value="<?= $m['id'] ?>" selected><?= $m['name'] ?></option>
                                          <?php else: ?>
                                            <option value="<?= $m['id'] ?>"><?= $m['name'] ?></option>
                                          <?php endif; ?>
                                      <?php endforeach; ?>
                                  </select>
                              </div>

                              <?php if(!empty($features)) : ?>
                              <div class="form-group">
                                  <label>Features</label>
                                  <?php foreach($features as $f): ?>
                                    <div class="checkbox">
                                        <label class="col-md-6">
                                        <!-- https://www.php.net/manual/en/function.in-array.php -->
                                          <?php if(isset($selectedFeatures) && $selectedFeatures !== "No features" && in_array($f['name'], $selectedFeatures)): ?>

                                              <input type="checkbox" name="features[]" value="<?= $f['id']; ?>" checked /> <?= $f['name'] ?>

                                            <?php else: ?>
                                              <input type="checkbox" name="features[]" value="<?= $f['id']; ?>" /> <?= $f['name'] ?>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                  <?php endforeach; ?>                                                                   
                              </div>   
                              <?php endif; ?>

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