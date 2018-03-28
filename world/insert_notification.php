<?php
	session_start();
	include '../conn.php';
	$user_id = $_SESSION['id'];
	if(isset($_POST['notification']))
	{
		
		$notification = $_POST['notification'];
		$time = date("Y-m-d H:i:s");
		$date = date("Y-m-d");
		$past_days = date("Y-m-d", strtotime("$date -2 day"));	
		if(isset($_POST['link']))
		{
			$link = $_POST['link'];
			$insert_notification_sql = "INSERT INTO `notification` (`name`,`time`,`date`,`link`)VALUES ('$notification','$time','$date','$link')";
		}
		else $insert_notification_sql = "INSERT INTO `notification` (`name`,`time`,`date`)VALUES ('$notification','$time','$date')";	
		$insert_notification_result = mysqli_query($conn,$insert_notification_sql);
		if($insert_notification_result)
		{
			$last_id_sql = "SELECT `id` FROM `notification` ORDER BY `id` DESC LIMIT 1";
			$last_id_result = mysqli_query($conn,$last_id_sql);
			if($last_id_result)
			{
				$row = mysqli_fetch_assoc($last_id_result);
				$id = $row['id'];
				echo $id;
				$notification_update_sql = "UPDATE `user_data` SET `notifications` = concat(`notifications`,',$id')";
				$notification_update_result = mysqli_query($conn,$notification_update_sql);
				if($notification_update_result)
				{
					echo "UPDATED";
					$delete_past_sql = "DELETE FROM `notification` WHERE `date`<='$past_days'";
					$delete_past_result = mysqli_query($conn,$delete_past_sql);

				}
				else echo mysqli_error($conn);
			}
			else echo mysqli_error($conn);

		}
		else echo mysqli_error($conn);
		//echo "FROM PHP $notification";
	}
	else echo mysqli_error($conn);



?>