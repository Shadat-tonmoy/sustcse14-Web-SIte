<?php
include 'conn.php';
if(isset($_POST['no']))
{
	$reg_no = $_POST['no'];

	$sql = "SELECT * FROM user_data WHERE reg_no='$reg_no'";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		$rows = mysqli_num_rows($result);
		//echo $rows;
		if($rows>0)
			echo "You Are Already Registered";
		else echo "New";
	}
	
	
}



?>