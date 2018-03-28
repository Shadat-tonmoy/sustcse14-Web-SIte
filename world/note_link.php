<?php
	include '../conn.php';
	session_start();
	$id = $_SESSION['id'];
	if(isset($_POST['notifications_id']))
	{
		$notification_id = $_POST['notifications_id'];
		$link_sql = "SELECT `link` FROM `notification` WHERE `id`='$notification_id'";
		$link_result = mysqli_query($conn,$link_sql);
		$row = mysqli_fetch_assoc($link_result);
		$link = $row['link'];
		echo "$link";
	}



?>