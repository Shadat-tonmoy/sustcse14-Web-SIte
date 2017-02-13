<?php
include('../conn.php');
/*if(isset($_POST['class_id']))
{
	$class_id = $_POST['class_id'];
	$class_cancel_sql = "DELETE FROM `class_update` WHERE `id`='$class_id'";
	$class_cancel_result = mysqli_query($conn,$class_cancel_sql);
	$affected_row = mysqli_affected_rows($conn);
	if($affected_row>0)
	{
		echo "DONE";
	}

}*/
if(isset($_POST['del']))
{
	//echo "delete kor";
	$delete_sql = "DELETE FROM `class_update`";
	$delete_result = mysqli_query($conn,$delete_sql);
	$affected_row = mysqli_affected_rows($conn);
	echo $affected_row;

}
else if(isset($_POST['course']) && isset($_POST['start_hrs']) && isset($_POST['start_min']) && isset($_POST['end_hrs']) && isset($_POST['end_min']))
{
	$tmp_date = strtotime($_POST['date']);
	$date = date('Y-m-d',$tmp_date);
	$course = $_POST['course'];
	$start_hrs = $_POST['start_hrs'];
	$start_min = $_POST['start_min'];
	$end_hrs = $_POST['end_hrs'];
	$end_min = $_POST['end_min'];
	$venue = $_POST['venue'];
	$start_time = $start_hrs.":".$start_min;
	$end_time = $end_hrs.":".$end_min;
	
	$class_update_sql = "INSERT INTO `class_update`(`date`, `course_name`, `start_time`, `end_time`, `venue`) VALUES ('$date','$course','$start_time','$end_time','$venue')";
	$class_update_result = mysqli_query($conn,$class_update_sql);
	if($class_update_result)
	{
		echo "Success";
	}
	else echo "Mara Khau".mysqli_error($conn);
	//}
}
else echo "VUA";







?>