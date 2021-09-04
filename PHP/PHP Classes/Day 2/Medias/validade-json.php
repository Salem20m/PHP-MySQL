<?php

$result = json_decode($json);  
if (json_last_error() === JSON_ERROR_NONE) {  
    // JSON is valid  
}  
// OR this is equivalent  
if (json_last_error() === 0) {  
    // JSON is valid  
} 