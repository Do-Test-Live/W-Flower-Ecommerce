<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
$id_product_type = $_GET['id'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
// calculate the offset for the SQL query
$offset = ($current_page - 1) * 9;
$fetch_product = $db_handle->runQuery("SELECT * FROM product where product_type='$id_product_type' LIMIT 9 OFFSET $offset");
$no_fetch_product = $db_handle->numRows("SELECT * FROM product where product_type='$id_product_type' LIMIT 9 OFFSET $offset");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>類別 - 四季花店</title>
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
                            <li class="home"><a href="index.php"><?php
                                    if($_COOKIE['language'] == 'CN')
                                        echo '主頁';
                                    else
                                        echo 'Home';
                                    ?></a>
                                <span>&rsaquo; </span></li>
                            <li style="color: white"><?php
                                $cat_name = $db_handle->runQuery("select * from product_type where product_type_id = '$id_product_type'");
                                echo $cat_name[0]['product_type'];
                                ?>
                            </li>
                        </ul>
                    </div>
                    <!--col-xs-12-->
                </div>
                <!--row-->
            </div>
            <!--container-->
        </div>
        
    </div>
    <!--breadcrumbs-->
    <!-- BEGIN Main Container col2-left -->
    <section class="main-container col2-left-layout bounceInUp animated">
        <!-- For version 1, 2, 3, 8 -->
        <!-- For version 1, 2, 3 -->
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-9 col-sm-push-3 product-grid">
                    <div class="pro-coloumn">
                        <?php include('include/inner_header.php'); ?>

                        <article>
                            <div class="category-products">
                                <?php
                                if (isset($_GET['color'])) {
                                    ?>
                                    <ul class="products-grid">
                                        <?php
                                        $color_id = $_GET['color'];
                                        $product_color = $db_handle->runQuery("SELECT * FROM product where product_type='$id_product_type' and product_color = '$color_id' LIMIT 9 OFFSET $offset");
                                        $no_product_color = $db_handle->numRows("SELECT * FROM product where product_type='$id_product_type' and product_color = '$color_id' LIMIT 9 OFFSET $offset");
                                        for ($k = 0; $k < $no_product_color; $k++) {
                                            $image = explode(',', $product_color[$k]['p_image']);
                                            ?>
                                            <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info"><a
                                                                href="Product-Details?id=<?php echo $product_color[$k]['id']; ?>"
                                                                title="Test Flower"
                                                                class="product-image"><img
                                                                    src="admin/<?php echo $image[0];?>"
                                                                    alt="Test Flower"></a>
                                                        </div>
                                                        <?php
                                                        if ($product_color[$k]['hot_product'] == '1') {
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
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title"><a
                                                                    href="Product-Details?id=<?php echo $product_color[$k]['id']; ?>"
                                                                    title="Test Flower"><?php if($_COOKIE['language'] === 'CN') echo $product_color[$k]['p_name']; else echo $product_color[$k]['p_name_en']; ?></a>
                                                            </div>
                                                            <div class="item-content">
                                                                <div class="item-price">
                                                                    <div class="price-box"><span
                                                                            class="regular-price"><span
                                                                                class="price"><?php echo $product_color[$k]['product_price']; ?></span> </span>
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
                                    <div class="toolbar bottom">
                                        <div class="display-product-option">
                                            <div class="pages">
                                                <label>Page:</label>
                                                <ul class="pagination">
                                                    <?php
                                                    // calculate the total number of pages
                                                    $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where product_type='$id_product_type' and product_color = '$color_id'");
                                                    $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product where product_type='$id_product_type' and product_color = '$color_id'");

                                                    $total_pages = ceil($new[0]['c'] / 9);
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        ?>
                                                        <li>
                                                            <a href="Product-Type?id=<?php echo $id_product_type; ?>&color=<?php echo $color_id; ?>&page=<?php echo $i; ?>"><?php echo $i ?></a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } elseif (isset($_GET['price'])) {
                                    if ($_GET['price'] == '1') {
                                        ?>
                                        <ul class="products-grid">
                                            <?php
                                            $product_price = $db_handle->runQuery("SELECT * FROM product where product_type='$id_product_type' and product_price < 100 LIMIT 9 OFFSET $offset");
                                            $no_product_price = $db_handle->numRows("SELECT * FROM product where product_type='$id_product_type' and product_price < 100 LIMIT 9 OFFSET $offset");
                                            for ($k = 0; $k < $no_product_price; $k++) {
                                                $image = explode(',', $product_price[$k]['p_image']);
                                                ?>
                                                <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                                    <div class="item-inner">
                                                        <div class="item-img">
                                                            <div class="item-img-info"><a
                                                                    href="Product-Details?id=<?php echo $product_price[$k]['id']; ?>"
                                                                    title="Test Flower"
                                                                    class="product-image"><img
                                                                        src="admin/<?php echo $image[0]; ?>"
                                                                        alt="Test Flower"></a>
                                                            </div>
                                                            <?php
                                                            if ($product_price[$k]['hot_product'] == '1') {
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
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title"><a
                                                                        href="Product-Details?id=<?php echo $product_price[$k]['id']; ?>"
                                                                        title="Test Flower"><?php if($_COOKIE['language'] === 'CN') echo $product_price[$k]['p_name']; else echo $product_price[$k]['p_name_en']; ?></a>
                                                                </div>
                                                                <div class="item-content">
                                                                    <div class="item-price">
                                                                        <div class="price-box"><span
                                                                                class="regular-price"><span
                                                                                    class="price"><?php echo $product_price[$k]['product_price']; ?></span> </span>
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
                                        <div class="toolbar bottom">
                                            <div class="display-product-option">
                                                <div class="pages">
                                                    <label>Page:</label>
                                                    <ul class="pagination">
                                                        <?php
                                                        // calculate the total number of pages
                                                        $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where product_type='$id_product_type' and product_price < '100'");
                                                        $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product where product_type='$id_product_type' and product_price < '100'");

                                                        $total_pages = ceil($new[0]['c'] / 9);
                                                        for ($i = 1; $i <= $total_pages; $i++) {
                                                            ?>
                                                            <li>
                                                                <a href="Product-Type?id=<?php echo $id_product_type; ?>&price=1&page=<?php echo $i; ?>"><?php echo $i ?></a>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } elseif ($_GET['price'] == '2') {
                                        ?>
                                        <ul class="products-grid">
                                            <?php
                                            $product_price = $db_handle->runQuery("SELECT * FROM product where product_type='$id_product_type' and product_price >= '100' LIMIT 9 OFFSET $offset");
                                            $no_product_price = $db_handle->numRows("SELECT * FROM product where product_type='$id_product_type' and product_price >= '100' LIMIT 9 OFFSET $offset");
                                            for ($k = 0; $k < $no_product_price; $k++) {
                                                $image = explode(',', $product_price[$k]['p_image']);
                                                ?>
                                                <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                                    <div class="item-inner">
                                                        <div class="item-img">
                                                            <div class="item-img-info"><a
                                                                    href="Product-Details?id=<?php echo $product_price[$k]['id']; ?>"
                                                                    title="Test Flower"
                                                                    class="product-image"><img
                                                                        src="admin/<?php echo $image[0]; ?>"
                                                                        alt="Test Flower"></a>
                                                            </div>
                                                            <?php
                                                            if ($product_price[$k]['hot_product'] == '1') {
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
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title"><a
                                                                        href="Product-Details?id=<?php echo $product_price[$k]['id']; ?>"
                                                                        title="Test Flower"><?php if($_COOKIE['language'] === 'CN') echo $product_price[$k]['p_name']; else echo $product_price[$k]['p_name_en']; ?></a>
                                                                </div>
                                                                <div class="item-content">
                                                                    <div class="item-price">
                                                                        <div class="price-box"><span
                                                                                class="regular-price"><span
                                                                                    class="price"><?php echo $product_price[$k]['product_price']; ?></span> </span>
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
                                        <div class="toolbar bottom">
                                            <div class="display-product-option">
                                                <div class="pages">
                                                    <label>Page:</label>
                                                    <ul class="pagination">
                                                        <?php
                                                        // calculate the total number of pages
                                                        $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where product_type='$id_product_type' and product_price >= '100'");
                                                        $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product where product_type='$id_product_type' and product_price >= '100'");

                                                        $total_pages = ceil($new[0]['c'] / 9);
                                                        for ($i = 1; $i <= $total_pages; $i++) {
                                                            ?>
                                                            <li>
                                                                <a href="Product-Type?id=<?php echo $id_product_type; ?>&price=1&page=<?php echo $i; ?>"><?php echo $i ?></a>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                } else {
                                    ?>
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
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title"><a
                                                                    href="Product-Details?id=<?php echo $fetch_product[$i]['id']; ?>"
                                                                    title="Test Flower"><?php if($_COOKIE['language'] === 'CN') echo $fetch_product[$i]['p_name']; else echo $fetch_product[$i]['p_name_en']; ?></a>
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
                                    <div class="toolbar bottom">
                                        <div class="display-product-option">
                                            <div class="pages">
                                                <label>Page:</label>
                                                <ul class="pagination">
                                                    <?php
                                                    // calculate the total number of pages
                                                    $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where product_type ='$id_product_type'");
                                                    $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product where product_type ='$id_product_type'");

                                                    $total_pages = ceil($new[0]['c'] / 9);
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        ?>
                                                        <li>
                                                            <a href="Product-Type?id=<?php echo $id_product_type ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </article>
                    </div>
                    <!--	///*///======    End article  ========= //*/// -->
                </div>
                <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
                    <!--side-nav-categories-->
                    <div class="block block-layered-nav">
                        <div class="block-title"> Shop By</div>
                        <div class="block-content">
                            <p class="block-subtitle">Shopping Options</p>
                            <dl id="narrow-by-list">
                                <dt class="odd">Price</dt>
                                <dd class="odd">
                                    <ol>
                                        <li><a href="Product-Type?id=<?php echo $id_product_type ?>&price=1"><span class="price">$0.00</span>
                                                - <span
                                                    class="price">$99.99</span></a>
                                        </li>
                                        <li><a href="Product-Type?id=<?php echo $id_product_type ?>&price=2"><span class="price">$100.00</span>
                                                <?php
                                                if($_COOKIE['language'] == 'CN')
                                                    echo '以上';
                                                else
                                                    echo ' and above';
                                                ?></a>
                                        </li>
                                    </ol>
                                </dd>
                                <dt class="odd"><?php
                                    if($_COOKIE['language'] == 'CN')
                                        echo '顏色';
                                    else
                                        echo 'Color';
                                    ?></dt>
                                <dd class="odd">
                                    <ol>
                                        <?php
                                        $color = $db_handle->runQuery("select * from flower_color");
                                        $no_color = $db_handle->numRows("select * from flower_color");
                                        for ($i = 0; $i < $no_color; $i++) {
                                            ?>
                                            <li>
                                                <a href="Product-Type?id=<?php echo $id_product_type?>&color=<?php echo $color[$i]['color_id']; ?>"><?php if($_COOKIE['language'] === 'CN') echo $color[$i]['color_cn']; else echo $color[$i]['color'];?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ol>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </aside>-->
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