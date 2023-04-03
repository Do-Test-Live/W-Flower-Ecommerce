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

if(isset($_POST['update_customer_info'])){
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $phone = $db_handle->checkValue($_POST['phone']);
    $address_one = $db_handle->checkValue($_POST['address_one']);
    $address_two = $db_handle->checkValue($_POST['address_two']);
    $address_three = $db_handle->checkValue($_POST['address_three']);
    $updated_at = date("Y-m-d H:i:s");

    $update = $db_handle->insertQuery("UPDATE `customer` SET `customer_name`='$name',`email`='$email',`number`='$phone',`address_1`='$address_one',`address_2`='$address_two',`address_3`='$address_three',`updated_at`='$updated_at' WHERE id='$id'");
    echo "<script>
                window.location.href='Account';
                </script>";
}
