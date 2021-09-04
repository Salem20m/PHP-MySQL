<?php
$host='localhost';
$db = 'php_classes';
$user = 'root';
$pass='';
$charset='utf8';
$dsn="mysql:host=$host; user=$user;dbname=$db;charset=$charset";
$opt = [  
    PDO::ATTR_ERRMODE                     => PDO::ERRMODE_EXCEPTION,  // throw exceptions  
    PDO::ATTR_DEFAULT_FETCH_MODE          => PDO::FETCH_ASSOC,  
    // returns an array indexed by column name as returned in your result set  
];  
// PDO
$pdo =  new PDO($dsn, $user, $pass, $opt);

// MANUFACTURER
// Get manufacturer name using the manufacturer_id from each auto
function getManufacturerName($manufacturerID) {        
    // https://phppot.com/php/variable-scope-in-php/
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT name FROM manufacturer WHERE id = ?");    
    $stmt->execute([$manufacturerID]);
    $result = $stmt->fetch();    

    return $result['name'];
}

function getFeatureName($featureID) {            
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT name FROM feature WHERE id = ?");    
    $stmt->execute([$featureID]);
    $result = $stmt->fetch();    

    return $result['name'];
}

// Get all the features name using the auto ID
function getFeaturesName($autoID, $implode = true) {
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

    if($implode) {
        // https://www.php.net/manual/en/function.implode.php
        $featuresNames = implode(", ", $featuresNames);        
    }
    
    return $featuresNames;
}

function getAuto($autoID) {            
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM auto WHERE id = ?");    
    $stmt->execute([$autoID]);
    $result = $stmt->fetch();    

    return $result; // Array
}

function getManufacturerImageName($id) {
    global $pdo;

    $stmt=$pdo->prepare("SELECT image FROM manufacturer WHERE id=?");
    $stmt->execute([$id]);
    $result= $stmt->fetch();

    return $result['image'];

}