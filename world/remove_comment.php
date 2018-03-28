<?php
include '../conn.php';
if(isset($_POST['comment_id']))
{
	$comment_id = $_POST['comment_id'];
	$comment_remove_sql = "DELETE FROM `comment` WHERE `id`='$comment_id'";
	$comment_remove_result = mysqli_query($conn,$comment_remove_sql);
	$affected_row = mysqli_affected_rows($conn);
	if($affected_row>0)
	{
		echo "Removed";
	}

}


?>