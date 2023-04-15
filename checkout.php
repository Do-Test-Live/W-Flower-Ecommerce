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
    <?php include('include/css.php'); ?>

    <style>
        td {
            border: 1px solid black;
            text-align: center;
            padding-right: 5px;
            padding-left: 5px;
        }
    </style>
</head>

<body>
<div id="page">
    <?php include('include/header.php'); ?>

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
                    <form action="Payment" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout-box">
                                    <div class="checkout-title">
                                        <h2>Delivery Address</h2>
                                    </div>
                                    <div class="checkout-detail">
                                        <div class="row g-4">
                                            <div class="col-xxl-12">
                                                <div class="delivery-address-box">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="f_name"
                                                                   value="" placeholder="First Name" required="">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="l_name"
                                                                   value="" placeholder="Last Name" required="">
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <input type="text" class="form-control" name="email"
                                                                   value="" placeholder="Email Address" required="">
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <input type="text" class="form-control" name="phone_number"
                                                                   value="" placeholder="Phone Number" maxlength="10"
                                                                   minlength="10" required="">
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <input type="text" class="form-control" name="address"
                                                                   value="" placeholder="Street Address" required="">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="city" value=""
                                                                   placeholder="City" required="">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input type="text" class="form-control" name="zip_code"
                                                                   value="" placeholder="Zip Code" maxlength="5"
                                                                   minlength="5" required="">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input class="form-check-input card-class" name="addInfo"
                                                                   type="checkbox"
                                                                   value="" id="flexCheckChecked">
                                                            <label class="form-check-label ms-2" for="flexCheckChecked">
                                                                Add this data to customer info
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="summery-header">
                                    <h2>Order Summery</h2>
                                </div>

                                <table style="width: 100%">
                                    <?php
                                    $total_quantity_new = 0;
                                    $total_price_new = 0;
                                    if (isset($_SESSION["cart_item"])) {
                                        foreach ($_SESSION["cart_item"] as $item) {
                                            $item_price = $item["quantity"] * $item["price"];
                                            ?>
                                            <tr>
                                                <td>
                                                    <img src="admin/<?php echo $item["image"]; ?>"
                                                         class="img-fluid" style="height: 150px" alt="">
                                                </td>
                                                <td>
                                                    <?php echo $item["name"]; ?>
                                                    <span>X <?php echo $item["quantity"]; ?></span>
                                                </td>
                                                <td style="text-align: right">
                                                    <h4 class="price"><?php echo "HK$ " . number_format($item_price, 2); ?></h4>
                                                </td>
                                            </tr>
                                            <?php
                                            $total_quantity_new += $item["quantity"];
                                            $total_price_new += ($item["price"] * $item["quantity"]);
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align: left">
                                            <h4>Subtotal</h4>
                                        </td>
                                        <td colspan="2" style="text-align: right">
                                            <h4 class="price"><?php echo "HK$ " . number_format($total_price_new, 2); ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">
                                            <h4>Shipping</h4>
                                        </td>
                                        <td colspan="2" style="text-align: right">
                                            <h4 class="price">HK$ 0.00</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">
                                            <h4>Coupon/Code</h4>
                                        </td>
                                        <td colspan="2" style="text-align: right">
                                            <h4 class="price">HK$ 0.00</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">
                                            <h4>Total (HKD)</h4>
                                        </td>
                                        <td colspan="2" style="text-align: right">
                                            <h4 class="price"><?php echo "HK$ " . number_format($total_price_new, 2); ?></h4>
                                        </td>
                                    </tr>
                                </table>
                                <button class="button" name="placeOrder" type="submit" style="margin-top: 2em">Place
                                    Order
                                </button>
                            </div>
                        </div> <!--cart-collaterals-->
                    </form>

                </div>
            </div>  <!--cart-->

        </div><!--main-container-->

    </div> <!--col1-layout-->


    <?php include('include/footer.php'); ?>
    <!-- End For version 1,2,3,4,6 -->

</div>
<!--page-->
<!-- Mobile Menu-->
<?php include('include/mobile_menu.php'); ?>
<!-- JavaScript -->
<?php include('include/js.php'); ?>


</body>
</html>
