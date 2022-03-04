<?php
// EXAMPLES

// FIRST INSERT THE DB.PHP IN YOUR FILE:
require_once "DB.php";

// ---- INSERT
// Jobs
$table = "jobs";
$columns = "job";
$values = ["Front-End Developer"];
$DB->insert($table, $columns, $values);

// Levels
$table = "levels";
$columns = "level,factor";
$values = ["Junior", 0.45];
$DB->insert($table, $columns, $values);

// Competences
$table = "competences";
$columns = "competence,height,job_id";
$values = ["Python", 15, 2];

// ---- UPDATE
// Jobs
$table = "jobs";
// Update a new name for the job
$columns = "job = ?";
$where = "id = ?";
$data = ["Back End Developer", 2];
$DB->update($table, $columns, $where, $data);

// Levels
$table = "levels";
$columns = "level = ?, factor = ?";
$where = "id = ?";
$data = ["Senior", 0.70, 3];
$DB->update($table, $columns, $where, $data);

// Competences
$table = "competences";
$columns = "competence = ?";
$where = "id = ?";
// One value for each ? above
$data = ["HTML5", 1];
$DB->update($table, $columns, $where, $data);

// ---- DELETE
// Jobs
$table = "jobs";
$where = "id = ?";
$id = 1;
$DB->delete($table, $where, $id);

// Levels
$table = "levels";
$where = "id = ?";
$id = 1;
$DB->delete($table, $where, $id);

// Competences
$table = "competences";
$where = "id = ?";
$id = 1;
$DB->delete($table, $where, $id);

// ---- SELECT
// Jobs
$table = "jobs";
$columns = "job";
$where = "id = ?";
$data = [2];
$result = $DB->find($table, $columns, $where, $data);
echo "<pre>";
var_dump($result);

// Levels
$table = "levels";
$columns = "level,factor";
$where = "id = ?";
$data = [3];
$result = $DB->find($table, $columns, $where, $data);
var_dump($result);

// Competences
$table = "competences";
$columns = "competence,height,job_id";
$where = "id = ?";
$data = [3];
$result = $DB->find($table, $columns, $where, $data);
var_dump($result);

// ---- SELECT ALL
// Jobs
$table = "jobs";
$result = $DB->findAll($table);
var_dump($result);

// Levels
$table = "levels";
$result = $DB->findAll($table);
var_dump($result);

// Competences
$table = "competences";
$result = $DB->findAll($table);
var_dump($result);
