<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
$product_id = $_GET['id'];
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
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li class="home"><a href="Home" title="Go to Home Page"><?php
                                    if($_COOKIE['language'] == 'CN')
                                        echo '家';
                                    else
                                        echo 'Home';
                                    ?></a>
                            </li>
                        </ul>
                    </div>
                    <!--col-xs-12-->
                </div>
                <!--row-->
            </div>
            <!--container-->
        </div>
        <div class="page-title">
            <h2><?php
                if($_COOKIE['language'] == 'CN')
                    echo '花朵';
                else
                    echo 'Flowers';
                ?></h2>
        </div>
    </div>
    <!-- BEGIN Main Container -->
    <div class="main-container col1-layout wow bounceInUp animated">
        <div class="main">
            <div class="col-main">
                <!-- Endif Next Previous Product -->
                <div class="product-view wow bounceInUp animated">
                    <div id="messages_product_view"></div>
                    <!--product-next-prev-->
                    <div class="product-essential container">
                        <div class="row">


                            <!--End For version 1, 2, 6 -->
                            <!-- For version 3 -->
                            <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
                                <?php
                                $select_product = $db_handle->runQuery("select * from product where id = '$product_id'");
                                $image = explode(',', $select_product[0]['p_image']);
                                ?>
                                <?php
                                if ($select_product[0]['hot_product'] == 1) {
                                    ?>
                                    <div class="new-label new-top-left">Hot</div>
                                    <?php
                                }
                                ?>
                                <div class="product-image">
                                    <div class="product-full"><img id="product-zoom"
                                                                   src="admin/<?php echo $image[0]; ?>"
                                                                   data-zoom-image="admin/<?php echo $image[0]; ?>"
                                                                   alt="product-image"/></div>
                                    <div class="more-views">
                                        <div class="slider-items-products">
                                            <div id="gallery_01"
                                                 class="product-flexslider hidden-buttons product-img-thumb">
                                                <div class="slider-items slider-width-col4 block-content">
                                                    <div class="more-views-items"><a href="#"
                                                                                     data-image="admin/<?php echo $image[0]; ?>"
                                                                                     data-zoom-image="admin/<?php echo $image[0]; ?>">
                                                            <img id="product-zoom0"
                                                                 src="admin/<?php echo $image[0]; ?>"
                                                                 onclick="related_image(this);"
                                                                 alt="product-image"/> </a></div>
                                                    <!--<div class="more-views-items"><a href="#"
                                                                                     data-image="admin/<?php /*echo $image[1]; */?>"
                                                                                     data-zoom-image="admin/<?php /*echo $image[1]; */?>">
                                                            <img id="product-zoom1"
                                                                 src="admin/<?php /*echo $image[1]; */?>"
                                                                 alt=" product-image"
                                                                 onclick="related_image(this);"/> </a></div>
                                                    <div class="more-views-items"><a href="#"
                                                                                     data-image="admin/<?php /*echo $image[2]; */?>"
                                                                                     data-zoom-image="admin/<?php /*echo $image[2]; */?>">
                                                            <img id="product-zoom2"
                                                                 src="admin/<?php /*echo $image[2]; */?>"
                                                                 alt=" product-image"
                                                                 onclick="related_image(this);"/> </a></div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end: more-images -->
                            </div>
                            <!--End For version 1,2,6-->
                            <!-- For version 3 -->
                            <div class="product-shop col-lg- col-sm-7 col-xs-12">
                                <div class="product-name">
                                    <h1><?php if($_COOKIE['language'] === 'CN') echo $select_product[0]['p_name']; else echo $select_product[0]['p_name_en']; ?></h1>
                                </div>
                                <div class="price-block">
                                    <div class="price-box">
                                        <p class="availability in-stock"><span><?php if($_COOKIE['language'] === 'CN') echo '有存货'; else echo 'In Stock'?></span></p>
                                        <p class="special-price">
                                                <span id="product-price-48"
                                                      class="price"> <?php echo $select_product[0]['product_price']; ?> HKD</span>
                                        </p>
                                    </div>
                                </div>
                                <form action="Product-Details?action=add&id=<?php echo $_GET['id']; ?>"
                                      method="post">
                                    <div class="form-row">
                                        <input class="form-control" type="number" value="1" min="1" name="quantity"
                                               style="width: 100px;height: 50px;font-size: 25px"/>
                                    </div>
                                    <div class="add-to-box" style="margin-top: 2em">
                                        <div class="add-to-cart">
                                            <button class="button btn-cart"
                                                    title="Add to Cart" type="submit"><?php
                                                if($_COOKIE['language'] == 'CN')
                                                    echo '添加到購物車';
                                                else
                                                    echo 'Add to Cart';
                                                ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="short-description">
                                    <p><?php if($_COOKIE['language'] === 'CN') echo $select_product[0]['description']; else echo $select_product[0]['description_en']; ?> </p>
                                </div>

                                <ul class="shipping-pro">
                                    <li><?php
                                        if($_COOKIE['language'] == 'CN')
                                            echo '長洲，坪洲及離島交通禁區不設送貨';
                                        ?></li>
                                    <li><?php
                                        if($_COOKIE['language'] == 'CN')
                                            echo '訂單需時預備，將會在第三個工作天處理';
                                        ?></li>
                                    <li><?php
                                        if($_COOKIE['language'] == 'CN')
                                            echo '送貨時段為9.00am-7.pm，如需要緊急送貨或訂單自取，請直接聯絡我們';
                                        ?></li>
                                </ul>
                            </div>

                        </div>
                    </div>


                    <!--product-collateral-->
                    <div class="box-additional">
                        <!-- BEGIN RELATED PRODUCTS -->
                        <div class="related-pro container">
                            <div class="slider-items-products">
                                <div class="new_title center">
                                    <h2><?php
                                        if($_COOKIE['language'] === 'CN')
                                            echo '相关产品';
                                        else
                                            echo 'Related Products';
                                        ?>

                                        </h2>
                                </div>
                                <div id="related-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 products-grid">
                                        <?php
                                        $cat_id = $select_product[0]['category_id'];
                                        $hot_products = $db_handle->runQuery("select * from product where category_id = '$cat_id' ORDER BY rand () limit 10;");
                                        $no_hot_products = $db_handle->numRows("select * from product where category_id = '$cat_id' ORDER BY rand () limit 10;");
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
                                                                        src="admin/<?php echo $image[0]; ?>"
                                                                        alt="Four Season Flowers"></a>
                                                            <?php
                                                            if ($hot_products[$x]['hot_product'] == '1') {
                                                                ?>
                                                                <div class="new-label new-top-left"><?php
                                                                    if($_COOKIE['language'] == 'CN')
                                                                        echo '熱的';
                                                                    else
                                                                        echo 'Hot';
                                                                    ?></div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                        <div class="add_cart">
                                                            <button class="button btn-cart"
                                                                    onclick="location.href='Checkout'" type="button">
                                                                <span><?php
                                                                    if($_COOKIE['language'] == 'CN')
                                                                        echo '添加到購物車';
                                                                    else
                                                                        echo 'Add to Cart';
                                                                    ?></span></button>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title"><a
                                                                        href="Product-Details?id=<?php echo $product_id; ?>"
                                                                        title="Four Season Flowers"><?php if($_COOKIE['language'] === 'CN') echo $hot_products[$x]['p_name']; else echo $hot_products[$x]['p_name_en'];?></a>
                                                            </div>
                                                            <div class="item-content">
                                                                <div class="item-price">
                                                                    <div class="price-box"><span
                                                                                class="regular-price"><span
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
                        </div>
                        <!-- end related product -->

                    </div>
                    <!-- end related product -->
                </div>
                <!--box-additional-->
                <!--product-view-->
            </div>
        </div>
        <!--col-main-->
    </div>
    <!--main-container-->
</div>

<?php include('include/footer.php'); ?>
<!-- End For version 1,2,3,4,6 -->

<!--page-->
<!-- Mobile Menu-->
<?php include('include/mobile_menu.php'); ?>
<!-- JavaScript -->
<?php include('include/js.php'); ?>


<script>
    function change_image() {
        document.getElementById('menu_icon').style.display = 'none';
        document.getElementById('menu_icon_cross').style.display = 'block';
    }

    function change_image_rep() {
        document.getElementById('menu_icon').style.display = 'block';
        document.getElementById('menu_icon_cross').style.display = 'none';
    }

    function related_image(img) {
        let data = img.src;
        document.getElementById('product-zoom').src = data;
    }


</script>

</body>

</html>
