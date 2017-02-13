<?php
session_start();
include 'conn.php';
$id = $_SESSION['id'];
if(isset($_POST['fn']) && isset($_POST['ln']) && isset($_POST['un']) && isset($_POST['email']) && isset($_POST['phn'] ))
{
	/*$sql = "SELECT * FROM user_data WHERE `Index`=$id";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		$row = mysqli_fetch_assoc($result);
		echo $row['first_name']."<br>";
		echo $row['last_name']."<br>";
	}*/

	$fname = $_POST['fn'];
	$lname = $_POST['ln'];
	$uname = $_POST['un'];
	$email_id = $_POST['email'];
	$phone = $_POST['phn'];
	///echo "From php is $fn $ln $un $email $phn";
	//$sql = "INSERT INTO user_data (first_name,last_name,user_name,email,phone) VALUES ('$fn','$ln','$un','$email','$phn')";
	$sql = "UPDATE user_data set `first_name`='$fname', `last_name`='$lname', `user_name`='$uname', `email`='$email_id', `phone`='$phone' WHERE `id`=$id ";

	//UPDATE user_data set `first_name`='yg', `last_name`='tonmoy' WHERE `id`=1
	$result = mysqli_query($conn,$sql);
	//echo "result : ".$result;
	if($result)
	{
		echo "Done";
	}
	else echo mysqli_error($conn);
	//echo "From php is $fn $ln $un $email $phn";
}
//echo $id = $_SESSION['id'];


?>