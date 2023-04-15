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
</head>

<body>
<div id="page">
    <?php include('include/header.php'); ?>

    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN Main Container -->

    <div class="main-container col1-layout wow bounceInUp animated">

        <div class="main">
            <div class="cart wow bounceInUp animated">

                <div class="table-responsive shopping-cart-tbl  container">
                    <form action="#" method="post">
                        <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
                        <fieldset>
                            <table id="shopping-cart-table" class="data-table cart-table table-striped">
                                <colgroup>
                                    <col width="1">
                                    <col>
                                    <col width="1">
                                    <col width="1">
                                    <col width="1">
                                    <col width="1">
                                    <col width="1">

                                </colgroup>
                                <thead>
                                <tr class="first last">
                                    <th rowspan="1">&nbsp;</th>
                                    <th rowspan="1"><span class="nobr">Product Name</span></th>
                                    <th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th>
                                    <th rowspan="1" class="a-center">Qty</th>
                                    <th class="a-center" colspan="1">Subtotal</th>
                                    <th rowspan="1" class="a-center">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total_quantity_new = 0;
                                $total_price_new = 0;
                                if (isset($_SESSION["cart_item"])) {
                                foreach ($_SESSION["cart_item"] as $item) {
                                $item_price = $item["quantity"] * $item["price"];
                                ?>
                                <tr class="first last odd">
                                    <td class="image hidden-table">
                                        <a href="Product-Details?id=<?php echo $item["id"]; ?>" class="product-image">
                                            <img src="admin/<?php echo $item["image"]; ?>" width="75" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <h2 class="product-name">
                                            <a href="Product-Details?id=<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></a>
                                        </h2>
                                    </td>
                                    <td class="a-right hidden-table">
                                        <span class="cart-price">
                                            <span class="price"><?php echo $item["price"]; ?> HKD</span>
                                        </span>
                                    </td>
                                    <td class="a-center movewishlist">
                                        <?php echo $item["quantity"]; ?>
                                    </td>
                                    <td class="a-right movewishlist">
                                        <span class="cart-price">
                                            <span class="price"><?php echo number_format($item_price, 2); ?> HKD</span>
                                        </span>
                                    </td>
                                    <td class="a-center last">
                                        <a href="Cart?action=remove&id=<?php echo $item["id"]; ?>" title="Remove item" class="button remove-item"><span><span>Remove item</span></span></a>
                                    </td>
                                </tr>
                                    <?php
                                    $total_quantity_new += $item["quantity"];
                                    $total_price_new += ($item["price"] * $item["quantity"]);
                                }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr class="first last">
                                    <td colspan="50" class="a-right last">
                                        <button type="button" title="Continue Shopping" class="button btn-continue" onclick="location.href = 'Home';">
                                            <span>
                                                <span>Continue Shopping</span>
                                            </span>
                                        </button>
                                        <a href="Cart?action=empty" class="button btn-danger" style="background: #ff0000">
                                            <span>
                                                <span>Clear Cart</span>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                        </fieldset>
                    </form>
                </div>

                <!-- BEGIN CART COLLATERALS -->


                <div class="cart-collaterals container">
                    <!-- BEGIN COL2 SEL COL 1 -->
                    <div class="row text-right">

                        <div class="col-sm-12">
                            <div class="totals">
                                <h3>Shopping Cart Total</h3>
                                <div class="inner">

                                    <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
                                        <colgroup>
                                            <col>
                                            <col width="1">
                                        </colgroup>
                                        <tfoot>
                                        <tr>
                                            <td style="" class="a-left" colspan="1">
                                                <strong>Grand Total</strong>
                                            </td>
                                            <td style="" class="a-right">
                                                <strong><span class="price"><?php echo number_format($total_price_new, 2); ?> HKD</span></strong>
                                            </td>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <tr>
                                            <td style="" class="a-left" colspan="1">
                                                Subtotal
                                            </td>
                                            <td style="" class="a-right">
                                                <span class="price"><?php echo number_format($total_price_new, 2); ?> HKD</span></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <ul class="checkout">
                                        <li>
                                            <button type="button" title="Proceed to Checkout"
                                                    class="button btn-proceed-checkout" onclick="location.href = 'Checkout';"><span>Proceed to Checkout</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div><!--inner-->
                            </div><!--totals-->
                        </div> <!--col-sm-4-->


                    </div> <!--cart-collaterals-->


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
