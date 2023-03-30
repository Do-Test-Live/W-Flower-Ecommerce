<?php
// Establish a connection to the database
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();

// Get the selected value from the first select field
$selectedValue = $_GET['selectedValue'];

// Query the database based on the selected value
$query = $db_handle->runQuery("SELECT `product_type_id`, `product_type`,`sub_cat_id` FROM `product_type` WHERE sub_cat_id = '$selectedValue'");


// Check for errors
echo json_encode($query);



