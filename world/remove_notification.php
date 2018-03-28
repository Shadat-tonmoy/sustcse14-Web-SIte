<?php
session_start();
include '../conn.php';
$user_id = $_SESSION['id'];
if(isset($_POST['id']))
{
	$comment_id = $_POST['id'];
	$comment_fetch_sql = "SELECT `comment_notification` FROM `user_data` WHERE `id`='$user_id'";
	$comment_fetch_result = mysqli_query($conn,$comment_fetch_sql);
	$row = mysqli_fetch_assoc($comment_fetch_result);
	$comment_ids = $row['comment_notification'];
	$comment_id_array = array();
	$comment_id_array = explode(',', $comment_ids);

	//print_r($comment_id_array);
	//echo "Before : $comment_ids";
	for($i=count($comment_id_array)-1;$i>=1;$i--)
	{
		if($comment_id_array[$i]==$comment_id)
		{
			unset($comment_id_array[$i]);
			break;
		}
		//echo "$comment_id_array[$i] <br>";
	}
	$updated_comment_ids = implode(',', $comment_id_array);
	//echo "Updated : $updated_comment_ids";
	$updated_comment_ids_sql = "UPDATE `user_data` SET `comment_notification`='$updated_comment_ids' WHERE `id`='$user_id'";
	$updated_comment_ids_result = mysqli_query($conn,$updated_comment_ids_sql);
}


?>