<?php
include '../conn.php';
if(isset($_POST['id']))
{
	$post_removed = false;
	$comment_removed = false;
	$id = $_POST['id'];
	$remove_post_sql = "DELETE FROM `posts` WHERE `id`='$id'";
	$remove_post_result = mysqli_query($conn,$remove_post_sql);
	$affected_row = mysqli_affected_rows($conn);
	if($affected_row>0)
		$post_removed = true;
	$remove_comment_sql = "DELETE FROM `comment` WHERE `comment_to`='$id'";
	$remove_comment_result = mysqli_query($conn,$remove_comment_sql);
	$affected_row = mysqli_affected_rows($conn);
	if($affected_row>0)
	{
		$comment_removed = true;
	}
	else echo mysqli_error($conn);
	if($post_removed && $comment_removed)
		echo "Removed";
	else echo mysqli_error($conn);

}



?>