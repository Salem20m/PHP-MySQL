<?php
$auto = $pdo->query("SELECT * FROM auto")->fetchAll();

// Get manufacturer name using the manufacturer_id from each auto
function getManufacturerName($manufacturerID) {        
    // https://phppot.com/php/variable-scope-in-php/
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT name FROM manufacturer WHERE id = ?");    
    $stmt->execute([$manufacturerID]);
    $result = $stmt->fetch();    

    return $result['name'];
}

// Get all the features name using the auto ID
function getFeaturesName($autoID) {
    global $pdo;

    // 1. Get all the feature_id from the auto_id
    $stmt = $pdo->prepare("SELECT feature_id FROM auto_feature WHERE auto_id = ?");
    $stmt->execute([$autoID]);
    $result = $stmt ->fetchAll();
    
    if(empty($result)) {
        return "No features";
    }
        
    $features = [];
    foreach($result as $feature) {
        // https://www.php.net/manual/en/function.array-push.php
        array_push($features, $feature['feature_id']);
    }   

    // 2. Get all the features name using the feature_id previous selected    
    // https://stackoverflow.com/questions/14767530/php-using-pdo-with-in-clause-array
    $in  = str_repeat('?,', count($features) - 1) . '?'; // Create plaholder for each id on $features array ?,?,?,?
    // https://www.w3schools.com/sql/sql_in.asp
    $stmt= $pdo->prepare("SELECT name FROM feature WHERE id IN (" . $in . ")");
    $stmt->execute($features);
    $result = $stmt ->fetchAll();

    $featuresNames = [];
    foreach($result as $name) {
        array_push($featuresNames, $name["name"]);        
    }     

    // https://www.php.net/manual/en/function.implode.php
    $featuresNames = implode(", ", $featuresNames);
    
    return $featuresNames;
}
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
                                            <td><a href="edit-auto.php?id=<?= $a['id']; ?>">Edit</a> | <a href="delete-auto.php?id=<?= $a['id']; ?>">Delete</a></td>
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
