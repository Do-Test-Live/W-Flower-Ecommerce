<?php
require_once("admin/include/dbController.php");
$db_handle = new DBController();

if(isset($_POST['login'])){
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);

    $login = $db_handle->runQuery("select * from customer where email = '$email' and password='$password'");
    $login_no = $db_handle->numRows("select * from customer where email = '$email' and password='$password'");
    if($login_no == 1){
        session_start();
        $_SESSION['id'] = $login[0]['id'];
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Home';
                </script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en" class=" js no-touch localstorage">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Four Seasons Florist</title>
    <?php include ('include/css.php');?>


</head>
<body class="  customer-account-login rtl" style="">
<div id="page">
    <?php include ('include/header.php');?>
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Login or Create an Account</h2>
                    </div>
                </div>
                <!--col-xs-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>


    <!-- BEGIN Main Container -->

    <div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">

        <div class="main">
            <div class="account-login container">
                <!--page-title-->

                <form action="#" class="mb-5" method="post" id="login-form">
                    <fieldset class="col2-set">
                        <div class="col-1 new-users">
                            <strong>New Customers</strong>
                            <div class="content">

                                <p>By creating an account with our store, you will be able to move through the checkout
                                    process faster, store multiple shipping addresses, view and track your orders in
                                    your account and more.</p>
                                <div class="buttons-set">
                                    <button type="button" title="Create an Account" class="button create-account"
                                            onClick="changeForm();"><span><span>Create an Account</span></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <strong>Login</strong>
                            <div class="content">

                                <p>If you have an account with us, please log in.</p>
                                <ul class="form-list">
                                    <li>
                                        <label for="email">Email Address<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="text" name="email" value="" id="email"
                                                   class="input-text required-entry validate-email"
                                                   title="Email Address">
                                        </div>
                                    </li>
                                    <li>
                                        <label for="pass">Password<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="password" name="password"
                                                   class="input-text required-entry validate-password" id="pass"
                                                   title="Password">
                                        </div>
                                    </li>
                                </ul>

                                <p class="required">* Required Fields</p>


                                <div class="buttons-set">

                                    <button type="submit" class="button login" title="Login" name="login" id="send2">
                                        <span>Login</span></button>

                                    <a href="#" class="forgot-word">Forgot Your Password?</a>
                                </div> <!--buttons-set-->
                            </div> <!--content-->
                        </div> <!--col-2 registered-users-->
                    </fieldset> <!--col2-set-->
                </form>

                <form action="Insert" class="mb-5" method="post" style="display: none;" id="signupform">
                    <fieldset class="col2-set">
                        <div class="col-1 new-users">
                            <strong>Existing Customers</strong>
                            <div class="content">

                                <p>If you have an account with us, please log in.</p>
                                <div class="buttons-set">
                                    <button type="button" title="Create an Account" class="button create-account"
                                            onClick="logIn();"><span><span>Log In</span></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <strong>Registered Customers</strong>
                            <div class="content">

                                <p>If you don't have an account with us, please create a new one.</p>
                                <ul class="form-list">
                                    <li>
                                        <label for="email">Full Name<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="text" name="name" value=""
                                                   class="input-text required-entry"
                                                   title="Full Name">
                                        </div>
                                    </li>
                                    <li>
                                        <label for="email">Contact No<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="text" name="number" value=""
                                                   class="input-text required-entry"
                                                   title="Contact Number">
                                        </div>
                                    </li>
                                    <li>
                                        <label for="email">Email Address<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="text" name="email" value="" id="email"
                                                   class="input-text required-entry validate-email"
                                                   title="Email Address">
                                        </div>
                                    </li>
                                    <li>
                                        <label for="pass">Password<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="password" name="password"
                                                   class="input-text required-entry validate-password" id="pass"
                                                   title="Password">
                                        </div>
                                    </li>
                                    <li>
                                        <label for="pass">Address<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="text" name="address"
                                                   class="input-text required-entry"
                                                   title="address">
                                        </div>
                                    </li>
                                </ul>

                                <p class="required">* Required Fields</p>


                                <div class="buttons-set">

                                    <button type="submit" class="button login" title="Login" name="signup" id="send2">
                                        <span>Signup</span></button>

                                    <a href="#" class="forgot-word">Forgot Your Password?</a>
                                </div> <!--buttons-set-->
                            </div> <!--content-->
                        </div> <!--col-2 registered-users-->
                    </fieldset> <!--col2-set-->
                </form>

            </div> <!--account-login-->

        </div><!--main-container-->

    </div> <!--col1-layout-->



    <!-- For version 1,2,3,4,6 -->

    <?php include ('include/footer.php');?>
    <!-- End For version 1,2,3,4,6 -->

</div>
<!--page-->
<!-- Mobile Menu-->
<?php include ('include/mobile_menu.php');?>
<!-- JavaScript -->
<?php include ('include/js.php');?>

<script>
    function changeForm(){
        document.getElementById('login-form').style.display='none';
        document.getElementById('signupform').style.display='block';
    }
    function logIn(){
        document.getElementById('login-form').style.display='block';
        document.getElementById('signupform').style.display='none';
    }
</script>

</body>

</html>