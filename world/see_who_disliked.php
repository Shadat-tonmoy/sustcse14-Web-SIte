<?php
session_start();
include '../conn.php';
$id=$_SESSION['id'];
if(isset($_POST['post_id']))
{
	$post_id = $_POST['post_id'];
	$post_sql = "SELECT `disliked_by` FROM posts  WHERE `id`='$post_id'";
	$post_result = mysqli_query($conn,$post_sql);
	$row = mysqli_fetch_assoc($post_result);
	$dislikes = $row['disliked_by'];
	$dislike_array = array();
	$dislike_array = explode(',', $dislikes);
	$disliked_by_names = "";
	for($i=1;$i<count($dislike_array);$i++)
	{
		$disliked_by = $dislike_array[$i];
		if($disliked_by==$id)
			$name = "You";
		else 
		{
			$disliked_by_sql = "SELECT `first_name`,`last_name` FROM `user_data` WHERE `id`='$disliked_by'";
			$disliked_by_result = mysqli_query($conn,$disliked_by_sql);
			$row = mysqli_fetch_assoc($disliked_by_result);
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$name = "$first_name $last_name";
		}
		if($disliked_by_names=="")
			$disliked_by_names = $disliked_by_names.$name;	
		else $disliked_by_names = $disliked_by_names."<br>".$name;
	}
	if(strlen($disliked_by_names)==0)
		echo "Nobody disliked it yet...";
	else echo $disliked_by_names."<br>Disliked it";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>