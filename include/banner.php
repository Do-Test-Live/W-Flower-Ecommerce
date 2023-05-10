<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
    <?php
    $banner = $db_handle->runQuery("SELECT * FROM `banner` limit 3;");
    $no_banner = $db_handle->numRows("SELECT * FROM `banner` limit 3;");
    for($l=0; $l < $no_banner; $l++){
        ?>
            <div class="item <?php if ($l == 0) echo 'active'?>">
                <img src="admin/<?php echo $banner[$l]['banner_img'];?>" alt="Four Season Flower">
            </div>

        <?php
    }
    ?>
        </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only"><?php
            if($_COOKIE['language'] == 'CN')
                echo '以前的';
            else
                echo 'Previous';
            ?></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only"><?php
            if($_COOKIE['language'] == 'CN')
                echo '下一個';
            else
                echo 'Next';
            ?></span>
    </a>
</div>