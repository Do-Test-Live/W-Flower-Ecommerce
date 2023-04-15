<?php
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {

                $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE id ='" . $_GET["id"] . "'");
                $itemArray = array($productByCode[0]["id"] => array('name' => $productByCode[0]["p_name"], 'image' => $productByCode[0]["p_image"], 'id' => $productByCode[0]["id"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["product_price"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["id"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["id"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }

                echo "<script>
                document.cookie = 'alert = 10;';
                </script>";

            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["id"] == $v['id']){
                        unset($_SESSION["cart_item"][$k]);
                    }
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}

$total_quantity = 0;
$total_price = 0;
if (isset($_SESSION["cart_item"])) {
    foreach ($_SESSION["cart_item"] as $item) {
        $item_price = $item["quantity"] * $item["price"];
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"] * $item["quantity"]);
    }
}
?>
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
                                            <li><a href="#"> <img src="images/hong-kong.jpg" alt="French"> <span>Chinese</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                    <!--fl-language-->
                                    <!-- END For version 1,2,3,4,6 -->
                                    <!-- For version 1,2,3,4,6 -->
                                    <div>
                                        <ul class="currencies_list">
                                            <li><a href="#" title="EGP"> Language</a></li>
                                        </ul>
                                    </div>
                                    <!--fl-currency-->
                                    <!-- END For version 1,2,3,4,6 -->
                                </div>
                                <ul class="links">
                                    <?php
                                    if(isset($_SESSION['id'])){
                                        ?>
                                        <li><a href="Account" title="My Account">My Account</a></li>
                                        <li><a href="Cart" title="Cart">Cart</a></li>
                                        <li><a href="Logout">Logout</a></li>
                                        <?php
                                    }else{
                                        ?>
                                        <li class="last"><a href="#"><span>帳戶資料</span></a></li>
                                        <li class="last"><a href="Login"><span>登錄</span></a></li>
                                        <li class="last"><a href="#"><span>查看記錄</span></a></li>
                                        <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fl-cart-contain">
                        <div class="mini-cart">
                            <div class="basket"><a href="Cart"><span> <?php echo $total_quantity; ?> </span></a></div>
                            <!--fl-mini-cart-content-->
                        </div>
                    </div>
                    <!--mini-cart-->
                </div>
            </div>
        </div>
    </div>
</header>
