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
    <title>Sub-Category | Four Seasons Admin</title>
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
                <?php if (isset($_GET['subcatId'])) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update sub-Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update" enctype="multipart/form-data">

                                        <?php $data = $db_handle->runQuery("SELECT s.sub_cat_id, s.sub_cat_name, s.sub_cat_image, s.inserted_at, c.c_name,c.id FROM `sub_category` as s,`category` as c WHERE s.cat_id = c.id and s.sub_cat_id = {$_GET['subcatId']}");?>

                                        <input type="hidden" value="<?php echo $data[0]["sub_cat_id"];?>" name="id" required>

                                        <div class="mb-3 row">
                                            <label>Select Product Category *</label>
                                            <select class="form-control default-select" id="sel1" name="category" required>
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
                                            <label>Sub Category Name *</label>
                                            <input type="text" class="form-control" name="sub_cat_name"
                                                   placeholder="Sub-Category Name"
                                                   value="<?php echo $data[0]["sub_cat_name"]; ?>" required>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Image</label>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="sub_cat_image" accept="image/png, image/jpeg, image/jpg">
                                                        <label class="custom-file-label">Choose file (png, jpg, jpeg)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <img src="<?php echo $data[0]["sub_cat_image"]; ?>" class="img-fluid"
                                                     alt=""/>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="updateSubCategory">Submit
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
                                <h4 class="card-title">Sub-Category List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Sub-Category Name</th>
                                            <th>Category Name</th>
                                            <th>Sub-Category Image</th>
                                            <th>Insert Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sub_category_data = $db_handle->runQuery("SELECT s.sub_cat_id, s.sub_cat_name, s.sub_cat_image, s.inserted_at, c.c_name FROM `sub_category` as s,`category` as c WHERE s.cat_id = c.id;");
                                        $row_count = $db_handle->numRows("SELECT s.sub_cat_id, s.sub_cat_name, s.sub_cat_image, s.inserted_at, c.c_name FROM `sub_category` as s,`category` as c WHERE s.cat_id = c.id;");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $sub_category_data[$i]["sub_cat_name"]; ?></td>
                                                <td><?php echo $sub_category_data[$i]["c_name"]; ?></td>
                                                <td><a href="<?php echo $sub_category_data[$i]["sub_cat_image"]; ?>"
                                                       target="_blank">Image</a></td>
                                                <?php
                                                $date = date_create($sub_category_data[$i]["inserted_at"]);
                                                $date_formatted = date_format($date, "d F y, g:i A");
                                                ?>
                                                <td><?php echo $date_formatted; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Sub-Category?subcatId=<?php echo $sub_category_data[$i]["sub_cat_id"]; ?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a onclick="subcategoryDelete(<?php echo $sub_category_data[$i]["sub_cat_id"]; ?>);"
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
    function subcategoryDelete(id) {
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
                        subcatId: id
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
