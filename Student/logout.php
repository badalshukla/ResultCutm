<?php
setcookie("username",$_POST['username'], time() - (25), "/");
header("location: index.php");
?>