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
                            $sub_cat_id = $sub_cat_slider[$m]['sub_cat_id'];
                            ?>
                            <div class="item">
                                <a href="Sub-Category?id=<?php echo $sub_cat_id?>">
                                    <div class="pro-img"><img src="admin/<?php echo $sub_cat_slider[$m]['sub_cat_image'];?>"
                                                              alt="Fresh Organic Mustard Leaves ">
                                        <div class="pro-info"><?php if($_COOKIE['language'] === 'CN') echo $sub_cat_slider[$m]['sub_cat_name']; else echo $sub_cat_slider[$m]['sub_cat_name_en'];?></div>
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