<?php

$finfo = finfo_open(FILEINFO_MIME_TYPE);   
$mtype = finfo_file( $finfo, $filename );      
finfo_close($finfo);