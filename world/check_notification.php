<?php
	session_start();
	include '../conn.php';
	$user_id = $_SESSION['id'];
	$notification_fetch_sql = "SELECT `notifications` FROM `user_data` WHERE `id`='$user_id'";
	$notification_fetch_result = mysqli_query($conn,$notification_fetch_sql);
	if($notification_fetch_sql)
	{
		$row = mysqli_fetch_assoc($notification_fetch_result);
		$notifications_id = $row['notifications'];
		echo $notifications_id;
		$notification_array = array();
		$notifications_array = explode(',', $notifications_id);
		for($i=0;$i<count($notifications_array);$i++)
		{
			$id = $notifications_array[$i];
			$notification_update_sql = "UPDATE `notification` SET `seen_by` = concat(`seen_by`,',$user_id') WHERE `id`='$id'";
			$notification_update_result = mysqli_query($conn,$notification_update_sql);
		}
		$clear_notification_sql = "UPDATE `user_data` SET `notifications`='' WHERE `id`= '$user_id'";
		$clear_notification_result = mysqli_query($conn,$clear_notification_sql);

	}




?>