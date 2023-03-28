<?php
require_once("include/dbController.php");
$db_handle = new DBController();
$selectedValue = $_POST['selectedValue'];

// Query your database to fetch the values for the second select field
// You'll need to replace these placeholders with your actual database connection and query code

$stmt = $db_handle->runQuery("SELECT `id`,`p_name` FROM `product` WHERE category_id = '$selectedValue'");


// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($stmt);
