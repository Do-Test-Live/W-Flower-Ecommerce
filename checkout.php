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
                                    <th rowspan="1"></th>
                                    <th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th>
                                    <th rowspan="1" class="a-center">Qty</th>
                                    <th class="a-center" colspan="1">Subtotal</th>
                                    <th rowspan="1" class="a-center">&nbsp;</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="first last">
                                    <td colspan="50" class="a-right last">
                                        <button type="button" title="Continue Shopping" class="button btn-continue"
                                                onClick=""><span><span>Continue Shopping</span></span></button>
                                        <button type="submit" name="update_cart_action" value="empty_cart"
                                                title="Clear Cart" class="button btn-empty" id="empty_cart_button">
                                            <span><span>Clear Cart</span></span></button>

                                    </td>
                                </tr>
                                </tfoot>
                                <tbody>

                                <tr class="first last odd">
                                    <td class="image hidden-table"><a href="product_detail.php"
                                                                      title="Women&#39;s Georgette Animal Print"
                                                                      class="product-image"><img
                                            src="images/flower/15.jpg" width="75"
                                            alt="Women&#39;s Georgette Animal Print"></a></td>
                                    <td>
                                        <h2 class="product-name">
                                            <a href="product_detail.php">Test Image</a>
                                        </h2>
                                    </td>
                                    <td class="a-center hidden-table">
                                        <a href="#" class="edit-bnt" title="Edit item parameters"></a>
                                    </td>


                                    <td class="a-right hidden-table">
                            <span class="cart-price">
                                                <span class="price">$129.00</span>
            </span>


                                    </td>
                                    <td class="a-center movewishlist">
                                        <input name="cart[26340][qty]" value="1" size="4" title="Qty"
                                               class="input-text qty" maxlength="12">
                                    </td>
                                    <td class="a-right movewishlist">
                    <span class="cart-price">

                                                <span class="price">$129.00</span>
        </span>
                                    </td>
                                    <td class="a-center last">

                                        <a href="#" title="Remove item" class="button remove-item"><span><span>Remove item</span></span></a>
                                    </td>


                                </tr>
                                <tr class="first last odd">
                                    <td class="image hidden-table"><a href="product_detail.php"
                                                                      title="Women&#39;s Georgette Animal Print"
                                                                      class="product-image"><img
                                            src="images/flower/16.jpg" width="75"
                                            alt="Women&#39;s Georgette Animal Print"></a></td>
                                    <td>
                                        <h2 class="product-name">
                                            <a href="product_detail.php">Test Image</a>
                                        </h2>
                                    </td>
                                    <td class="a-center hidden-table">
                                        <a href="#" class="edit-bnt" title="Edit item parameters"></a>
                                    </td>


                                    <td class="a-right hidden-table">
                            <span class="cart-price">
                                                <span class="price">$129.00</span>
            </span>


                                    </td>
                                    <td class="a-center movewishlist">
                                        <input name="cart[26340][qty]" value="1" size="4" title="Qty"
                                               class="input-text qty" maxlength="12">
                                    </td>
                                    <td class="a-right movewishlist">
                    <span class="cart-price">

                                                <span class="price">$129.00</span>
        </span>
                                    </td>
                                    <td class="a-center last">

                                        <a href="#" title="Remove item" class="button remove-item"><span><span>Remove item</span></span></a>
                                    </td>


                                </tr>
                                </tbody>
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
                                                <strong><span class="price">$129.00</span></strong>
                                            </td>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <tr>
                                            <td style="" class="a-left" colspan="1">
                                                Subtotal
                                            </td>
                                            <td style="" class="a-right">
                                                <span class="price">$129.00</span></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <ul class="checkout">
                                        <li>
                                            <button type="button" title="Proceed to Checkout"
                                                    class="button btn-proceed-checkout" onClick=""><span>Proceed to Checkout</span>
                                            </button>
                                        </li>
                                        <br>
                                    </ul>
                                </div><!--inner-->
                            </div><!--totals-->
                        </div> <!--col-sm-4-->


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