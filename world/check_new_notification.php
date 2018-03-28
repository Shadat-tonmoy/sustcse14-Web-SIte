<?php
	include '../conn.php';
	session_start();
	$id = $_SESSION['id'];
	$new_notification_sql = "SELECT `unseen_notification` FROM `user_data` WHERE `id`=$id";
	$new_notification_result = mysqli_query($conn,$new_notification_sql);
	$row = mysqli_fetch_assoc($new_notification_result);
	$notifications = $row['unseen_notification'];
	$notifications_array = array();
	$notifications_array = explode(',', $notifications);
	$num = count($notifications_array);
	if($num>0)
		echo $num-1; 



?>