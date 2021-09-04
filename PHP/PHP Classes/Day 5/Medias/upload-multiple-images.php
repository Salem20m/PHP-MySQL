<?php
   if(isset($_FILES['fileUpload']))
   {       
      $name 	= $_FILES['fileUpload']['name']; 
      $tmp_name = $_FILES['fileUpload']['tmp_name'];
 
      $dir = 'uploads/';
 
      for($i = 0; $i < count($tmp_name); $i++) 
      {
         $check = is_image($tmp_name[$i]);

         if($check !== false) {
            if (move_uploaded_file($tmp_name[$i], basename($name))) {
               echo "The file ". basename($name). " has been uploaded.";
            } else {
               echo "Sorry, there was an error uploading your file.";
            }
         } else {
            echo "File is not an image.";
         }         
      }
   }

   function is_image($path)
   {
       $a = getimagesize($path);
       $image_type = $a[2];
        
       if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
       {
           return true;
       }
       return false;
   }   
?>