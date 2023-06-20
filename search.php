<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
$search = $_GET['search'];


$fetch_product = $db_handle->runQuery("select * from product where p_name like '%$search%' or p_name_en like '%$search%';");
$no_fetch_product = $db_handle->numRows("select * from product where p_name like '%$search%' or p_name_en like '%$search%';");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Category - Four Seasons Florist</title>
    <?php include('include/css.php'); ?>
    <!-- BEGIN GOOGLE ANALYTICS CODEs -->

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
                            <li class="home"><a href="index.php" title="Go to Home Page"><?php
                                    if ($_COOKIE['language'] == 'CN')
                                        echo '主頁';
                                    else
                                        echo ' Home Page';
                                    ?></a>
                                <span>&rsaquo; </span></li>
                            <li style="color: white"><?php
                                $cat_name = $db_handle->runQuery("select * from product where p_name like '%$search%' or p_name_en like '%$search%';");
                                echo $search;
                                ?></li>
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
                if ($_COOKIE['language'] == 'CN')
                    echo '花朵';
                else
                    echo ' Flowers';
                ?></h2>
        </div>
    </div>
    <!--breadcrumbs-->
    <!-- BEGIN Main Container col2-left -->
    <section class="main-container bounceInUp animated">
        <!-- For version 1, 2, 3, 8 -->
        <!-- For version 1, 2, 3 -->
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-12 product-grid">
                    <div class="pro-coloumn">
                        <?php include('include/inner_header.php'); ?>

                        <article>
                            <div class="category-products">
                                <ul class="products-grid">
                                    <?php
                                    for ($i = 0; $i < $no_fetch_product; $i++) {
                                        $image = explode(',', $fetch_product[$i]['p_image']);
                                        ?>
                                        <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                            <div class="item-inner">
                                                <div class="item-img">
                                                    <div class="item-img-info"><a
                                                                href="Product-Details?id=<?php echo $fetch_product[$i]['id']; ?>"
                                                                title="Test Flower"
                                                                class="product-image"><img
                                                                    src="admin/<?php echo $image[0]; ?>"
                                                                    alt="Test Flower"></a>
                                                    </div>
                                                    <?php
                                                    if ($fetch_product[$i]['hot_product'] == '1') {
                                                        ?>
                                                        <div class="new-label new-top-left">Hot</div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="add_cart">
                                                        <button class="button btn-cart" type="button">
                                                                <span><?php
                                                                    if ($_COOKIE['language'] == 'CN')
                                                                        echo '添加到購物車';
                                                                    else
                                                                        echo 'Add to Cart';
                                                                    ?></span></button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"><a
                                                                    href="Product-Details?id=<?php echo $fetch_product[$i]['id']; ?>"
                                                                    title="Test Flower"><?php if ($_COOKIE['language'] === 'CN') echo $fetch_product[$i]['p_name']; else echo $fetch_product[$i]['p_name_en']; ?></a>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="item-price">
                                                                <div class="price-box"><span
                                                                            class="regular-price"><span
                                                                                class="price"><?php echo $fetch_product[$i]['product_price']; ?></span> </span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </article>
                    </div>
                    <!--	///*///======    End article  ========= //*/// -->
                </div>
                <!--col-right sidebar-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--main-container col2-left-layout-->


    <!-- For version 1,2,3,4,6 -->
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

