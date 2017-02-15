<?php
	include '../conn.php';
	if(isset($_POST['notifications_id']))
	{
		$notification_id = $_POST['notifications_id'];
		$notification_fetch_sql = "SELECT * FROM `notification` WHERE `id`='$notification_id'";
		$notification_fetch_result = mysqli_query($conn,$notification_fetch_sql);
		if($notification_fetch_result)
		{
			$row = mysqli_fetch_assoc($notification_fetch_result);
			$notification = trim($row['name']);
			$notification_time = $row['time'];
			$notification_time_array = array();
			$notification_time_array = explode(' ', $notification_time);
			$notification_time_date = $notification_time_array[0];						
			$notification_time_time = $notification_time_array[1];
			$time_array = array();
			$time_array = explode(':', $notification_time_time);
			$am_pm = "AM";
			$hour = $time_array[0];
			$minute = $time_array[1];
			if($hour==0)
			{
				$am_pm = "AM";
				$hour = 12;
			}
			if($hour>12)
			{
				$am_pm = "PM";
				$hour = $hour-12;
				if($hour<10)
				$hour = "0".$hour;
			}
			$time = "$hour:$minute $am_pm";
			$date_array = array();
			$date_array = explode('-', $notification_time_date);
			$year = $date_array[0];
			$month = $date_array[1];
			$day = $date_array[2];
			$month_array = array("Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec");
			$month = $month_array[$month-1];
			$date = "$day $month $year";
			echo "$notification at $time | $date  ";
			
		}
		else echo "Nothing";
	}
?>