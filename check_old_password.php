<?php
	session_start();
	include 'conn.php';
	if(isset($_POST['old_ps']))
	{
		$old_ps = $_POST['old_ps'];
		//echo "from php $old_ps";
		$id = $_SESSION['id'];
		$sql = "SELECT password FROM user_data WHERE `id`=$id";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			$row = mysqli_fetch_assoc($result);
			$password = $row['password'];
			if($password==$old_ps)
				echo "1";
			else echo "0";
		}
		else echo "0";
	}
	



?>