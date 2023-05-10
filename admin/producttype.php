<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sub-Category | Add Product Type</title>
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
            <!-- Category List -->
            <div class="row">
                <?php if (isset($_GET['product_type_id'])) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Product Type</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update" enctype="multipart/form-data">

                                        <?php $data = $db_handle->runQuery("SELECT p.product_type,p.product_type_en, c.id, c.c_name,s.sub_cat_id, s.sub_cat_name FROM `product_type` as p, category as c, sub_category as s WHERE p.cat_id = c.id and p.sub_cat_id = s.sub_cat_id and p.product_type_id = ".$_GET['product_type_id'].";");?>

                                        <input type="hidden" value="<?php echo$_GET['product_type_id'];?>" name="id" required>

                                        <div class="mb-3 row">
                                            <label>Select Category *</label>
                                            <select class="form-control default-select" name="category" required>
                                                <option value="<?php echo $data[0]["id"];?>" selected><?php echo $data[0]["c_name"];?></option>
                                                <?php
                                                $cat = $db_handle->runQuery("SELECT * FROM `category`");
                                                $row_count = $db_handle->numRows("SELECT * FROM `category`");
                                                for ($i = 0; $i < $row_count; $i++) {
                                                    ?>
                                                    <option value="<?php echo $cat[$i]["id"]; ?>"><?php echo $cat[$i]["c_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 row">
                                            <label>Select Sub-Category *</label>
                                            <select class="form-control default-select" id="sel1" name="sub_cat" required>
                                                <option value="<?php echo $data[0]["sub_cat_id"];?>" selected><?php echo $data[0]["sub_cat_name"];?></option>
                                                <?php
                                                $cat = $db_handle->runQuery("SELECT * FROM `sub_category`");
                                                $row_count = $db_handle->numRows("SELECT * FROM `sub_category`");
                                                for ($i = 0; $i < $row_count; $i++) {
                                                    ?>
                                                    <option value="<?php echo $cat[$i]["sub_cat_id"]; ?>"><?php echo $cat[$i]["sub_cat_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 row">
                                            <label>Product Type Name (CN)</label>
                                            <input type="text" class="form-control" name="product_type"
                                                   placeholder="Sub-Category Name"
                                                   value="<?php echo $data[0]["product_type"]; ?>" required>
                                        </div>
                                        <div class="mb-3 row">
                                            <label>Product Type Name (EN)</label>
                                            <input type="text" class="form-control" name="product_type_en"
                                                   placeholder="Sub-Category Name"
                                                   value="<?php echo $data[0]["product_type_en"]; ?>" required>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="updateProductType">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product Type List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Type</th>
                                            <th>Category Name</th>
                                            <th>Sub-Category Name</th>
                                            <th>Insert Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $product_type_data = $db_handle->runQuery("SELECT p.product_type_id , p.product_type, c.c_name, s.sub_cat_name, p.inserted_at FROM `product_type` as p, category as c, sub_category as s WHERE p.cat_id = c.id and p.sub_cat_id = s.sub_cat_id");
                                        $row_count = $db_handle->numRows("SELECT p.product_type_id, p.product_type, c.c_name, s.sub_cat_name, p.inserted_at FROM `product_type` as p, category as c, sub_category as s WHERE p.cat_id = c.id and p.sub_cat_id = s.sub_cat_id");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $product_type_data[$i]["product_type"]; ?></td>
                                                <td><?php echo $product_type_data[$i]["c_name"]; ?></td>
                                                <td><?php echo $product_type_data[$i]["sub_cat_name"]; ?></td>
                                                <?php
                                                $date = date_create($product_type_data[$i]["inserted_at"]);
                                                $date_formatted = date_format($date, "d F y, g:i A");
                                                ?>
                                                <td><?php echo $date_formatted; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Product-Type?product_type_id=<?php echo $product_type_data[$i]["product_type_id"]; ?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a onclick="productTypeDelete(<?php echo $product_type_data[$i]["product_type_id"]; ?>);"
                                                           class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
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
                    <?php
                }
                ?>
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
<script>
    function productTypeDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: 'Delete',
                    data: {
                        productTypeId: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'Your have store in this category.',
                                'error'
                            ).then((result) => {
                                window.location = 'Sub-Category';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Sub-Category';
                            });
                        }
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your SubCategory is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Sub-Category';
                });
            }
        })
    }
</script>
<!-- Datatable -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>
</body>
</html>

