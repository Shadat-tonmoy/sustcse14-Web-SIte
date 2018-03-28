<?php
session_start();
include '../conn.php';
$id=$_SESSION['id'];
if(isset($_POST['post_id']))
{
	$post_id = $_POST['post_id'];
	$post_sql = "SELECT `liked_by` FROM posts  WHERE `id`='$post_id'";
	$post_result = mysqli_query($conn,$post_sql);
	$row = mysqli_fetch_assoc($post_result);
	$likes = $row['liked_by'];
	$like_array = array();
	$like_array = explode(',', $likes);
	$liked_by_names = "";
	for($i=1;$i<count($like_array);$i++)
	{
		$liked_by = $like_array[$i];
		if($liked_by==$id)
			$name = "You";
		else 
		{
			$liked_by_sql = "SELECT `first_name`,`last_name` FROM `user_data` WHERE `id`='$liked_by'";
			$liked_by_result = mysqli_query($conn,$liked_by_sql);
			$row = mysqli_fetch_assoc($liked_by_result);
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$name = "$first_name $last_name";
		}
		if($liked_by_names=="")
			$liked_by_names = $liked_by_names.$name;	
		else $liked_by_names = $liked_by_names."<br>".$name;
	}
	if(strlen($liked_by_names)==0)
		echo "Nobody liked it yet...";
	else echo $liked_by_names."<br>Liked it";
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