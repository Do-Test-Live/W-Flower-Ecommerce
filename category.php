<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
$category = $_GET['cat_id'];
$fetch_product = $db_handle->runQuery("select * from product where category_id = '$category'");
$no_fetch_product = $db_handle->numRows("select * from product where category_id = '$category'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Four Seasons Florist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Four Seasons Florist">
    <meta name="keywords" content="flower, store, E-commerce">
    <meta name="robots" content="*">

    <link rel="icon" href="#" type="image/x-icon">
    <link rel="shortcut icon" href="#" type="image/x-icon">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="stylesheet/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/font-awesome.css" media="all">
    <link rel="stylesheet" type="text/css" href="stylesheet/revslider.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/jquery.mobile-menu.css">
    <link rel="stylesheet" type="text/css" href="stylesheet/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="stylesheet/responsive.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600,800,400' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i,900" rel="stylesheet">
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
                            <li class="home"><a href="index.php" title="Go to Home Page">Home</a>
                                <span>&rsaquo; </span></li>
                            <li style="color: white"><?php
                                $cat_name = $db_handle->runQuery("select * from category where id = '$category'");
                                echo $cat_name[0]['c_name'];
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
            <h2>Flowers</h2>
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
                        <div class="category-description std">
                            <div class="slider-items-products">
                                <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                                        <!-- Item -->
                                        <div class="item"><a href="#"><img alt="" src="images/bannerimage/img2.png"></a>
                                            <div class="cat-img-title cat-bg cat-box">
                                                <div class="small-tag">Season 2018</div>
                                                <h2 class="cat-heading">Organic <span>World</span></h2>
                                                <p>GET 40% OFF &sdot; Free Delivery </p>
                                            </div>
                                        </div>
                                        <!-- End Item -->

                                        <!-- Item -->
                                        <div class="item"><a href="#"><img alt="" src="images/bannerimage/img2.png"></a>
                                            <div class="cat-img-title cat-bg cat-box">
                                                <div class="small-tag">Green World</div>
                                                <h2 class="cat-heading">Vegetable <span>sale</span></h2>
                                                <p>Save 70% on all items</p>
                                            </div>
                                            <!-- End Item -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <article>
                            <div class="category-products">
                                <ul class="products-grid">
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/1.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/2.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/3.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/4.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/5.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/6.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/7.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/8.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info"><a href="product-detail.html"
                                                                              title="Test Flower"
                                                                              class="product-image"><img
                                                        src="images/flower/9.jpg"
                                                        alt="Test Flower"></a>
                                                </div>
                                                <div class="add_cart">
                                                    <button class="button btn-cart" type="button">
                                                        <span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title"><a href="product-detail.html"
                                                                               title="Test Flower">Test Flower</a></div>
                                                    <div class="item-content">
                                                        <div class="item-price">
                                                            <div class="price-box"><span class="regular-price"><span
                                                                    class="price">$125.00</span> </span></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <div class="toolbar bottom">
                                <div class="display-product-option">
                                    <div class="pages">
                                        <label>Page:</label>
                                        <ul class="pagination">
                                            <li><a href="#">«</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">»</a></li>
                                        </ul>
                                    </div>
                                </div>
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
                                        <li><a href="#"><span class="price">$0.00</span> - <span
                                                class="price">$99.99</span></a> (6)
                                        </li>
                                        <li><a href="#"><span class="price">$100.00</span> and above</a> (6)</li>
                                    </ol>
                                </dd>
                                <dt class="odd">Color</dt>
                                <dd class="odd">
                                    <ol>
                                        <li><a href="#">Green</a> (1)</li>
                                        <li><a href="#">White</a> (5)</li>
                                        <li><a href="#">Black</a> (5)</li>
                                        <li><a href="#">Gray</a> (4)</li>
                                        <li><a href="#">Dark Gray</a> (3)</li>
                                    </ol>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="custom-slider">
                        <div>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active"><img src="images/flower/1.jpg" alt="slide3">
                                        <div class="carousel-caption">
                                            <h4>Fruit Shop</h4>
                                            <h3><a title=" Sample Product" href="product-detail.html">Up to 70% Off</a>
                                            </h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <a class="link" href="#">Buy Now</a></div>
                                    </div>
                                    <div class="item"><img src="images/flower/2.jpg" alt="slide1">
                                        <div class="carousel-caption">
                                            <h4>Black Grapes</h4>
                                            <h3><a title=" Sample Product" href="product-detail.html">Mega Sale</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <a class="link" href="#">Buy Now</a>
                                        </div>
                                    </div>
                                    <div class="item"><img src="images/flower/3.jpg" alt="slide2">
                                        <div class="carousel-caption">
                                            <h4>Food Farm</h4>
                                            <h3><a title=" Sample Product" href="product-detail.html">Up to 50% Off</a>
                                            </h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <a class="link" href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--block block-list block-compare-->
                </aside>
                <!--col-right sidebar-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--main-container col2-left-layout-->

    <div class="container">
        <div class="row our-features-box">
            <ul>
                <li>
                    <div class="feature-box">
                        <div class="icon-truck"></div>
                        <div class="content">FREE SHIPPING on order over $99</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-support"></div>
                        <div class="content">Have a question?<br>
                            +000 0000 0000
                        </div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-money"></div>
                        <div class="content">100% Money Back Guarantee</div>
                    </div>
                </li>
                <li>
                    <div class="feature-box">
                        <div class="icon-return"></div>
                        <div class="content">30 days return Service</div>
                    </div>
                </li>
                <li class="last">
                    <div class="feature-box"><a href="#"><i class="fa fa-apple"></i> download</a> <a href="#"><i
                            class="fa fa-android"></i> download</a></div>
                </li>
            </ul>
        </div>
    </div>

    <!-- For version 1,2,3,4,6 -->
    <footer>
        <!-- BEGIN INFORMATIVE FOOTER -->
        <div class="footer-inner">
            <div class="newsletter-row">
                <div class="container">
                    <div class="row">
                        <!-- Footer Newsletter -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col1">
                            <div class="newsletter-wrap">
                                <h5>Newsletter</h5>
                                <h4 style="color: white">Get discount 30% off</h4>
                                <form action="#" method="post" id="newsletter-validate-detail1">
                                    <div id="container_form_news">
                                        <div id="container_form_news2">
                                            <input type="text" name="email" id="newsletter1"
                                                   title="Sign up for our newsletter"
                                                   class="input-text required-entry validate-email"
                                                   placeholder="Enter your email address">
                                            <button type="submit" title="Subscribe" class="button subscribe">
                                                <span>Subscribe</span></button>
                                        </div>
                                        <!--container_form_news2-->
                                    </div>
                                    <!--container_form_news-->
                                </form>
                            </div>
                            <!--newsletter-wrap-->
                        </div>
                    </div>
                </div>
                <!--footer-column-last-->
            </div>
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-6">
                            <div class="footer-column">
                                <h4 style="color: white">Menu</h4>
                                <ul class="links">
                                    <li><a href="#" title="How to buy">Home</a></li>
                                    <li><a href="#" title="FAQs">Shops</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-column">
                                <h4 style="color: white">Contact Us</h4>
                                <div class="contacts-info">
                                    <div class="phone-footer"><i class="phone-icon"></i>+ 000 0000 0000</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--container-->
        </div>
        <!--footer-inner-->

        <!--footer-middle-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="social">
                            <ul>
                                <li class="fb"><a href="#"></a></li>
                                <li class="tw"><a href="#"></a></li>
                                <li class="googleplus"><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12 coppyright"> © 2023 Four Seasons Florist. All Rights Reserved.</div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="payment-accept"><img src="images/payment-1.png" alt=""> <img src="images/payment-2.png"
                                                                                                 alt=""> <img
                                src="images/payment-3.png" alt=""> <img src="images/payment-4.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-bottom-->
        <!-- BEGIN SIMPLE FOOTER -->
    </footer>

    <!-- End For version 1,2,3,4,6 -->

</div>
<!--page-->
<!-- Mobile Menu-->
<div id="mobile-menu">
    <ul>
        <li>
            <div class="mm-search">
                <form id="search1" name="search">
                    <div class="input-group">

                        <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!--<li><a href="#">valentine's day flower</a>
            <ul>
                <li><a href="#">valentine bouquet</a></li>
                <li> <a href="#">valentine's day gift</a></li>
            </ul>
        </li>-->
        <li><a href="category.html">bouquet</a>
            <ul>
                <li><a href="category.html">bouquet of flowers</a>
                    <ul>
                        <li> <a href="category.html">Rose</a> </li>
                        <li> <a href="category.html">hydrangea</a> </li>
                        <li> <a href="category.html">sunflower</a> </li>
                        <li> <a href="category.html">starry sky</a> </li>
                        <li> <a href="category.html">tulip</a> </li>
                        <li> <a href="category.html">carnation</a> </li>
                        <li> <a href="category.html">calla lily</a> </li>
                    </ul>
                </li>
                <li> <a href="category.html">immortal bouquet</a>
                    <ul>
                        <li> <a href="category.html">standard</a> </li>
                        <li> <a href="category.html">mini</a> </li>
                        <li> <a href="category.html">single bouquet</a> </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="category.html">rose bear</a>
            <ul>
                <li> <a href="category.html">standard</a>
                </li>
                <li> <a href="category.html">mini</a>
                </li>
                <li> <a href="category.html">giant</a>
                </li>
            </ul>
        </li>
        <li><a href="category.html">Flowers</a>
            <ul>
                <li> <a href="category.html">bouquet of flowers</a>
                    <ul>
                        <li> <a href="category.html">Rose</a> </li>
                        <li> <a href="category.html">hydrangea</a> </li>
                        <li> <a href="category.html">sunflower</a> </li>
                        <li> <a href="category.html">starry sky</a> </li>
                        <li> <a href="category.html">tulip</a> </li>
                        <li> <a href="category.html">carnation</a> </li>
                        <li> <a href="category.html">calla lily</a> </li>
                    </ul>
                </li>
                <li> <a href="category.html">flower box</a>
                </li>
                <li> <a href="category.html">table flower</a>
                </li>

                <li> <a href="category.html">bottle flower</a>
                </li>
            </ul>
        </li>
        <li><a href="category.html">preserved flower</a>
            <ul>
                <li> <a href="category.html">Glass Cover</a>
                </li>
                <li> <a href="category.html">immortal bouquet</a>
                    <ul>
                        <li> <a href="category.html">standard</a> </li>
                        <li> <a href="category.html">mini</a> </li>
                        <li> <a href="category.html">single bouquet</a> </li>
                    </ul>
                </li>
                <li> <a href="category.html">Preserved Flower × Bluetooth Speaker</a>
                </li>

                <li> <a href="category.html">fantasy series</a>
                </li>
                <li> <a href="category.html">flower box</a>
                </li>
            </ul>
        </li>
        <li><a href="category.html">orchid</a></li>
        <li><a href="category.html">flower box</a></li>
    </ul>
    <div class="top-links">
        <ul class="links">
            <li><a title="My Account" href="account.html">My Account</a> </li>
            <li><a title="Checkout" href="checkout.html">Checkout</a> </li>
            <li class="last"><a title="Login" href="login.html">Login</a> </li>
        </ul>
    </div>
</div>
<!-- JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/common.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.mobile-menu.min.js"></script>


<script>
    function change_image(){
        document.getElementById('menu_icon').style.display = 'none';
        document.getElementById('menu_icon_cross').style.display = 'block';
    }

    function change_image_rep (){
        document.getElementById('menu_icon').style.display = 'block';
        document.getElementById('menu_icon_cross').style.display = 'none';
    }
</script>


</body>

</html>