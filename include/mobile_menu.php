<div id="mobile-menu">
    <ul>
        <li>
            <div class="mm-search">
                <form id="search1" method="get" action="search.php" name="search">
                    <div class="input-group">

                        <input type="text" class="form-control simple" placeholder="Search ..." name="search"
                               id="searchInput">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <div id="searchResults"></div>
            </div>
        </li>
        <?php
        $cat = $db_handle->runQuery("SELECT * FROM `category`");
        $no_cat = $db_handle->numRows("SELECT * FROM `category`");
        for ($i = 0; $i < $no_cat; $i++) {
            $cat_id = $cat[$i]['id'];
            ?>
            <li><a href="Category?id=<?php echo $cat_id?>"><span><?php if($_COOKIE['language'] === 'CN') echo $cat[$i]['c_name']; else echo $cat[$i]['c_name_en']; ?></span></a>
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
                            <li><a href="Sub-Category?id=<?php echo $sub_cat_id?>"><span><?php if($_COOKIE['language'] === 'CN') echo $sub_cat[$j]['sub_cat_name']; else echo $sub_cat[$j]['sub_cat_name_en'];?></span></a>
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
                                                <a href="Product-Type?id=<?php echo $product_type_id?>"><span><?php if($_COOKIE['language'] === 'CN') echo $product_type[$k]['product_type']; else echo $product_type[$k]['product_type']; ?></span></a>
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
                <li><a href="Account" title="My Account"><?php
                        if($_COOKIE['language'] == 'CN')
                            echo '我的賬戶';
                        else
                            echo 'My Account';
                        ?></a></li>
                <li><a href="Cart" title="Cart"><?php
                        if($_COOKIE['language'] == 'CN')
                            echo '查看';
                        else
                            echo 'Checkout';
                        ?></a></li>
                <li><a href="Logout" title="Logout"><?php
                        if($_COOKIE['language'] == 'CN')
                            echo '登出';
                        else
                            echo 'Logout';
                        ?></a></li>
                <?php
            }else{
                ?>
                <li class="last"><a href="Login" title="Login"><span><?php
                            if($_COOKIE['language'] == 'CN')
                                echo '登錄';
                            else
                                echo 'Login';
                            ?></span></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
