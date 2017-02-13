<?php
	//session_start();
	include 'conn.php';
	echo "<br><br><br>";
	if(isset($_POST['user_name']) && isset($_POST['pwd']))
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['pwd'];
		$password_hash = md5($password);
		$sql = "SELECT * FROM user_data WHERE user_name='$user_name' AND password='$password_hash'";
		$result = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($result);
		if($rows)
		{
			$row=mysqli_fetch_assoc($result);
			$first = $row['first_name'];
			$last = $row['last_name'];
			$email = $row['email'];
			$id = $row['id'];
			if(isset($_REQUEST['remember']) && $_REQUEST['remember']==1)
			{
				$cookie_name = "remember";
				$cookie_value = $id;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //
				header ("Location: index.php");
			}
			else {
				session_start();
				$_SESSION['id']=$id;
				echo $_SESSION['id'];
				header ("Location: index.php");
			}
		}
		else header("Location: login_error.php");
	}
	
?>
