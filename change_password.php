<?php
	session_start();
	include 'conn.php';
	if(isset($_POST['new_ps']))
	{
		$new_ps = $_POST['new_ps'];
		$new_ps_hash = md5($new_ps);
		$id = $_SESSION['id'];
		//echo "FROM PHP : $new_ps";
		$sql = "UPDATE `user_data` SET `password`=$new_ps_hash WHERE `id` = $id";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			echo "1";
		}
		else echo "0";
	}









?>