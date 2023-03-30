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
                    <h2>Hot Deals</h2>
                    <h4>Hot Deals for You</h4>
                </div>
                <div id="best-seller" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid owl-carousel">
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/1.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/2.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/3.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/4.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/5.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/6.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/7.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/8.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/9.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/10.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#" data-scroll-goto="1"> <img
                                    src="images/ads/1.png" alt="promotion-banner1"> </a></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="#" data-scroll-goto="2"> <img
                                    src="images/ads/2.png" alt="promotion-banner2"> </a></div>
                </div>
            </div>
        </div>

        <!-- best Pro Slider -->
        <section class=" wow bounceInUp animated">
            <div class="best-pro slider-items-products container">
                <div class="new_title">
                    <h2>Best Seller</h2>
                    <h4>So you get to know me better</h4>
                </div>
                <div id="best-seller" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/11.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/12.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/13.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/14.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/15.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/16.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/17.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/18.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/19.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info"><a href="product-detail.html"
                                                                  title="Fresh Organic Mustard Leaves "
                                                                  class="product-image"><img
                                                    src="images/flower/20.jpg" alt="Fresh Organic Mustard Leaves"></a>
                                        <div class="new-label new-top-left">Hot</div>
                                        <div class="sale-label sale-top-left">-15%</div>
                                    </div>
                                    <div class="add_cart">
                                        <button class="button btn-cart" type="button"><span>Add to Cart</span></button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"><a href="product-detail.html"
                                                                   title="Fresh Organic Mustard Leaves ">Test
                                                Flowers </a></div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"><span class="regular-price"><span class="price">125.00 HKD</span> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- Logo Brand Block -->
</div>


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


</div>
<!--page-->
<!-- Mobile Menu-->
<div id="mobile-menu">
    <ul>
        <li>
            <div class="mm-search">
                <form id="search1" name="search">
                    <div class="input-group">

                        <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term"
                               id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
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
                        <li><a href="category.html">Rose</a></li>
                        <li><a href="category.html">hydrangea</a></li>
                        <li><a href="category.html">sunflower</a></li>
                        <li><a href="category.html">starry sky</a></li>
                        <li><a href="category.html">tulip</a></li>
                        <li><a href="category.html">carnation</a></li>
                        <li><a href="category.html">calla lily</a></li>
                    </ul>
                </li>
                <li><a href="category.html">immortal bouquet</a>
                    <ul>
                        <li><a href="category.html">standard</a></li>
                        <li><a href="category.html">mini</a></li>
                        <li><a href="category.html">single bouquet</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="category.html">rose bear</a>
            <ul>
                <li><a href="category.html">standard</a>
                </li>
                <li><a href="category.html">mini</a>
                </li>
                <li><a href="category.html">giant</a>
                </li>
            </ul>
        </li>
        <li><a href="category.html">Flowers</a>
            <ul>
                <li><a href="category.html">bouquet of flowers</a>
                    <ul>
                        <li><a href="category.html">Rose</a></li>
                        <li><a href="category.html">hydrangea</a></li>
                        <li><a href="category.html">sunflower</a></li>
                        <li><a href="category.html">starry sky</a></li>
                        <li><a href="category.html">tulip</a></li>
                        <li><a href="category.html">carnation</a></li>
                        <li><a href="category.html">calla lily</a></li>
                    </ul>
                </li>
                <li><a href="category.html">flower box</a>
                </li>
                <li><a href="category.html">table flower</a>
                </li>

                <li><a href="category.html">bottle flower</a>
                </li>
            </ul>
        </li>
        <li><a href="category.html">preserved flower</a>
            <ul>
                <li><a href="category.html">Glass Cover</a>
                </li>
                <li><a href="category.html">immortal bouquet</a>
                    <ul>
                        <li><a href="category.html">standard</a></li>
                        <li><a href="category.html">mini</a></li>
                        <li><a href="category.html">single bouquet</a></li>
                    </ul>
                </li>
                <li><a href="category.html">Preserved Flower × Bluetooth Speaker</a>
                </li>

                <li><a href="category.html">fantasy series</a>
                </li>
                <li><a href="category.html">flower box</a>
                </li>
            </ul>
        </li>
        <li><a href="category.html">orchid</a></li>
        <li><a href="category.html">flower box</a></li>
    </ul>
    <div class="top-links">
        <ul class="links">
            <li><a title="My Account" href="account.html">My Account</a></li>
            <li><a title="Checkout" href="checkout.html">Checkout</a></li>
            <li class="last"><a title="Login" href="login.html">Login</a></li>
        </ul>
    </div>
</div>

<!-- JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/revslider.js"></script>
<script src="js/common.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.mobile-menu.min.js"></script>
<script src="js/countdown.js"></script>

<script>
    jQuery(document).ready(function () {
        jQuery('#thm-rev-slider').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 0,
            startheight: 750,

            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,

            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'on',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'spinner0',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'on',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'on',
            forceFullWidth: 'off',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>
<script>
    function HideMe() {
        jQuery('.popup1').hide();
        jQuery('#fade').hide();
    }
</script>
<!-- Hot Deals Timer 1-->

<script>
    function change_image() {
        document.getElementById('menu_icon').style.display = 'none';
        document.getElementById('menu_icon_cross').style.display = 'block';
    }

    function change_image_rep() {
        document.getElementById('menu_icon').style.display = 'block';
        document.getElementById('menu_icon_cross').style.display = 'none';
    }
</script>

</body>

</html>
