<?php
include 'php_scripts.php';
$name = trim($_GET['u']);
echo $name;
$sql = "SELECT first_name FROM user_data WHERE first_name='name'";
$result = mysql_query($sql,$conn);
$rows = mysql_num_rows($result);
echo "$rows";


?>