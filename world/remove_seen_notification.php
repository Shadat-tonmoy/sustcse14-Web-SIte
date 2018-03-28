<?php
	include '../conn.php';
	session_start();
	$id = $_SESSION['id'];
	$remove_seen_notification_sql = "UPDATE `user_data` SET `unseen_notification`=NULL WHERE `id`='$id'";
	$remove_seen_notification_result = mysqli_query($conn,$remove_seen_notification_sql);



?>