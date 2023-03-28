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
    <title>Add Product Type | Four Seasons</title>
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
            <!-- Add Category -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Product Type</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Insert" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Select Product Category *</label>
                                            <select class="form-control default-select" name="category" id="category" required>
                                                <option value="">Choose Category</option>
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
                                        <div class="form-group col-md-12">
                                            <label>Select Product Sub-Category *</label>
                                            <select class="form-control" id="subcategory" name="subcategory" required>
                                                <option value="">Choose Sub-Category</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Product Type Name</label>
                                            <input type="text" class="form-control" name="product_type" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-50" name="add_product_type">Submit</button>
                                    </div>
                                </form>
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
<script>
    $(document).ready(function() {
        // Bind an event listener to the first select field
        $('#category').on('change', function() {
            // Get the selected value from the first select field
            var selectedValue = $(this).val();

            // Make an AJAX request to fetch the data based on the selected value
            $.ajax({
                url: 'fetch-sub-cat.php', // change this to the URL of your PHP script
                method: 'GET', // or 'GET', depending on how you want to send the data
                data: { selectedValue: selectedValue },
                dataType: 'json', // or 'html', depending on how you're returning the data
                success: function(data) {
                    // Clear the current options in the second select field
                    $('#subcategory').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(index, value) {
                        $('#subcategory').append('<option value="' + value.sub_cat_id  + '">' + value.sub_cat_name + '</option>');
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus, errorThrown);
                }
            });
        });
    });

</script>
</body>
</html>
