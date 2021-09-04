<?php

// Extension
function is_image($path)  
{  
	$image = getimagesize($path);  
	$image_type = $image[2]; 
   
	if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))  
	{  
    	return true;  
	}  

    return false;  
}  

// Size
if ($_FILES["fileToUpload"]["size"] > 1024*1024*2) { // 2MB  
    echo "Sorry, your file is too large.";  
}  

// Dimension
list($width, $height) = getimagesize('path_to_image');  