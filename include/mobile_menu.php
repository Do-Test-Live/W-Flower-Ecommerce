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
        <?php
        $cat = $db_handle->runQuery("SELECT * FROM `category`");
        $no_cat = $db_handle->numRows("SELECT * FROM `category`");
        for ($i = 0; $i < $no_cat; $i++) {
            $cat_id = $cat[$i]['id'];
            ?>
            <li><a href="Category?id=<?php echo $cat_id?>"><span><?php echo $cat[$i]['c_name']; ?></span></a>
                <?php
                $sub_cat = $db_handle->runQuery("SELECT * FROM `sub_category` where cat_id = '$cat_id'");
                $no_sub_cat = $db_handle->numRows("SELECT * FROM `sub_category` where cat_id = '$cat_id'");
                if ($no_sub_cat > 0) {
                    ?>
                    <!--mega menu-->
                    <ul>
                        <?php
                        for ($j = 0; $j < $no_sub_cat; $j++) {
                            $sub_cat_id = $sub_cat[$j]['sub_cat_id'];
                            ?>
                            <li><a href="Sub-Category?id=<?php echo $sub_cat_id?>"><span><?php echo $sub_cat[$j]['sub_cat_name']; ?></span></a>
                                <!--sub sub category-->
                                <?php
                                $product_type = $db_handle->runQuery("SELECT * FROM `product_type` WHERE cat_id = '$cat_id' AND sub_cat_id = '$sub_cat_id'");
                                $no_product_type = $db_handle->numRows("SELECT * FROM `product_type` WHERE cat_id = '$cat_id' AND sub_cat_id = '$sub_cat_id'");
                                if ($no_product_type > 0) {
                                    for ($k = 0; $k < $no_product_type; $k++) {
                                        $product_type_id = $product_type[$k]['product_type_id'];
                                        ?>
                                        <ul>
                                            <li>
                                                <a href="Product-Type?id=<?php echo $product_type_id?>"><span><?php echo $product_type[$k]['product_type']; ?></span></a>
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
    <div class="top-links">
        <ul class="links">
            <?php
            if(isset($_SESSION['id'])){
                ?>
                <li><a href="Account" title="My Account">My Account</a></li>
                <li><a href="Checkout" title="Checkout">Checkout</a></li>
                <li><a href="logout.php" title="Checkout">Logout</a></li>
                <?php
            }else{
                ?>
                <li class="last"><a href="Login" title="Login"><span>Login</span></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>