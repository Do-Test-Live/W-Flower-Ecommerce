<footer>
    <!-- BEGIN INFORMATIVE FOOTER -->
    <div class="footer-inner">
        <div class="newsletter-row">
            <div class="container">
                <div class="row">
                    <!-- Footer Newsletter -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col1">
                        <div class="newsletter-wrap">
                            <h5><?php
                                if($_COOKIE['language'] == 'CN')
                                    echo '通訊';
                                else
                                    echo 'Newsletter';
                                ?></h5>
                            <h4 style="color: white"><?php
                                if($_COOKIE['language'] == 'CN')
                                    echo '享受折扣 30% 的折扣';
                                else
                                    echo 'Get discount 30% off';
                                ?></h4>
                            <form action="#" method="post" id="newsletter-validate-detail1">
                                <div id="container_form_news">
                                    <div id="container_form_news2">
                                        <input type="text" name="email" id="newsletter1"
                                               title="Sign up for our newsletter"
                                               class="input-text required-entry validate-email"
                                               placeholder="<?php
                                               if($_COOKIE['language'] == 'CN')
                                                   echo '輸入你的電子郵箱地址';
                                               else
                                                   echo 'Enter your email address';
                                               ?>">
                                        <button type="submit" title="Subscribe" class="button subscribe">
                                            <span><?php
                                                if($_COOKIE['language'] == 'CN')
                                                    echo '訂閱';
                                                else
                                                    echo 'Subscribe';
                                                ?></span></button>
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
                            <h4 style="color: white"><?php
                                if($_COOKIE['language'] == 'CN')
                                    echo '菜單';
                                else
                                    echo 'Menu';
                                ?></h4>
                            <ul class="links">
                                <li><a href="#" title="How to buy"><?php
                                        if($_COOKIE['language'] == 'CN')
                                            echo '家';
                                        else
                                            echo 'Home';
                                        ?></a></li>
                                <li><a href="#" title="FAQs"><?php
                                        if($_COOKIE['language'] == 'CN')
                                            echo '商店';
                                        else
                                            echo 'Shops';
                                        ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-column">
                            <h4 style="color: white"><?php
                                if($_COOKIE['language'] == 'CN')
                                    echo '聯繫我們';
                                else
                                    echo 'Contact Us';
                                ?></h4>
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

