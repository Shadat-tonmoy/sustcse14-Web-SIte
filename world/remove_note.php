<?php
	include "../conn.php";
	if(isset($_POST['id']))
	{
		$id = $_POST['id'];
		$remove_sql = "DELETE FROM `notes` WHERE `id`='$id'";
		$remove_sql_result = mysqli_query($conn,$remove_sql);
		if($remove_sql_result)
		{
			echo "Success";
		}
		else echo mysqli_error($conn);
	}



?>