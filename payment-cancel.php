<!DOCTYPE html>
<html lang="en-US">
<head>
<title>付款取消</title>
<meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<!-- Stylesheet file -->

</head>
<body>
<div class="container">
    <div class="status">
        <h1 class="error"><?php
            if($_COOKIE['language'] == 'CN')
                echo '您的交易已取消！';
            else
                echo 'Your transaction was canceled!';
            ?></h1>
    </div>
    <a href="index.php" class="btn-link"><?php
        if($_COOKIE['language'] == 'CN')
            echo '返回首頁';
        else
            echo 'Back to Home Page';
        ?></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
