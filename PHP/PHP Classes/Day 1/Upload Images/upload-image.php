<?php  
function uploadImage($file) {
  $target_dir = "uploads/";  
  $target_file = $target_dir . basename($file);
  $tmpName = $_FILES["upload-image"]["tmp_name"];

  $uploadOk = 1;

  $check = isImage($tmpName); // return: true
  
  if($check) {
    echo "File is an image - " . $target_file . ".";    
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  if (file_exists($target_file)){
    echo "Sorry, file already exists.";
    $uploadOk=0;
  }

  if ($_FILES["upload-image"]["size"] > 5000000){
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      return false;
  
      // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($tmpName, $target_file)) {
          echo "The file ". basename($file). " has been uploaded.";
          return true;
      } else {
          echo "Sorry, there was an error uploading your file.";
          return false;
      }
  }
}

function isImage($path) {
  $informations = getimagesize($path);  
  $imageType = $informations[2];

  $allowedExtensions = [
    IMAGETYPE_GIF, // 1
    IMAGETYPE_JPEG, // 2
    IMAGETYPE_PNG, // 3
    IMAGETYPE_BMP // 6
  ];

  if(in_array($imageType, $allowedExtensions)) {
    return true;
  }

  return false;
}