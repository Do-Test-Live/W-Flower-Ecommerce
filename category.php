<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
$category = $_GET['id'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
// calculate the offset for the SQL query
$offset = ($current_page - 1) * 9;
$fetch_product = $db_handle->runQuery("SELECT * FROM product where category_id='$category' LIMIT 9 OFFSET $offset");
$no_fetch_product = $db_handle->numRows("SELECT * FROM product where category_id='$category' LIMIT 9 OFFSET $offset");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Category - Four Seasons Florist</title>
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
                            <li class="home"><a href="index.php" title="Go to Home Page"><?php
                                    if ($_COOKIE['language'] == 'CN'){
                                        echo '主頁';
                                    } else
                                        echo ' Home Page';
                                    ?></a>
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
                                        $product_color = $db_handle->runQuery("SELECT * FROM product where category_id='$category' and product_color = '$color_id' LIMIT 9 OFFSET $offset");
                                        $no_product_color = $db_handle->numRows("SELECT * FROM product where category_id='$category' and product_color = '$color_id' LIMIT 9 OFFSET $offset");
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
                                                                        src="admin/<?php echo $image[0]; ?>"
                                                                        alt="Test Flower"></a>
                                                        </div>
                                                        <?php
                                                        if ($product_color[$k]['hot_product'] == '1') {
                                                            ?>
                                                            <div class="new-label new-top-left">Hot</div>
                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title"><a
                                                                        href="Product-Details?id=<?php echo $product_color[$k]['id']; ?>"
                                                                        title="Test Flower"><?php if ($_COOKIE['language'] === 'CN') echo $product_color[$k]['p_name']; else echo $product_color[$k]['p_name_en']; ?></a>
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
                                                <ul class="pagination">
                                                    <?php
                                                    // calculate the total number of pages
                                                    $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where category_id='$category' and product_color = '$color_id'");
                                                    $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product where category_id='$category' and product_color = '$color_id'");

                                                    $total_pages = ceil($new[0]['c'] / 9);
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        ?>
                                                        <li>
                                                            <a href="Category?id=<?php echo $category; ?>&color=<?php echo $color_id; ?>&page=<?php echo $i; ?>"><?php echo $i ?></a>
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
                                            $product_price = $db_handle->runQuery("SELECT * FROM product where category_id='$category' and product_price < 100 LIMIT 9 OFFSET $offset");
                                            $no_product_price = $db_handle->numRows("SELECT * FROM product where category_id='$category' and product_price < 100 LIMIT 9 OFFSET $offset");
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
                                                                <div class="new-label new-top-left">Hot</div>
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title"><a
                                                                            href="Product-Details?id=<?php echo $product_price[$k]['id']; ?>"
                                                                            title="Test Flower"><?php if ($_COOKIE['language'] === 'CN') echo $product_price[$k]['p_name']; else echo $product_price[$k]['p_name_en']; ?></a>
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
                                                    <ul class="pagination">
                                                        <?php
                                                        // calculate the total number of pages
                                                        $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where category_id='$category' and product_price < '100'");
                                                        $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product where category_id='$category' and product_price < '100'");

                                                        $total_pages = ceil($new[0]['c'] / 9);
                                                        for ($i = 1; $i <= $total_pages; $i++) {
                                                            ?>
                                                            <li>
                                                                <a href="Category?id=<?php echo $category; ?>&price=1&page=<?php echo $i; ?>"><?php echo $i ?></a>
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
                                            $product_price = $db_handle->runQuery("SELECT * FROM product where category_id='$category' and product_price >= '100' LIMIT 9 OFFSET $offset");
                                            $no_product_price = $db_handle->numRows("SELECT * FROM product where category_id='$category' and product_price >= '100' LIMIT 9 OFFSET $offset");
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
                                                                <div class="new-label new-top-left">Hot</div>
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title"><a
                                                                            href="Product-Details?id=<?php echo $product_price[$k]['id']; ?>"
                                                                            title="Test Flower"><?php if ($_COOKIE['language'] === 'CN') echo $product_price[$k]['p_name']; else echo $product_price[$k]['p_name_en']; ?></a>
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
                                                    <ul class="pagination">
                                                        <?php
                                                        // calculate the total number of pages
                                                        $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where category_id='$category' and product_price >= '100'");
                                                        $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product where category_id='$category' and product_price >= '100'");

                                                        $total_pages = ceil($new[0]['c'] / 9);
                                                        for ($i = 1; $i <= $total_pages; $i++) {
                                                            ?>
                                                            <li>
                                                                <a href="Category?id=<?php echo $category; ?>&price=1&page=<?php echo $i; ?>"><?php echo $i ?></a>
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
                                                            <div class="new-label new-top-left">Hot</div>
                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title"><a
                                                                        href="Product-Details?id=<?php echo $fetch_product[$i]['id']; ?>"
                                                                        title="Test Flower"><?php if ($_COOKIE['language'] === 'CN') echo $fetch_product[$i]['p_name']; else echo $fetch_product[$i]['p_name_en']; ?></a>
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
                                                <ul class="pagination">
                                                    <?php
                                                    // calculate the total number of pages
                                                    $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where category_id='$category'");
                                                    $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product where category_id='$category'");

                                                    $total_pages = ceil($new[0]['c'] / 9);
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        ?>
                                                        <li>
                                                            <a href="Category?id=<?php echo $category ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
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


                                <?php if ($_GET['id'] == 16) { ?>
                                        <div style="padding-left: 2rem;padding-right: 2rem">
                                            <h1 style="margin-bottom: 25px;"> 如何選擇合適花束 / 花材</h1>

                                            <p>
                                                人們對鮮花的愛好和熱忱歷史悠遠，鮮花也是現代社會，其中一個重要的儀式媒介，亦是個人品味和生活格調的體現。<br/>
                                                不同的花種，在各個環境和地區也對應著不同的代表性和意義。例如表現在象徵國家的鮮花，象徵愛情的玫瑰花，象徵宗教的蓮花和白百合。<br/><br/>
                                                四季花會在以下內容中，簡單地介紹一下香港本地的鮮花文化，方便各位更明快準確地選擇出適當的鮮花作儀式媒介，避免製造出一些啞然笑又讓人難忘的尷尬場面。<br/><br/>

                                                <b>(例：甜心，你是想提早去拜山了嗎？我有記錯今天應該是情人節嗎？)</b><br/>
                                                <b>(例：媽，我今天的是畢業禮，不過同學覺得我拿著這個花是要結婚了)</b><br/>
                                                    <b>(例：好姊妹謝謝你來探病，這花好漂亮，跟我在家供奉祖先的一樣耀眼)</b><br/><br/>

                                                <b>***香港的鮮花文化並不反映世界其他地方的
                                                文化，文章以香港的文化為主***</b><br/>
                                                <b>***以下所列內容僅供參考***</b><br/>
                                            </p>

                                            <h1 style="margin-bottom: 25px;margin-top:25px;">愛情 / 求婚 / 示愛</h1>

                                            <p>
                                                <b>玫瑰花 / 月季花</b><br/>

                                                <b>繡球花</b><br/>

                                                    <b>桔梗花</b><br/>

                                                        <b>繡球</b><br/>

                                                            <b>鬱金香</b><br/>

                                                本地代表愛情的花材沒有太多的限制
                                                不建議：黃色小地菊，各類賀年花，竹，松柏類的灌木植物
                                            </p>

                                            <h1 style="margin-bottom: 25px;margin-top:25px;">慶生 / 祝賀 / 母親節 等…</h1>

                                            <p>
                                                <b>康乃馨</b><br/>

                                                <b>百合 / 香水百合 / 水仙百合</b><br/>

                                                    <b>向日葵 / 太陽花</b><br/>

                                                        <b>牡丹 / 勺藥</b><br/>

                                                除了萬能的玫瑰花，康乃馨也是很普及的送禮佳品
                                                不建議：整體過於素色的花材，及各類多肉有刺值物<br/>

                                            </p>

                                            <h1 style="margin-bottom: 25px;margin-top:25px;">畢業禮 / 升職 / 接風洗塵 / 台上獻花或頒獎儀式…</h1>

                                            <p>
                                                <b>向日葵 / 太陽花</b><br/>

                                                <b>繡球</b><br/>

                                                <b>百合</b><br/>

                                                    <b>染菊</b><br/>

                                                        <b>桔梗 / 玫瑰</b><br/>

                                                            <b>蘭花</b><br/>

                                                                <b>適合大部分類型的花材
                                                不建議：過於雜亂的顏色</b>
                                            </p>

                                            <h1 style="margin-bottom: 25px;margin-top:25px;">婚禮 / 大型佈置及公開獻禮的場合</h1>

                                            <p>有關重要場合的鮮花配置，請向花藝師咨詢
                                                不建議：過於急忙的做決定…
                                                婚禮將要進行前兩小時才去選購，臨時才被通知要去準備花束給貴賓……隅爾會發生新娘拿著一束畢業花在登記所前留影，或者台上男性演講嘉賓收到疑似盛大的粉紅飛飛求婚類花束…重要場合請預早準備預訂合適的花束。
                                            </p>

                                            <h1 style="margin-bottom: 25px; margin-top:25px;">悼念 / 往生儀式 / 拜祭</h1>
                                            <p>
                                                <b>小地菊</b><br/>

                                                <b>爪菊</b><br/>

                                                    <b>百合</b><br/>

                                                        <b>蓮花</b><br/>

                                                            <b>竹 / 松 / 柏</b><br/>

                                                獻祭的花材以素色為主。本地的祭祀有分為中式和西式，中式的以黃，白，綠，較為流行。西式的追悼以白，紅，紫，黑較為受歡迎……在鮮花媒介的儀式裡，獻祭和悼念的花材選擇是最為廣泛的，這視乎於送花人對亡者的心意。

                                                不建議：選擇較殘舊的花材是不建議的。
                                            </p>

                                        </div>

                                <?php } ?>
                            </div>
                        </article>
                    </div>
                    <!--	///*///======    End article  ========= //*/// -->
                </div>
                <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
                    <!--side-nav-categories-->
                    <div class="block block-layered-nav">
                        <div class="block-title"><?php
                            if ($_COOKIE['language'] == 'CN')
                                echo '選購';
                            else
                                echo 'Shop By';
                            ?></div>
                        <div class="block-content">
                            <p class="block-subtitle"><?php
                                if ($_COOKIE['language'] == 'CN')
                                    echo '購物選擇';
                                else
                                    echo 'Shopping Options';
                                ?></p>
                            <dl id="narrow-by-list">
                                <dt class="odd"><?php
                                    if ($_COOKIE['language'] == 'CN')
                                        echo '價格';
                                    else
                                        echo 'Price';
                                    ?></dt>
                                <dd class="odd">
                                    <ol>
                                        <li><a href="Category?id=<?php echo $category ?>&price=1"><span class="price">$0.00</span>
                                                - <span
                                                        class="price">$99.99</span></a>
                                        </li>
                                        <li><a href="Category?id=<?php echo $category ?>&price=2"><span class="price">$100.00</span>
                                                <?php if ($_COOKIE['language'] === 'CN') echo ' 以上'; else echo ' and above' ?>
                                            </a>
                                        </li>
                                    </ol>
                                </dd>
                                <dt class="odd">Color</dt>
                                <dd class="odd">
                                    <ol>
                                        <?php
                                        $color = $db_handle->runQuery("select * from flower_color");
                                        $no_color = $db_handle->numRows("select * from flower_color");
                                        for ($i = 0; $i < $no_color; $i++) {
                                            ?>
                                            <li>
                                                <a href="Category?id=<?php echo $category ?>&color=<?php echo $color[$i]['color_id']; ?>"><?php if ($_COOKIE['language'] === 'CN') echo $color[$i]['color_cn']; else echo $color[$i]['color']; ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ol>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </aside>
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
