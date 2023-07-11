<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
if (!isset($_COOKIE['language'])) {
    $cookie_name = 'language';
    $cookie_value = 'CN';
    setcookie($cookie_name, $cookie_value);

    header("Location: set_lan.php?lan=CN");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Home - Four Seasons Florist</title>
    <?php include('include/css.php'); ?>
    <script>
        if (location.protocol !== 'https:') {
            location.replace(`https:${location.href.substring(location.protocol.length)}`);
        }
    </script>
</head>
<body>
<div id="page">
    <?php include('include/header.php'); ?>
    <!--container-->

    <div class="content container" style="padding: 0;">
        <!--banner section starts-->
        <?php include('include/banner.php'); ?>
        <!--banner section ends-->

        <!--Category slider Start-->
        <?php include('include/sub_cat_slider.php'); ?>
        <!--Category slider End-->

        <!-- best Pro Slider -->
        <section class=" wow bounceInUp animated">
            <div class="best-pro slider-items-products container">
                <div class="new_title">
                    <h2><?php
                        if ($_COOKIE['language'] == 'CN')
                            echo '本期限定';
                        else
                            echo 'Hot Deals';
                        ?></h2>
                
                </div>
                <div id="best-seller" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid owl-carousel">
                        <?php
                        $hot_products = $db_handle->runQuery("select * from product where hot_product = 1 ORDER BY rand () limit 20;");
                        $no_hot_products = $db_handle->numRows("select * from product where hot_product = 1 ORDER BY rand () limit 20;");
                        for ($x = 0; $x < $no_hot_products; $x++) {
                            $image = explode(',', $hot_products[$x]['p_image']);
                            $product_id = $hot_products[$x]['id'];
                            ?>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a
                                                    href="Product-Details?id=<?php echo $product_id; ?>"
                                                    title="Four Season Flowers"
                                                    class="product-image"><img
                                                        src="admin/<?php echo $image[0]; ?>" alt="Four Season Flowers"></a>
                                            <div class="new-label new-top-left"><?php if ($_COOKIE['language'] === 'CN') echo '热门'; else echo 'Hot'; ?></div>
                                        </div>
                                        
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a
                                                        href="Product-Details?id=<?php echo $product_id; ?>"
                                                        title="Four Season Flowers"><?php if ($_COOKIE['language'] === 'CN') echo $hot_products[$x]['p_name']; else echo $hot_products[$x]['p_name_en']; ?></a>
                                            </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"><span
                                                                    class="price"><?php echo $hot_products[$x]['product_price']; ?> HKD</span> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- best Pro Slider -->
        <section class=" wow bounceInUp animated">
            <div class="best-pro slider-items-products container">
                <div class="new_title">
                    <h2><?php
                        if ($_COOKIE['language'] == 'CN')
                            echo '熱賣推薦';
                        else
                            echo 'Best Seller';
                        ?></h2>
                
                </div>
                <div id="best-seller" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        <?php
                        $hot_products = $db_handle->runQuery("select * from product ORDER BY rand () limit 20;");
                        $no_hot_products = $db_handle->numRows("select * from product ORDER BY rand () limit 20;");
                        for ($x = 0; $x < $no_hot_products; $x++) {
                            $product_id = $hot_products[$x]['id'];
                            $image = explode(',', $hot_products[$x]['p_image']);
                            ?>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a
                                                    href="Product-Details?id=<?php echo $product_id; ?>"
                                                    title="Four Season Flowers"
                                                    class="product-image"><img
                                                        src="admin/<?php echo $image[0]; ?>" alt="Four Season Flowers"></a>
                                            <?php
                                            if ($hot_products[$x]['hot_product'] == '1') {
                                                ?>
                                                <div class="new-label new-top-left"><?php if ($_COOKIE['language'] === 'CN') echo '热门'; else echo 'Hot'; ?></div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                        
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a
                                                        href="Product-Details?id=<?php echo $product_id; ?>"
                                                        title="Four Season Flowers"><?php if ($_COOKIE['language'] === 'CN') echo $hot_products[$x]['p_name']; else echo $hot_products[$x]['p_name_en']; ?></a>
                                            </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"><span
                                                                    class="price"><?php echo $hot_products[$x]['product_price']; ?> HKD</span> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- Logo Brand Block -->
</div>


<?php
include('include/footer.php');
?>
<!--page-->
<!-- Mobile Menu-->
<?php include('include/mobile_menu.php'); ?>

<!-- JavaScript -->
<?php include('include/js.php'); ?>

</body>

</html>
