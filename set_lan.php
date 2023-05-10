<?php
$cookie_name='language';
$cookie_value=$_GET['lan'];
setcookie($cookie_name, $cookie_value);
echo"<script>
window.location.href= 'Home';
</script>";

