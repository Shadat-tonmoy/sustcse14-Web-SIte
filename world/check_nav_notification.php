
<?php
	session_start();
	include '../conn.php';
	///sinclude 'header.php';
	$user_id = $_SESSION['id'];
	$comment_notification_sql = "SELECT `comment_notification` FROM `user_data` WHERE `id`='$user_id'";
	$comment_notification_result = mysqli_query($conn,$comment_notification_sql);
	$row = mysqli_fetch_assoc($comment_notification_result);
	$comment_notification = $row['comment_notification'];
	//echo $comment_notification;
	$notification_array = array();
	$notification_array = explode(',', $comment_notification);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.thumb_img{
			width: 30px;
			height: 30px;
			border-radius: 50%;
			margin-left: 0%;
			
		}
		.notification_panel{    
			margin-left: 5%;
    		border-left: 3px solid #e67e22;
    		margin-top: 15px;

		}
		.notification_text{
			margin-left: 0%;
			font-size: 12px;
		}
		.notification_time{
    		margin-top: -40px;
    		margin-left: 2px;
    		color: #bdc3c7;
    		font-size: 10px;
		}
		.notification_remove_icon{
			color: red;
			font-weight: bolder;
			margin-left: 20px;
			cursor: pointer;
		}
	</style>
	<script type="text/javascript" src="remove_notification.js"></script>
</head>
<body>
	<?php
	
	for($i=count($notification_array)-1;$i>=1;$i--)
	{
		$id = $notification_array[$i];
		$comment_notification_sql = "SELECT * FROM `comment_notification` WHERE `id`='$id'";
		$comment_notification_result = mysqli_query($conn,$comment_notification_sql);
		$row = mysqli_fetch_assoc($comment_notification_result);
		$commented_to = $row['commented_to'];
		$commented_by = $row['commented_by'];
		$comment_time = $row['time'];

		$comment_time_array = array();
		$comment_time_array = explode(' ', $comment_time);
		$comment_time_date = $comment_time_array[0];
		$comment_time_time = $comment_time_array[1];
		$time_array = array();
		$time_array = explode(':', $comment_time_time);
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
			if($hour!=12)
				$hour = $hour-12;
			if($hour<10)
				$hour = "0".$hour;
		}
		$time = "$hour:$minute $am_pm";
		$date_array = array();
		$date_array = explode('-', $comment_time_date);
		$year = $date_array[0];
		$month = $date_array[1];
		$day = $date_array[2];
		$month_array = array("Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec");
		$month = $month_array[$month-1];
		$date = "$day $month $year";
		//echo "commented_to -> $commented_to || commented_by -> $commented_by || time -> $time <br>";
		$post_detail_sql = "SELECT * FROM `posts` WHERE `id`='$commented_to'";
		$post_detail_result = mysqli_query($conn,$post_detail_sql);
		$row = mysqli_fetch_assoc($post_detail_result);
		$posted_by = $row['posted_by'];
		$post = $row['post'];
		
		$posted_by_detail_sql = "SELECT * FROM `user_data` WHERE `id`='$posted_by'";
		$posted_by_detail_result = mysqli_query($conn,$posted_by_detail_sql);
		$row = mysqli_fetch_assoc($posted_by_detail_result);
		$posted_by_name = $row['first_name']." ".$row['last_name'];
		$posted_by_image = $row['image'];

		$commented_by_detail_sql = "SELECT * FROM `user_data` WHERE `id`='$commented_by'";
		$commented_by_detail_result = mysqli_query($conn,$commented_by_detail_sql);
		$row = mysqli_fetch_assoc($commented_by_detail_result);
		$commented_by_name = $row['first_name']." ".$row['last_name'];
		$commented_by_image = $row['image'];

		if($posted_by==$user_id)
		{
	?>
	<div class="notification_panel col-lg-12 row" id=<?php echo "notification_$id" ?>>
		<div class="col-lg-2" style="margin-left: -5%;margin-top: 20px;">
			<img src=<?php echo "../user_image/$commented_by_image"?> class="thumb_img" >	
		</div>
		<div class="col-lg-10" style="margin-left: -5%;">
			<div class="notification_text row">
				<a href= <?php echo "full_post.php?post_id=$commented_to" ?>>
					<?php echo "$commented_by_name "?> Commented On Your Post <?php echo "<b>\"$post[0]$post[1]$post[2]$post[3]$post[4].....\"</b>"?>
				</a>
				<span class="notification_remove_icon" id=<?php echo "remove_notification_$id" ?> title="Remove Notification"> x </span>
			</div>
			<div class="notification_time row">
				<small>
					<?php echo "$time | $date"?>
				</small>
			</div>			
		</div>
	</div>
	<?php
			//echo "$commented_by_name Commented On Your Post $post <br>";
		}
		else if($posted_by==$commented_by)
		{
	?>
	<div class="notification_panel col-lg-12 row" id=<?php echo "notification_$id"?> >
		<div class="col-lg-2" style="margin-left: -5%;margin-top: 20px;">
			<img src=<?php echo "../user_image/$commented_by_image"?> class="thumb_img" >	
		</div>
		<div class="col-lg-10" style="margin-left: -5%;">
			<div class="notification_text row">
				<a href= <?php echo "full_post.php?post_id=$commented_to" ?> ><?php echo "$commented_by_name "?> Commented On His Post</a>
				<span class="notification_remove_icon" id=<?php echo "remove_notification_$id" ?> title="Remove Notification"> x </span>
			</div>
			<div class="notification_time row">
				<small>
					<?php echo "$time | $date"?>
				</small>
			</div>			
		</div>
	</div>
	<?php
			//echo "$commented_by_name Commented On His Post $post <br>";
		}

		else {
	?>
	<div class="notification_panel col-lg-12 row" id=<?php echo "notification_$id"?> >
		<div class="col-lg-2" style="margin-left: -5%;margin-top: 20px;">
			<img src=<?php echo "../user_image/$commented_by_image"?> class="thumb_img" >	
		</div>
		<div class="col-lg-10" style="margin-left: -5%;">
			<div class="notification_text row">
				<a href= <?php echo "full_post.php?post_id=$commented_to" ?> > <?php echo "$commented_by_name "?> Commented On <?php echo "$posted_by_name 's" ?> Post </a>
				<span class="notification_remove_icon" id=<?php echo "remove_notification_$id" ?> title="Remove Notification"> x </span>
			</div>
			<div class="notification_time row">
				<small>
					<?php echo "$time | $date"?>
				</small>
			</div>			
		</div>
	</div>
	<?php
	
	}
		//echo "post -> $post || posted_by -> $posted_by <br>";



	}



	?>


</body>
</html>
