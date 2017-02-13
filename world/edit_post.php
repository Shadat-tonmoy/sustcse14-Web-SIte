<?php
include '../conn.php';
if(isset($_POST['post_id']) && isset($_POST['new_post_value']))
{
	$post_id = trim($_POST['post_id']);
	$new_post_value = trim($_POST['new_post_value']);
	echo "From PHP $post_id -> $new_post_value";
	$edit_post_sql = "UPDATE `posts` SET `post`='$new_post_value' WHERE `id`='$post_id'";
	$edit_post_result = mysqli_query($conn,$edit_post_sql);
	$affected_row = mysqli_affected_rows($conn);
	if($affected_row>0)
	{
		echo "Updated";
	}
}



?>