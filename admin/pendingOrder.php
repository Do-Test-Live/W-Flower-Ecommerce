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
                                        <th>C Person Name</th>
                                        <th>C Person Phone </th>
                                        <th>R Person Name</th>
                                        <th>R Person Phone</th>
                                        <th>Address</th>
                                        <th>Amount</th>
                                        <th>Delivery Date</th>
                                        <th>Delivery Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $bills = $db_handle->runQuery("SELECT * FROM `billing_details` WHERE approve = '3' order by id DESC;");
                                    $row_count = $db_handle->numRows("SELECT * FROM `billing_details` WHERE approve = '3' order by id DESC;");

                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $bills[$i]["contact_name"].' '. $bills[$i]["l_name"];?></td>
                                            <td><?php echo $bills[$i]["contact_phone"]; ?></td>
                                            <td><?php echo $bills[$i]["receiver_name"]; ?></td>
                                            <td><?php echo $bills[$i]["receiver_phone"]; ?></td>
                                            <td><?php echo $bills[$i]["address"]; ?></td>
                                            <td><?php echo $bills[$i]["total_purchase"]; ?></td>
                                            <?php
                                            $date = date_create($bills[$i]["deliver_date"]);
                                            $date_formatted = date_format($date, "d F y");
                                            ?>
                                            <td><?php echo $date_formatted; ?></td>
                                            <td><?php echo $bills[$i]["deliver_time"]; ?></td>
                                            <td>Pending</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="Bill-Details?billing_id=<?php echo $bills[$i]['id'];?>"
                                                       class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-eye"></i></a>
                                                    <a href="Update?billing_id=<?php echo $bills[$i]['id'];?>"
                                                       class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
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
