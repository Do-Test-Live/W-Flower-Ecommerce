<div class="top-cate">
    <div class="featured-pro container">
        <div class="row">
            <div class="slider-items-products">
                <div id="top-categories" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col3 products-grid">
                        <?php
                        $sub_cat_slider = $db_handle->runQuery("select * from sub_category");
                        $no_sub_cat_slider = $db_handle->numRows("select * from sub_category");
                        for($m=0;$m<$no_sub_cat_slider;$m++){
                            ?>
                            <div class="item">
                                <a href="sub_category.php">
                                    <div class="pro-img"><img src="admin/<?php echo $sub_cat_slider[$m]['sub_cat_image'];?>"
                                                              alt="Fresh Organic Mustard Leaves ">
                                        <div class="pro-info"><?php echo $sub_cat_slider[$m]['sub_cat_name'];?></div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>