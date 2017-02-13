<?php
	include 'conn.php';
	if(isset($_POST['signup']))
	{
		$first_name = $_POST['f_name'];
		$last_name = $_POST['l_name'];
		$user_name = $_POST['u_name'];
		$password = $_POST['ps'];
		$email = $_POST['email'];
		$reg_no = $_POST['reg_no'];
		$phn_no = $_POST['phn'];
		$image = 'blank_pp.png';
		echo $reg_no."<br>"; 
		$sql = "SELECT * FROM user_data WHERE reg_no=$reg_no";
		$result = mysqli_query($conn,$sql);
		if($result)
		{
			$rows = mysqli_num_rows($result);
			echo $rows;
			if($rows==0)
			{
				$sql = "INSERT INTO user_data (first_name,last_name,user_name,password,reg_no,email,phone,image) VALUES ('$first_name','$last_name','$user_name','$password','$reg_no','$email','$phn_no','$image')";
				$result = mysqli_query($conn,$sql);
				if(!$result)
				{
					echo "Could not insert data";
					die(mysqli_error($conn));
				}
				else {
					echo "You have successfully signed up";
				}
				
			}
			else echo "You are already registered";

		}
		else echo mysqli_error($conn);

	}
	else echo "There is a problem";

	


?>