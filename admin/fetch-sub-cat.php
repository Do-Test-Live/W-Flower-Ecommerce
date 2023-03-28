<?php
// Establish a connection to the database
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();

// Get the selected value from the first select field
$selectedValue = $_GET['selectedValue'];

// Query the database based on the selected value
$query = $db_handle->runQuery("SELECT sub_cat_id, sub_cat_name FROM `sub_category` WHERE cat_id = '$selectedValue'");


// Check for errors
echo json_encode($query);



