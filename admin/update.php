<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();

date_default_timezone_set("Asia/Hong_Kong");

if (!isset($_SESSION["userid"])) {
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_POST['updateCategory'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['c_name']);
    $status = $db_handle->checkValue($_POST['status']);
    $image = '';
    $query = '';
    if (!empty($_FILES['cat_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['cat_image']['name'];
        $file_size = $_FILES['cat_image']['size'];
        $file_tmp = $_FILES['cat_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `category` WHERE id='{$id}'");
            unlink($data[0]['image']);
            move_uploaded_file($file_tmp, "assets/cat_img/" . $file_name);
            $image = "assets/cat_img/" . $file_name;
            $query .= ",`image`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("update category set c_name='$name', status='$status'" . $query . " where id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Category';
                </script>";


}


if (isset($_POST['updateSubCategory'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $category = $db_handle->checkValue($_POST['category']);
    $sub_cat_name = $db_handle->checkValue($_POST['sub_cat_name']);
    $image = '';
    $query = '';
    $updated_at = date("Y-m-d H:i:s");
    if (!empty($_FILES['sub_cat_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['sub_cat_image']['name'];
        $file_size = $_FILES['sub_cat_image']['size'];
        $file_tmp = $_FILES['sub_cat_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `sub_category` WHERE sub_cat_id='{$id}'");
            unlink($data[0]['sub_cat_image']);
            move_uploaded_file($file_tmp, "assets/sub_cat_img/" . $file_name);
            $image = "assets/sub_cat_img/" . $file_name;
            $query .= ",`sub_cat_image`='" . $image . "'";
        }
    }

     $data = $db_handle->insertQuery("UPDATE `sub_category` SET `sub_cat_name`='$sub_cat_name',`cat_id`='$category',`updated_at`='$updated_at'" . $query . " where sub_cat_id ={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Sub-Category';
                </script>";
}


if (isset($_POST['updateProduct'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $p_name = $db_handle->checkValue($_POST['p_name']);
    $product_code = $db_handle->checkValue($_POST['p_code']);
    $product_description = $db_handle->checkValue($_POST['product_description']);
    $product_category = $db_handle->checkValue($_POST['product_category']);
    $subcategory = $db_handle->checkValue($_POST['subcategory']);
    $product_type = $db_handle->checkValue($_POST['product_type']);
    $product_color = $db_handle->checkValue($_POST['product_color']);
    $hot_product = $db_handle->checkValue($_POST['hot_product']);
    $status = $db_handle->checkValue($_POST['status']);
    $product_price = $db_handle->checkValue($_POST['product_price']);

    $updated_at = date("Y-m-d H:i:s");

    $data = $db_handle->insertQuery("UPDATE `product` SET `category_id`='$product_category',`product_code`='$product_code',`p_name`='$p_name',`description`='$product_description',
                     `status`='$status',`updated_at`='$updated_at',`product_price`='$product_price', `sub_category` = '$subcategory', `product_type` = '$product_type', `product_color` = '$product_color', 
                     `hot_product` = '$hot_product' WHERE id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Product';
                </script>";
}

if (isset($_POST['updateCourse'])) {
    $course_id = $db_handle->checkValue($_POST['id']);
    $course_name = $db_handle->checkValue($_POST['course_name']);
    $course_duration = $db_handle->checkValue($_POST['course_duration']);
    $course_price = $db_handle->checkValue($_POST['course_price']);
    $course_description = $db_handle->checkValue($_POST['course_description']);
    $status = $db_handle->checkValue($_POST['status']);
    $updated_at = date("Y-m-d H:i:s");
    $image = '';
    $query = '';
    if (!empty($_FILES['course_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['course_image']['name'];
        $file_size = $_FILES['course_image']['size'];
        $file_tmp = $_FILES['course_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `course` WHERE course_id='{$course_id}'");
            unlink($data[0]['course_image']);
            move_uploaded_file($file_tmp, "assets/course/" . $file_name);
            $image = "assets/course/" . $file_name;
            $query .= ",`course_image`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("UPDATE `course` SET `course_name`='$course_name',`course_duration`='$course_duration',`course_price`='$course_price',`course_description`='$course_description',`status`='$status',`updated_at`='$updated_at'" . $query . " WHERE course_id='{$course_id}'");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Course';
                </script>";
}


if (isset($_POST['update_promo_code'])) {
    $promo_id = $db_handle->checkValue($_POST['id']);
    $updated_at = date("Y-m-d H:i:s");
    $coupon_name = $db_handle->checkValue($_POST['coupon_name']);
    $coupon_code = $db_handle->checkValue($_POST['coupon_code']);
    $coupon_type = $db_handle->checkValue($_POST['coupon_type']);
    $coupon_amount = $db_handle->checkValue($_POST['coupon_amount']);
    $start_date = $db_handle->checkValue($_POST['start_date']);
    $expirey_date = $db_handle->checkValue($_POST['expirey_date']);
    $description = $db_handle->checkValue($_POST['description']);
    $status = $db_handle->checkValue($_POST['status']);

    $data = $db_handle->insertQuery("UPDATE `promo_code` SET `coupon_name`='$coupon_name',`description`='$description',`code`='$coupon_code',`coupon_type`='$coupon_type',`amount`='$coupon_amount',
                        `start_date`='$start_date',`expirey_date`='$expirey_date',`status`='$status',`updated_at`='$updated_at' WHERE id={$promo_id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Promo-Code';
                </script>";
}

if (isset($_POST['updateAdmin'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $role = $db_handle->checkValue($_POST['role']);
    $password = $db_handle->checkValue($_POST['password']);
    $status = $db_handle->checkValue($_POST['status']);
    $image = '';
    $query = '';
    if (!empty($_FILES['image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `admin_login` WHERE id='{$id}'");
            unlink($data[0]['image']);
            move_uploaded_file($file_tmp, "assets/admin/" . $file_name);
            $image = "assets/admin/" . $file_name;
            $query .= ",`image`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("UPDATE `admin_login` SET `name`='$name',`email`='$email',`password`='$password',`role`='$role',`status`='$status'" . $query . " WHERE id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Admin';
                </script>";
}

if (isset($_POST['updateHomeBanner'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $banner_name = $db_handle->checkValue($_POST['banner_name']);
    $updated_at = date("Y-m-d H:i:s");
    $image = '';
    $query = '';
    if (!empty($_FILES['banner_img']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['banner_img']['name'];
        $file_size = $_FILES['banner_img']['size'];
        $file_tmp = $_FILES['banner_img']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("SELECT * FROM banner WHERE id='{$id}'");
            unlink($data[0]['banner_img']);
            move_uploaded_file($file_tmp, "assets/banner/" . $file_name);
            $image = "assets/banner/" . $file_name;
            $query .= ",`banner_img`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("update banner set `banner_name`='$banner_name',`updated_at`='$updated_at'" . $query . " where id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Banner';
                </script>";


}


if(isset($_POST['updateColor'])){
    $id = $db_handle->checkValue($_POST['id']);
    $color_name = $db_handle->checkValue($_POST['color_name']);
    $updated_at = date("Y-m-d H:i:s");

    $data = $db_handle->insertQuery("UPDATE `flower_color` SET `color`='$color_name',`updated_at`='$updated_at' WHERE color_id = '$id'");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Color';
                </script>";

}

if(isset($_POST['pass_update'])){
    $old_pass = $db_handle->checkValue($_POST['old_pass']);
    $new_pass = $db_handle->checkValue($_POST['new_pass']);

    $data = $db_handle->runQuery("SELECT password FROM admin_login");
    if($data[0]['password'] == $old_pass){
        $data = $db_handle->insertQuery("UPDATE `admin_login` SET `password`='$new_pass'");
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Profile';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
    }
}

if(isset($_GET['billing_id'])){
    $billing_id = $_GET['billing_id'];
    $update = $db_handle->insertQuery("update billing_details set approve = '2' where id=$billing_id");
    if($update){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Pending-Order';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Pending-Order';
                </script>";
    }
}

if(isset($_GET['confirm_id'])){
    $billing_id = $_GET['confirm_id'];
    $update = $db_handle->insertQuery("update billing_details set approve = '1' where id=$billing_id");
    if($update){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Confirm-Order';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Confirm-Order';
                </script>";
    }
}

if(isset($_POST['updateProductType'])){
    $id = $db_handle->checkValue($_POST['id']);
    $category = $db_handle->checkValue($_POST['category']);
    $sub_cat = $db_handle->checkValue($_POST['sub_cat']);
    $product_type = $db_handle->checkValue($_POST['product_type']);
    $updated_at = date("Y-m-d H:i:s");

    $update = $db_handle->insertQuery("UPDATE `product_type` SET `product_type`='$product_type',`cat_id`='$category',`sub_cat_id`='$sub_cat',`updated_at`='$updated_at' 
                      WHERE product_type_id = '$id'");
    if($update){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Product-Type';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Product-Type';
                </script>";
    }

}
