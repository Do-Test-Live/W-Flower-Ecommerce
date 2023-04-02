<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
// set the current page number
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// calculate the offset for the SQL query
$offset = ($current_page - 1) * 1;

// fetch the data from the database
$sql = $db_handle->runQuery("SELECT * FROM product where category_id='8' LIMIT 1 OFFSET $offset");
$sql_no = $db_handle->numRows("SELECT * FROM product where category_id='8' LIMIT 1 OFFSET $offset");

for($x=0;$x<$sql_no;$x++){
    echo $sql[$x]['id'] . "<br>";
}



// calculate the total number of pages
$new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product where category_id='8'");

$total_pages = ceil($new[0]['c'] / 1);

// display the pagination links
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}






























