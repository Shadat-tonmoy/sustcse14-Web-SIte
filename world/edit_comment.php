<?php
include '../conn.php';
if(isset($_POST['comment_id']) && isset($_POST['new_comment_value']))
{
	$comment_id = trim($_POST['comment_id']);
	$new_comment_value = trim($_POST['new_comment_value']);
	echo "FROM PHP $comment_id ---> $new_comment_value";
	$update_comment_sql = "UPDATE `comment` SET `comment`='$new_comment_value' WHERE `id`='$comment_id'";
	$update_comment_result = mysqli_query($conn,$update_comment_sql);
	$affected_row = mysqli_affected_rows($conn);
	if($affected_row>0)
	{
		echo "Done";
	}
}


?>