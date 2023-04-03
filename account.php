<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Account - Four Seasons Florist</title>
    <?php include('include/css.php'); ?>


</head>

<body>
<div id="page">
    <?php include('include/header.php'); ?>
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN Main Container col2-right -->
    <section class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-main col-sm-12 col-xs-12 wow bounceInUp animated animated"
                         style="visibility: visible;">
                    <div class="my-account">

                        <!--page-title-->
                        <!-- BEGIN DASHBOARD-->
                        <div class="dashboard">
                            <div class="welcome-msg">
                                <p class="hello"><strong>Hello, john doe!</strong></p>
                                <p>From your My Account Dashboard you have the ability to view a snapshot of your recent
                                    account activity and update your account information. Select a link below to view or
                                    edit information.</p>
                            </div>
                            <div class="recent-orders">
                                <div class="title-buttons"><strong>Recent Orders</strong></div>
                                <div class="table-responsive">
                                    <table class="data-table table-striped" id="my-orders-table">
                                        <colgroup>
                                            <col width="">
                                            <col width="">
                                            <col>
                                            <col width="1">
                                            <col width="1">
                                            <col width="20%">
                                        </colgroup>
                                        <thead>
                                        <tr class="first last">
                                            <th>Order #</th>
                                            <th>Date</th>
                                            <th>Ship To</th>
                                            <th><span class="nobr">Order Total</span></th>
                                            <th>Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="first odd">
                                            <td>12800000002</td>
                                            <td><span class="nobr">5/12/2015</span></td>
                                            <td>jhon doe</td>
                                            <td><span class="price">$403.00</span></td>
                                            <td><em>Pending</em></td>
                                            <td class="a-center last"><span class="nobr"> <a
                                                            href="#">View Order</a> </span></td>
                                        </tr>
                                        <tr class="even">
                                            <td>12800000001</td>
                                            <td><span class="nobr">5/11/2015</span></td>
                                            <td>jhon doe</td>
                                            <td><span class="price">$506.50</span></td>
                                            <td><em>Pending</em></td>
                                            <td class="a-center last"><span class="nobr"> <a
                                                            href="#">View Order</a> <span class="separator">|</span> <a
                                                            href="#" class="link-reorder">Reorder</a> </span></td>
                                        </tr>
                                        <tr class="odd">
                                            <td>13100000001</td>
                                            <td><span class="nobr">5/9/2015</span></td>
                                            <td>jhon doe</td>
                                            <td><span class="price">$997.84</span></td>
                                            <td><em>Pending</em></td>
                                            <td class="a-center last"><span class="nobr"> <a
                                                            href="#">View Order</a> <span class="separator">|</span> <a
                                                            href="#" class="link-reorder">Reorder</a> </span></td>
                                        </tr>
                                        <tr class="even">
                                            <td>12000000002</td>
                                            <td><span class="nobr">4/1/2015</span></td>
                                            <td>jhon doe</td>
                                            <td><span class="price">$60.00</span></td>
                                            <td><em>Pending</em></td>
                                            <td class="a-center last"><span class="nobr"> <a
                                                            href="#">View Order</a> <span class="separator">|</span> <a
                                                            href="#" class="link-reorder">Reorder</a> </span></td>
                                        </tr>
                                        <tr class="last odd">
                                            <td>12000000001</td>
                                            <td><span class="nobr">4/1/2015</span></td>
                                            <td>jhon doe</td>
                                            <td><span class="price">$208.00</span></td>
                                            <td><em>Pending</em></td>
                                            <td class="a-center last"><span class="nobr"> <a
                                                            href="#">View Order</a> <span class="separator">|</span> <a
                                                            href="#" class="link-reorder">Reorder</a> </span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--table-responsive-->
                            </div>
                            <!--recent-orders-->
                            <div class="box-account">
                                <div class="page-title">
                                    <h2>Account Information</h2>
                                </div>
                                <div class="col2-set">
                                    <div class="col-1">
                                        <div class="box">
                                            <div class="box-title">
                                                <h5>Contact Information</h5>
                                                <a href="#">
                                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                        Edit
                                                    </button>
                                                </a></div>
                                            <!--box-title-->
                                            <div class="box-content">
                                                <?php
                                                $customer = $db_handle->runQuery("select * from customer where id='$user_id'");
                                                ?>
                                                <p> <?php echo $customer[0]['customer_name']; ?><br>
                                                    <?php echo $customer[0]['email']; ?>
                                                    </p>
                                            </div>
                                            <!--box-content-->
                                        </div>
                                        <!--box-->
                                    </div>
                                </div>
                                <div class="col2-set">
                                    <div class="box">
                                        <!--box-title-->
                                        <div class="box-content">
                                            <div class="col-1">
                                                <h5>Default Billing Address</h5>
                                                <address>
                                                    <?php echo $customer[0]['address_1']; ?>
                                                </address>
                                            </div>
                                            <div class="col-2">
                                                <h5>Default Shipping Address</h5>
                                                <address>
                                                    <?php echo $customer[0]['address_1']; ?>
                                                </address>
                                            </div>
                                        </div>
                                        <!--box-content-->
                                    </div>
                                    <!--box-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!--row-->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row registered-users" style="padding: 25px;">
                                <strong>Edit</strong>
                                <div class="content">
                                    <p>If you have an account with us, please log in.</p>
                                    <form action="Insert" method="post">
                                        <ul class="form-list">
                                            <li>
                                                <input value="<?php echo $user_id;?>" type="hidden" name="id">
                                            </li>
                                            <li>
                                                <label for="email">Full Name<em class="required">*</em></label>
                                                <div class="input-box">
                                                    <input type="text" name="name"
                                                           value="<?php echo $customer[0]['customer_name']; ?>"
                                                           class="input-text required-entry"
                                                           title="Full Name">
                                                </div>
                                            </li>
                                            <li>
                                                <label for="email">Email<em class="required">*</em></label>
                                                <div class="input-box">
                                                    <input type="email" name="email"
                                                           value="<?php echo $customer[0]['email']; ?>"
                                                           class="input-text required-entry"
                                                           title="Email Address">
                                                </div>
                                            </li>
                                            <li>
                                                <label for="email">Phone No<em class="required">*</em></label>
                                                <div class="input-box">
                                                    <input type="text" name="phone"
                                                           value="<?php echo $customer[0]['number']; ?>"
                                                           class="input-text required-entry"
                                                           title="Phone Number">
                                                </div>
                                            </li>
                                            <li>
                                                <label for="email">Address 1<em class="required">*</em></label>
                                                <div class="input-box">
                                                    <input type="text" name="address_one"
                                                           value="<?php echo $customer[0]['address_1']; ?>"
                                                           class="input-text required-entry"
                                                           title="Address 1">
                                                </div>
                                            </li>
                                            <li>
                                                <label for="email">Address 2<em class="required">*</em></label>
                                                <div class="input-box">
                                                    <input type="text" name="address_two"
                                                           value="<?php echo $customer[0]['address_2']; ?>"
                                                           class="input-text required-entry"
                                                           title="Address 2">
                                                </div>
                                            </li>
                                            <li>
                                                <label for="email">Address 3<em class="required">*</em></label>
                                                <div class="input-box">
                                                    <input type="text" name="address_three"
                                                           value="<?php echo $customer[0]['address_3']; ?>"
                                                           class="input-text required-entry"
                                                           title="Address 3">
                                                </div>
                                            </li>
                                        </ul>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" name="update_customer_info" class="btn btn-secondary">Save
                                            changes
                                        </button>
                                    </form>
                                </div> <!--content-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--main container-->
    </section>
    <!--main-container col2-left-layout-->


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