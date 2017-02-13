
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
session_start();
include '../conn.php';
if(isset($_POST['course_name']) && isset($_POST['author_name']) && isset($_POST['link']) && isset($_POST['type']) && isset($_POST['desc']))
{
	$course_name = $_POST['course_name'];
	$author_name = $_POST['author_name'];
	$link = $_POST['link'];
	$type = $_POST['type'];
	$desc = $_POST['desc'];
	$id = $_SESSION['id'];
	$note_update_sql = "INSERT INTO `notes` (`course_name`,`author`,`link`,`type`,`added_by`,`description`) VALUES ('$course_name','$author_name','$link','$type','$id','$desc')";
	$note_update_sql_result = mysqli_query($conn,$note_update_sql);
	if($note_update_sql_result)
	{
		

?>

<div style="width: 100%;background-color: #1abc9c;color: white; margin: auto; padding: 85px;">
	<center>
		<h4>Your Note Has Successfully Updated</h4>
		<br>
		<span style="display: block;height: 45px;border: 1px solid white;border-radius: 10px;width: 36%;line-height: 45px;
    font-size: 12px;">
			Select Semester To Share More Notes
		</span>
	</center>
</div>

<?php
	}
	else echo mysqli_error($conn);
	//echo "FROM PHP $course_name -> $author_name -> $link -> $type -> $id";

}



?>


</body>
</html>