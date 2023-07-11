<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pending Order | Four Seasons</title>
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php include 'include/css.php'; ?>
</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <?php include 'include/header.php'; ?>

    <?php include 'include/nav.php'; ?>

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- Add Order -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pending Orders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Total Amount</th>
                                        <th>Remarks</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $bills = $db_handle->runQuery("SELECT * FROM `billing_details` WHERE approve != '3' order by id DESC;");
                                    $row_count = $db_handle->numRows("SELECT * FROM `billing_details` WHERE approve != '3' order by id DESC;");

                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $bills[$i]["f_name"].' '. $bills[$i]["l_name"];?></td>
                                            <td><?php echo $bills[$i]["email"]; ?></td>
                                            <td><?php echo $bills[$i]["phone"]; ?></td>
                                            <td><?php echo $bills[$i]["address"]; ?></td>
                                            <td><?php echo $bills[$i]["city"]; ?></td>
                                            <td><?php echo $bills[$i]["total_purchase"]; ?></td>
                                            <td><?php echo $bills[$i]["remarks"]; ?></td>
                                            <?php
                                            $date = date_create($bills[$i]["updated_at"]);
                                            $date_formatted = date_format($date, "d F y, g:i A");
                                            ?>
                                            <td><?php echo $date_formatted; ?></td>
                                            <td><?php if($bills[$i]['approve'] == '2'){ echo 'Confirmed';} else{echo 'Delivered';}?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="Bill-Details?billing_id=<?php echo $bills[$i]['id'];?>"
                                                       class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-eye"></i></a>
                                                    <?php if($bills[$i]['approve'] == '2'){
                                                        ?>
                                                        <a href="Update?confirm_id=<?php echo $bills[$i]['id'];?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        <?php
                                                    }?>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <?php include 'include/footer.php'; ?>

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<?php include 'include/js.php'; ?>

<!-- Datatable -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>
</body>
</html>
