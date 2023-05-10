<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
// Include configuration file
require_once 'config.php';

// Include database connection file
include_once 'dbConnect.php';

$payment_id = $statusMsg = $customer_email = '';
$status = 'error';

// Check whether stripe checkout session is not empty
if (!empty($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Fetch transaction data from the database if already exists
    $sqlQ = "SELECT * FROM transactions WHERE stripe_checkout_session_id = ?";
    $stmt = $db->prepare($sqlQ);
    $stmt->bind_param("s", $db_session_id);
    $db_session_id = $session_id;
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Transaction details
        $transData = $result->fetch_assoc();
        $payment_id = $transData['id'];
        $transactionID = $transData['txn_id'];
        $paidAmount = $transData['paid_amount'];
        $paidCurrency = $transData['paid_amount_currency'];
        $payment_status = $transData['payment_status'];

        $customer_name = $transData['customer_name'];
        $customer_email = $transData['customer_email'];

        $status = 'success';
        $statusMsg = 'Your Payment has been Successful!';
    } else {
        // Include the Stripe PHP library
        require_once 'stripe-php/init.php';

        // Set API key
        $stripe = new \Stripe\StripeClient(STRIPE_API_KEY);

        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = $stripe->checkout->sessions->retrieve($session_id);
        } catch (Exception $e) {
            $api_error = $e->getMessage();
        }

        if (empty($api_error) && $checkout_session) {
            // Get customer details
            $customer_details = $checkout_session->customer_details;

            // Retrieve the details of a PaymentIntent
            try {
                $paymentIntent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $paymentIntent) {
                // Check whether the payment was successful
                if (!empty($paymentIntent) && $paymentIntent->status == 'succeeded') {
                    // Transaction details
                    $transactionID = $paymentIntent->id;
                    $paidAmount = $paymentIntent->amount;
                    $paidAmount = ($paidAmount / 100);
                    $paidCurrency = $paymentIntent->currency;
                    $payment_status = $paymentIntent->status;

                    // Customer info
                    $customer_name = $customer_email = '';
                    if (!empty($customer_details)) {
                        $customer_name = !empty($customer_details->name) ? $customer_details->name : '';
                        $customer_email = !empty($customer_details->email) ? $customer_details->email : '';
                    }

                    // Check if any transaction data is exists already with the same TXN ID
                    $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?";
                    $stmt = $db->prepare($sqlQ);
                    $stmt->bind_param("s", $transactionID);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $prevRow = $result->fetch_assoc();

                    if (!empty($prevRow)) {
                        $payment_id = $prevRow['id'];
                    } else {
                        $user_id = $_SESSION['user_id'];
                        // Insert transaction data into the database
                        $sqlQ = "INSERT INTO transactions (customer_name,customer_email,billing_id,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,stripe_checkout_session_id,created,modified) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())";
                        $stmt = $db->prepare($sqlQ);
                        $stmt->bind_param("ssissdsdssss", $customer_name, $customer_email, $user_id, $productName, $productID, $productPrice, $currency, $paidAmount, $paidCurrency, $transactionID, $payment_status, $session_id);
                        $insert = $stmt->execute();

                        if ($insert) {
                            $payment_id = $stmt->insert_id;
                        }
                    }

                    $status = 'success';
                    $statusMsg = 'Your Payment has been Successful!';
                } else {
                    $statusMsg = "Transaction has been failed!";
                }
            } else {
                $statusMsg = "Unable to fetch the transaction details! $api_error";
            }
        } else {
            $statusMsg = "Invalid Transaction! $api_error";
        }
    }
} else {
    $statusMsg = "Invalid Request!";
}
?>

<?php if ($statusMsg=="Your Payment has been Successful!") {

    $email_to = $customer_email;
    $subject = 'Flower';


    $headers = "From: Flower <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                    <h3 style='color:black'>Payment Successful</h3>
                    <p style='color:black;'>
                    Thank you for payment.
                    </p>
                </div>
                </body>
            </html>";
    if (mail($email_to, $subject, $messege, $headers)) {

        $email_to = $db_handle->notify_email();
        $subject = 'Flower';


        $headers = "From: Flower <" . $db_handle->from_email() . ">\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                    <p style='color:black;'>
                        New Order Arrive.
                    </p>
                </div>
                </body>
            </html>";

        if (mail($email_to, $subject, $messege, $headers)) {
            ?>
            <script>
                location.href = "Home";
            </script>
            <?php
        } else { ?>
            <h1 class="error"><?php
                if($_COOKIE['language'] == 'CN')
                    echo '您的付款失敗！';
                else
                    echo 'Your Payment been failed!';
                ?></h1>
            <p class="error"><?php echo $statusMsg; ?></p>
            <p><?php
                if($_COOKIE['language'] == 'CN')
                    echo '管理員郵件發送失敗。';
                else
                    echo 'Admin Mail Send Failed.';
                ?></p>
        <?php }
    } else { ?>
        <h1 class="error"><?php
            if($_COOKIE['language'] == 'CN')
                echo '您的付款失敗！';
            else
                echo 'Your Payment been failed!';
            ?></p></h1>
        <p class="error"><?php echo $statusMsg; ?></p>
        <p><?php
            if($_COOKIE['language'] == 'CN')
                echo '客戶郵件發送失敗。';
            else
                echo 'Customer Mail Send Failed.';
            ?></p>

    <?php }
} else { ?>
    <h1 class="error"><?php
        if($_COOKIE['language'] == 'CN')
            echo '您的付款失敗！';
        else
            echo 'Customer Mail Send Failed.';
        ?></h1>
    <p class="error"><?php echo $statusMsg; ?></p>
    <p><?php
        if($_COOKIE['language'] == 'CN')
            echo '狀態消息不匹配。';
        else
            echo 'Status mesage not match.';
        ?></p>
<?php } ?>
