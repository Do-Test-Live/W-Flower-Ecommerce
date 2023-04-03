<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");


if(isset($_POST['signup'])){
    $name = $db_handle->checkValue($_POST['name']);
    $number = $db_handle->checkValue($_POST['number']);
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);
    $address = $db_handle->checkValue($_POST['address']);
    $inserted_at = date("Y-m-d H:i:s");

    $signup = $db_handle->insertQuery("INSERT INTO `customer`(`customer_name`, `email`, `number`, `password`, `address_1`, `inserted_at`) VALUES 
                                                            ('$name','$email','$number','$password','$address','$inserted_at')");
    if($signup){
        echo "<script>
                window.location.href='Home';
                </script>";
    }
}
