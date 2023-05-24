<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>四季花店</title>
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
                        <h2><?php
                            if($_COOKIE['language'] == 'CN')
                                echo '查看';
                            else
                                echo 'Checkout';
                            ?></h2>
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
                                        <h2><?php
                                            if($_COOKIE['language'] == 'CN')
                                                echo '郵寄地址';
                                            else
                                                echo 'Delivery Address';
                                            ?></h2>
                                    </div>
                                    <div class="checkout-detail">
                                        <div class="row g-4">
                                            <div class="col-xxl-12">
                                                <div class="delivery-address-box">
                                                    <div class="row">
                                                        <div class="form-group col-md-12 mb-3">
                                                            <label><?php if ($_COOKIE['language'] === 'CN') echo '聯繫人姓名'; else echo 'Contact Name';?></label>
                                                            <input type="text" class="form-control" name="contact_name"
                                                                   value="" required="">
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <label><?php if ($_COOKIE['language'] === 'CN') echo '聯繫人電話'; else echo 'Contact Number';?></label>
                                                            <input type="text" class="form-control" name="contact_phone"

                                                        <div class="form-group col-md-12 mb-3">
                                                            <label><?php if ($_COOKIE['language'] === 'CN') echo '電子郵件'; else echo 'Email';?></label>
                                                            <input type="email" class="form-control" name="email"
                                                                   value="" required="">
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <label><?php if ($_COOKIE['language'] === 'CN') echo '收件人姓名'; else echo 'Recipient Name';?></label>
                                                            <input type="text" class="form-control" name="receiver_name"
                                                                   value="" required="">
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <label><?php if ($_COOKIE['language'] === 'CN') echo '收件人電話'; else echo 'Recipient Phone';?></label>
                                                            <input type="text" class="form-control" name="receiver_phone"
                                                                   value="" required="">
                                                        </div>
                                                        <div class="form-group col-md-12 mb-3">
                                                            <label><?php if ($_COOKIE['language'] === 'CN') echo '地址'; else echo 'Address';?></label>
                                                            <input type="text" class="form-control" name="address"
                                                                   value="" required="">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label><?php if ($_COOKIE['language'] === 'CN') echo '交貨日期'; else echo 'Delivery Date';?></label>
                                                            <input type="date" class="form-control" name="deliver_date" required="">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <label><?php if ($_COOKIE['language'] === 'CN') echo '交貨時間'; else echo 'Delivery Time';?></label>
                                                            <input type="time" class="form-control" name="deliver_time"
                                                                   value="" required="">
                                                        </div>
                                                        <div class="form-group col-md-6 mb-3">
                                                            <input class="form-check-input card-class" name="addInfo"
                                                                   type="checkbox"
                                                                   value="" id="flexCheckChecked">
                                                            <label class="form-check-label ms-2" for="flexCheckChecked"><?php
                                                                if($_COOKIE['language'] == 'CN')
                                                                    echo '將此數據添加到客戶信息';
                                                                else
                                                                    echo ' Add this data to customer info';
                                                                ?>

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
                                    <h2><?php
                                        if($_COOKIE['language'] == 'CN')
                                            echo '訂單摘要';
                                        else
                                            echo 'Order Summery';
                                        ?></h2>
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
                                            <h4><?php
                                                if($_COOKIE['language'] == 'CN')
                                                    echo '小計';
                                                else
                                                    echo 'Subtotal';
                                                ?></h4>
                                        </td>
                                        <td colspan="2" style="text-align: right">
                                            <h4 class="price"><?php echo "HK$ " . number_format($total_price_new, 2); ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">
                                            <h4><?php
                                                if($_COOKIE['language'] == 'CN')
                                                    echo '船運';
                                                else
                                                    echo 'Shipping';
                                                ?></h4>
                                        </td>
                                        <td colspan="2" style="text-align: right">
                                            <h4 class="price">HK$ 0.00</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">
                                            <h4><?php
                                                if($_COOKIE['language'] == 'CN')
                                                    echo '優惠券代碼';
                                                else
                                                    echo 'Coupon/Code';
                                                ?></h4>
                                        </td>
                                        <td colspan="2" style="text-align: right">
                                            <h4 class="price">HK$ 0.00</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left">
                                            <h4><?php
                                                if($_COOKIE['language'] == 'CN')
                                                    echo '總計（港元）';
                                                else
                                                    echo 'Total (HKD)';
                                                ?></h4>
                                        </td>
                                        <td colspan="2" style="text-align: right">
                                            <h4 class="price"><?php echo "HK$ " . number_format($total_price_new, 2); ?></h4>
                                        </td>
                                    </tr>
                                </table>
                                <p style="margin-top: 2em">
                                    <?php
                                        if($_COOKIE['language'] == 'CN')
                                            echo '下一個工作天24小時後開始送貨';
                                        else
                                            echo 'Delivery starts after 24 hours on the next working day';
                                    ?>
                                </p>
                                <button class="button" name="placeOrder" type="submit" style="margin-top: 1em"><?php
                                    if($_COOKIE['language'] == 'CN')
                                        echo '下訂單';
                                    else
                                        echo 'Place Order';
                                    ?>
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
