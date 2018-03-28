<?php
session_start();
include '../conn.php';
if(isset($_POST['post_id']) && isset($_POST['value']))
{
	$time = date("Y-m-d H:i:s");
	$date = date("Y-m-d");
	$post_id = trim($_POST['post_id']);
	$comment = trim($_POST['value']);
	$comment_by = $_SESSION['id'];
	//echo "From php $post_id $comment";
	$comment_insert_sql = "INSERT INTO `comment` (`comment`,`comment_by`,`comment_to`) VALUES ('$comment','$comment_by','$post_id')";
	$comment_insert_result = mysqli_query($conn,$comment_insert_sql);

	$comment_by_insert_sql = "UPDATE `posts` SET `commented_by` = IFNULL(concat(`commented_by`,',$comment_by'),',$comment_by') WHERE `id`=$post_id";
	$comment_by_insert_result = mysqli_query($conn,$comment_by_insert_sql); 

	$commented_by_sql = "SELECT `commented_by`,`posted_by` FROM `posts` WHERE `id`='$post_id'";
	$commented_by_result = mysqli_query($conn,$commented_by_sql);
	$row = mysqli_fetch_assoc($commented_by_result);
	$posted_by = $row['posted_by'];
	$commented_by = $row['commented_by'];

	$comment_notification_sql = "INSERT INTO `comment_notification` (`commented_to`,`commented_by`,`time`,`date`) VALUES ('$post_id','$comment_by','$time','$date') ";
	$comment_notification_result = mysqli_query($conn,$comment_notification_sql);
	$comment_notification_fetch_sql = "SELECT * FROM `comment_notification` ORDER BY `id` DESC LIMIT 1";
	$comment_notification_fetch_result = mysqli_query($conn,$comment_notification_fetch_sql);
	$row = mysqli_fetch_assoc($comment_notification_fetch_result);
	$last_comment_id = $row['id'];
	//echo $last_comment_id;
	//if($comment_notifiction_result)
		//echo "DONE";
	//else echo mysqli_error($conn);
	//echo "POSTED BY -> $posted_by, COMMENTED_BY -> $commented_by";
	if($posted_by!=$comment_by)
	{
		$comment_notification_user_sql = "UPDATE `user_data` SET `comment_notification` = IFNULL(concat(`comment_notification`,',$last_comment_id'),',$last_comment_id') WHERE `id`=$posted_by";
		$comment_notification_user_result = mysqli_query($conn,$comment_notification_user_sql);

		$new_comment_notification_user_sql = "UPDATE `user_data` SET `unseen_notification` = IFNULL(concat(`unseen_notification`,',$last_comment_id'),',$last_comment_id') WHERE `id`=$posted_by";
		$new_comment_notification_user_result = mysqli_query($conn,$new_comment_notification_user_sql);
		//echo "posted_by!=comment_by";
	}
	//updaet_notification_for_posted_by
	
	
	$commented_by_array = array();
	$commented_by_array = explode(',', $commented_by);
	$commented_by_set = array();
	$commented_by_set = array_unique($commented_by_array);
	foreach ($commented_by_set as $key => $value) {
		//echo " <br> in set : $value";
		$user = $value; 
		//echo "$user <br>";
		if($user!=$comment_by && $user!=$posted_by && $user!=NULL)
		{
			$comment_notification_user_sql = "UPDATE `user_data` SET `comment_notification` = IFNULL(concat(`comment_notification`,',$last_comment_id'),',$last_comment_id') WHERE `id`=$user";
			$comment_notification_user_result = mysqli_query($conn,$comment_notification_user_sql);

			$new_comment_notification_user_sql = "UPDATE `user_data` SET `unseen_notification` = IFNULL(concat(`unseen_notification`,',$last_comment_id'),',$last_comment_id') WHERE `id`=$user";
			$new_comment_notification_user_result = mysqli_query($conn,$new_comment_notification_user_sql);
			//echo "Other thing - $user and $posted_by ";
		}
	}
	
	
}
$user_array = array(array());
$user_data_sql = "SELECT * FROM `user_data`";
$user_data_result = mysqli_query($conn,$user_data_sql);
$no_of_user = mysqli_affected_rows($conn);
if($user_data_result)
{
	while($row = mysqli_fetch_assoc($user_data_result))
	{
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$image = $row['image'];
		$id = $row['id'];
		$user_array[$id]['name'] = $first_name." ".$last_name;
		$user_array[$id]['image'] = $image;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="remove_comment.js"></script>
</head>
<body>

<?php
	if(isset($_POST['post_id']))
	{
		$post_id = $_POST['post_id'];
		$comment_fetch_sql = "SELECT * FROM `comment` WHERE `comment_to`='$post_id' ORDER BY `id` DESC";
		$comment_fetch_result = mysqli_query($conn,$comment_fetch_sql);
		$num_rows = mysqli_num_rows($comment_fetch_result);
		if($num_rows==0)
		{
			$remove_commented_by_sql = "UPDATE `posts` SET `commented_by`= NULL WHERE `id`=$post_id";
			$remove_commented_by_result = mysqli_query($conn,$remove_commented_by_sql);
		}
		while($row = mysqli_fetch_assoc($comment_fetch_result))
		{
			$comment = nl2br($row['comment']);
			$comment_id = $row['id'];
			$comment_by = $row['comment_by'];
			$user_id = $_SESSION['id'];
?>
	<div class="col-lg-12" style="border-left: 2px solid red" id=<?php echo "comment_$comment_id"?>>
		<br>
		<div class="col-lg-4">
			<?php 
				$image = $user_array[$comment_by]['image'];
				$name = $user_array[$comment_by]['name'];
			 ?>
			 <img src=<?php echo "../user_image/$image" ?> width="35px"; height="35px" >
			 <span style="font-weight: bold;">
			 	<?php 

			 	echo $name

			 	?><br>
			 	<span style="display: block;margin-left: 25%;margin-top: -15px;font-size: 11px;font-weight: normal;color: #7f8c8d;letter-spacing: 2px;font-style: italic;">commented : <span> 
			 </span>
		</div>

		<div class="col-lg-8">
			<div class="col-lg-12" style="margin-left: -15%;display: block;margin-top: 5px; color:#34495e" id=<?php echo "comment_value_$comment_id"; ?> >
					<p style=""><?php echo "$comment"; ?></p>
			</div>
			<?php
			//echo "$comment_by $user_id";
				if($user_id==$comment_by)
				{
			?>
			<span class="glyphicon glyphicon-remove-sign pull-right comment_remove_btn" style="font-size: 15px;color: #e74c3c;display: inline-block;left: 1%; cursor: pointer;" id=<?php echo "comment_remove_$comment_id"; ?> >
			</span>
			<span class="glyphicon glyphicon-edit pull-right comment_edit_btn" style="color:#2980b9; font-size: 15px;" id=<?php echo "comment_edit_$comment_id"; ?> >
			</span>
			<div class="form-group comment_edit_div" style="margin-top: 15px;" id=<?php echo "comment_edit_div_$comment_id" ?>>
				<textarea class="form-control comment_edit_box" rows="1" id=<?php echo "comment_edit_box_$comment_id"?> style="resize: none;resize: none;margin-top: -15px;width: 110%;margin-left: -40px;"  ></textarea>
				<div style="margin-top: 15px;">
  					<button class="btn btn-primary btn-xs pull-right" style="margin-left: 10px;" id=<?php echo "done_editing_$comment_id"?> >Done Editing</button>
  					<button class="btn btn-danger btn-xs pull-right" id=<?php echo "cancel_editing_$comment_id" ?>>Cancel</button>	
  				</div>
			</div>
			<?php 
				}
			?>
		</div>		
	</div>
<?php
		}
	}
?>

</body>
</html>