<?php

// Product Details
// Minimum amount is $0.50 US
$productName = "1小時30分鐘租場服務";
$productID = "DP12345";
$productPrice = 190;
$currency = "hkd";

/*
 * Stripe API configuration
 * Remember to switch to your live publishable and secret key in production!
 * See your keys here: https://dashboard.stripe.com/account/apikeys
 */
define('STRIPE_API_KEY', 'sk_test_51MqGAtFbJgrDKYxd3HscjVT5etelQSa9sxnTKb99slTpcO3vZTGzbTlDgVspziqjd4SBQpscLaPVnlk0ouky9W3R00HhYcSzwL');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51MqGAtFbJgrDKYxd1QdSbXLAbWqQBZPmmV1qVfSpDuYz4duRZCQ0llPE8NtJdUyBLotBVZvxEsBsQMtpyi2ZVWPE00k6l4B6aq');
define('STRIPE_SUCCESS_URL', 'http://localhost/W-Flower-Ecommerce/payment-success.php'); //Payment success URL
define('STRIPE_CANCEL_URL', 'http://localhost/W-Flower-Ecommerce/payment-cancel.php'); //Payment cancel URL

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'four_season');


