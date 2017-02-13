<?php
session_start();
include '../conn.php';
if(isset($_POST['status_btn']) && isset($_POST['post']) && !empty($_POST['post']))
{
	$posted_at = date("Y-m-d H:i:s");
	$id = $_SESSION['id'];
	$post = $_POST['post'];
	echo "You have posted ".$post;
	$sql = "INSERT INTO posts (`post`,`posted_by`,`posted_at`) VALUES ('$post','$id','$posted_at')";
	$result = mysqli_query($conn,$sql);
	if($result)
	{
		$sql_new = "UPDATE new_post SET new_post=1";
		$result_new = mysqli_query($conn,$sql_new);
		header("Location: world.php");
	}
	else echo mysqli_error($conn);
}
?>