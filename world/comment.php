<?php
session_start();
include '../conn.php';
if(isset($_POST['post_id']) && isset($_POST['value']))
{
	$post_id = trim($_POST['post_id']);
	$comment = trim($_POST['value']);
	$comment_by = $_SESSION['id'];
	//echo "From php $post_id $comment";
	$comment_insert_sql = "INSERT INTO `comment` (`comment`,`comment_by`,`comment_to`) VALUES ('$comment','$comment_by','$post_id')";
	$comment_insert_result = mysqli_query($conn,$comment_insert_sql);
	
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