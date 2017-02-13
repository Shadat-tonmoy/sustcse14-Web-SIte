<?php
session_start();
session_destroy();
setcookie("remember", "1", time() - 3600,"/");
header ("Location:index.php");
?>