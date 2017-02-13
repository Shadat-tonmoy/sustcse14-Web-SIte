<?php
include '../conn.php';
//$delete_sql = "DELETE FROM `exam_update`";
//$delete_sql_result = mysqli_query($delete_sql);
if(isset($_POST['date']) && isset($_POST['course']))
{
	$date = $_POST['date'];
	$course = $_POST['course'];
	echo "From php $date $course";
	$update_sql = "UPDATE `exam_update` SET `date`='$date' WHERE `course_name`='$course'";
	$update_sql_result = mysqli_query($conn,$update_sql);
	$affected_rows = mysqli_affected_rows($conn);
	echo $affected_rows;
	if($affected_rows==0)
	{
		$insert_sql = "INSERT INTO `exam_update` (`date`,`course_name`) VALUES ('$date','$course')";
		$insert_sql_result = mysqli_query($conn,$insert_sql);
		if($insert_sql_result)
		{
			echo "Success";
		}
		else echo mysqli_error($conn);

	}
}


?>