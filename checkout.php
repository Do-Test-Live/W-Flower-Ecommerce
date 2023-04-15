<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Four Seasons Florist</title>
    <?php include ('include/css.php');?>
</head>

<body>
<div id="page">
    <?php include ('include/header.php');?>

    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN Main Container -->

    <div class="main-container col1-layout wow bounceInUp animated">

        <div class="main">
            <div class="cart wow bounceInUp animated">

                <!-- BEGIN CART COLLATERALS -->


                <div class="cart-collaterals container">
                    <!-- BEGIN COL2 SEL COL 1 -->
                    <div class="row text-center">
                        <div class="col-12">
                            <h1>Scan this QR Code for Payment</h1>
                            <img src="images/qr-payme.png" class="img-fluid mt-4" alt=""/>
                        </div>
                    </div> <!--cart-collaterals-->


                </div>
            </div>  <!--cart-->

        </div><!--main-container-->

    </div> <!--col1-layout-->


    <?php include ('include/footer.php');?>
    <!-- End For version 1,2,3,4,6 -->

</div>
<!--page-->
<!-- Mobile Menu-->
<?php include ('include/mobile_menu.php');?>
<!-- JavaScript -->
<?php include ('include/js.php');?>


</body>
</html>
