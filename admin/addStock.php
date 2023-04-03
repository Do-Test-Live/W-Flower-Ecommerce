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
    <title>Add Product | Four Seasons</title>
    <?php include 'include/css.php'; ?>
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
            <!-- Add Product -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Stock</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Insert" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Select Product Category *</label>
                                            <select class="form-control default-select" id="category"
                                                    name="product_category" required>
                                                <option>Choose Category</option>
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
                                            <label>Product Code</label>
                                            <select id="single" class="js-states form-control" name="product_id">
                                                <option>Select your option</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" name="product_quantity" placeholder="">
                                        </div>


                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="add_quantity" class="btn btn-primary w-50">Submit
                                        </button>
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


<!-- Select2 -->

<script>
    $("#single").select2({
        placeholder: "Select a programming language",
        allowClear: true
    });
</script>

<script>
    const select1 = document.getElementById('category');
    const select2 = document.getElementById('single');

    select1.addEventListener('change', () => {
        // Get the selected value from the first select field
        const selectedValue = select1.value;

        // Make an AJAX request to your PHP script to fetch the values for the second select field
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'fetch-product.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Parse the response as JSON
                    const response = JSON.parse(xhr.responseText);

                    // Clear the options in the second select field
                    select2.innerHTML = '';

                    // Add the new options to the second select field
                    response.forEach(option => {
                        const newOption = document.createElement('option');
                        newOption.value = option.id;
                        newOption.textContent = option.p_name;
                        select2.appendChild(newOption);
                    });
                } else {
                    console.error('Error fetching values');
                }
            }
        };
        xhr.send(`selectedValue=${selectedValue}`);
    });
</script>
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

    $(document).ready(function() {
        // Bind an event listener to the first select field
        $('#subcategory').on('change', function() {
            // Get the selected value from the first select field
            var selectedValue = $(this).val();

            // Make an AJAX request to fetch the data based on the selected value
            $.ajax({
                url: 'fetch-product-type.php', // change this to the URL of your PHP script
                method: 'GET', // or 'GET', depending on how you want to send the data
                data: { selectedValue: selectedValue },
                dataType: 'json', // or 'html', depending on how you're returning the data
                success: function(data) {
                    console.log(data);
                    // Clear the current options in the second select field
                    $('#product_type').empty();

                    // Add the new options based on the fetched data
                    $.each(data, function(index, value) {
                        $('#product_type').append('<option value="' + value.product_type_id  + '">' + value.product_type + '</option>');
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
