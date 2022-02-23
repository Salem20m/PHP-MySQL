<?php

require_once "media/lib/DB.php";

$id = 1;
$applicants = $DB->getApplicant($id);

echo "<pre>";
print_r($applicants);

echo $applicants[0]['competences_levels'][0]['competence'];
