<header>
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="header-banner">
                        <div class="assetBlock">
                            <div id="slideshow">
                                <p>Special Offers! - Get <span>50%</span> off on vegetables </p>
                                <p>sale <span>40%</span> of on bulk shopping! </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="header-container row">
                <div class="logo"><a href="Home" title="index">
                        <div><img src="images/logo.png" alt="logo"></div>
                    </a></div>
                <div class="fl-nav-menu">
                    <nav>
                        <div class="mm-toggle-wrap">
                            <div class="mm-toggle">
                                <i class="icon-align-justify" id="menu_icon" onclick="change_image();"></i>
                                <i class="icon-align-cross" id="menu_icon_cross" style="display: none;" onclick="change_image_rep();"></i>
                                <span
                                    class="mm-label">Menu</span></div>
                        </div>
                        <div class="nav-inner">
                            <!-- BEGIN NAV -->
                            <ul id="nav" class="hidden-xs">
                                <?php
                                $cat = $db_handle->runQuery("SELECT * FROM `category`");
                                $no_cat = $db_handle->numRows("SELECT * FROM `category`");
                                for($i = 0; $i<$no_cat; $i++){
                                    $cat_id = $cat[$i]['id'];
                                    ?>
                                    <li class="mega-menu"><a class="level-top" href="Category?id=<?php echo $cat_id?>"><span><?php echo $cat[$i]['c_name'];?></span></a>
                                        <?php
                                        $sub_cat = $db_handle->runQuery("SELECT * FROM `sub_category` where cat_id = '$cat_id'");
                                        $no_sub_cat = $db_handle->numRows("SELECT * FROM `sub_category` where cat_id = '$cat_id'");
                                        if($no_sub_cat > 0){
                                            ?>
                                            <div class="level0-wrapper dropdown-6col">
                                                <div class="container">
                                                    <div class="level0-wrapper2">
                                                        <div class="col-1">
                                                            <div class="nav-block nav-block-center">
                                                                <!--mega menu-->
                                                                <ul class="level0">
                                                                    <?php
                                                                    for($j = 0; $j<$no_sub_cat; $j++){
                                                                        $sub_cat_id = $sub_cat[$j]['sub_cat_id'];
                                                                        ?>
                                                                        <li class="level3 nav-6-1 parent item"><a
                                                                                href="Sub-Category?id=<?php echo $sub_cat_id?>"><span><?php echo $sub_cat[$j]['sub_cat_name'];?></span></a>
                                                                            <!--sub sub category-->
                                                                            <?php
                                                                            $product_type = $db_handle->runQuery("SELECT * FROM `product_type` WHERE cat_id = '$cat_id' AND sub_cat_id = '$sub_cat_id'");
                                                                            $no_product_type = $db_handle->numRows("SELECT * FROM `product_type` WHERE cat_id = '$cat_id' AND sub_cat_id = '$sub_cat_id'");
                                                                            if($no_product_type > 0){
                                                                                for($k = 0; $k<$no_product_type; $k++){
                                                                                    $product_type_id = $product_type[$k]['product_type_id'];
                                                                                ?>
                                                                                <ul class="level1">
                                                                                    <li class="level2 nav-6-1-1"><a
                                                                                            href="Product-Type?id=<?php echo $product_type_id?>"><span><?php echo $product_type[$k]['product_type'];?></span></a>
                                                                                    </li>
                                                                                </ul>
                                                                                <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <!--sub sub category-->
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul>
                                                                <!--level0-->
                                                            </div>
                                                            <!--nav-block nav-block-center-->
                                                        </div>
                                                        <!--col-1-->
                                                        <div class="col-2">
                                                            <div class="menu_image"><a title="" href="category.html"><img
                                                                        alt="menu_image" src="admin/<?php echo $cat[$i]['image'];?>"></a></div>
                                                        </div>
                                                        <!--col-2-->
                                                    </div>
                                                    <!--level0-wrapper2-->
                                                </div>
                                                <!--container-->
                                            </div>
                                            <?php

                                        }
                                        ?>
                                        <!--level0-wrapper dropdown-6col-->
                                        <!--mega menu-->
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <!--nav-->
                        </div>
                    </nav>
                </div>

                <!--row-->

                <div class="fl-header-right">
                    <div class="fl-links">
                        <div class="no-js"><a title="Company" class="clicker"></a>
                            <div class="fl-nav-links">
                                <div class="language-currency">
                                    <div class="fl-language">
                                        <ul class="lang">
                                            <li><a href="#"> <img src="images/english.png" alt="English"> <span>English</span>
                                                </a></li>
                                            <li><a href="#"> <img src="images/francais.png" alt="French"> <span>French</span>
                                                </a></li>
                                            <li><a href="#"> <img src="images/german.png" alt="German">
                                                    <span>German</span> </a></li>
                                        </ul>
                                    </div>
                                    <!--fl-language-->
                                    <!-- END For version 1,2,3,4,6 -->
                                    <!-- For version 1,2,3,4,6 -->
                                    <div class="fl-currency">
                                        <ul class="currencies_list">
                                            <li><a href="#" title="EGP"> £</a></li>
                                            <li><a href="#" title="EUR"> €</a></li>
                                            <li><a href="#" title="USD"> $</a></li>
                                        </ul>
                                    </div>
                                    <!--fl-currency-->
                                    <!-- END For version 1,2,3,4,6 -->
                                </div>
                                <ul class="links">
                                    <li><a href="account.html" title="My Account">My Account</a></li>
                                    <li><a href="checkout.html" title="Checkout">Checkout</a></li>
                                    <li class="last"><a href="login.html" title="Login"><span>Login</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fl-cart-contain">
                        <div class="mini-cart">
                            <div class="basket"><a href="category.html"><span> 2 </span></a></div>
                            <!--fl-mini-cart-content-->
                        </div>
                    </div>
                    <!--mini-cart-->
                </div>
            </div>
        </div>
    </div>
</header>
