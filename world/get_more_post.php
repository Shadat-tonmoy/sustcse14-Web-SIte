<?php
	session_start();
	include '../conn.php';
	$id = $_SESSION['id'];
	if(isset($_POST['lastID']))
	{
		$lastID = $_POST['lastID'];
		//echo "From php last id is $lastID";
	}
	else echo "NOT SET";
	$sql = "SELECT * FROM `user_data` WHERE id=$id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$user_name = $row['user_name'];
	$image = $row['image'];
	$liked_posts = $row['liked_posts'];
	$disliked_posts = $row['disliked_posts'];
	$liked_posts_array = array();
	$liked_posts_array = explode(',', $liked_posts);
	$visited =array();

	$disliked_posts_array = array();
	$disliked_posts_array = explode(',', $disliked_posts);
	$visited_dislike =array();


for($i=1;$i<count($liked_posts_array);$i++)
{
	$visited[$liked_posts_array[$i]] = 1;
}

for($i=1;$i<count($disliked_posts_array);$i++)
{
	$visited_dislike[$disliked_posts_array[$i]] = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="see_who_liked.js"></script>
	<style>
.toooltip {
    position: relative;
    display: inline-block;
}

.toooltip .toooltiptext {
    visibility: hidden;
    width: 8vw;
    background-color: #000000;
    color: #fff;
    text-align: left;
    border-radius: 4px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -160%;
    opacity: 0;
    transition: opacity 1s;
    font-size: 0.8vw;
}

.toooltip .toooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 80%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #000000 transparent transparent transparent;
}

.toooltip:hover .toooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>
</head>
<body>
			<?php
				$post_sql = "SELECT * FROM posts  WHERE `id`< $lastID ORDER BY posted_at DESC LIMIT 10 ";
				$post_result = mysqli_query($conn,$post_sql);
				if($post_result)
				{
					while ($post_row=mysqli_fetch_assoc($post_result)) 
					{
						$post_id = $post_row['id'];
						$post = nl2br($post_row['post']);
						$posted_by = $post_row['posted_by'];
						$posted_at = $post_row['posted_at'];
						$posted_at_array = array();
						$posted_at_array = explode(' ', $posted_at);
						$posted_at_date = $posted_at_array[0];
						$posted_at_time = $posted_at_array[1];
						$time_array = array();
						$time_array = explode(':', $posted_at_time);
						$am_pm = "AM";
						$hour = $time_array[0];
						$minute = $time_array[1];
						if($hour>12)
						{
							$am_pm = "PM";
							$hour = $hour-12;
							if($hour<10)
								$hour = "0".$hour;
						}
						if($hour==0)
						{
							$am_pm = "AM";
							$hour = 12;

						}
						$time = "$hour:$minute $am_pm";
						$date_array = array();
						$date_array = explode('-', $posted_at_date);
						$year = $date_array[0];
						$month = $date_array[1];
						$day = $date_array[2];
						$month_array = array("Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec");
						$month = $month_array[$month-1];
						$date = "$day $month $year";

						$likes = $post_row['liked_by'];
						$like_array = array();
						$like_array = explode(',', $likes);
						$number_of_like = count($like_array)-1;

						$dislikes = $post_row['disliked_by'];
						$dislike_array = array();
						$dislike_array = explode(',', $dislikes);
						$number_of_dislike = count($dislike_array)-1;

						$posted_by_sql = "SELECT * FROM user_data WHERE id=$posted_by";
						$posted_by_result = mysqli_query($conn,$posted_by_sql);
						if($posted_by_result)
						{
							$posted_by_row = mysqli_fetch_assoc($posted_by_result);
							$posted_by_first_name = $posted_by_row['first_name'];
							$posted_by_last_name = $posted_by_row['last_name'];
							$posted_by_image = $posted_by_row['image'];

						}
					?>
					<div class="row panel panel-body" style="border-left:3px solid #e67e22" id=<?php echo "post_$post_id"?> >
						<div class='row'>
							<div class='col-lg-1 col-md-1 col-sm-1 col-xs-1'>
								<img class='posted_by_img' src=<?php echo "../user_image/$posted_by_image" ?> /> 
							</div>
							<div class='col-lg-11 col-md-11 col-sm-11 col-xs-11'>
								<span style='margin-top: 0px; display: inline-block;'>
									<strong style="font-size: 0.9vw"><?php echo "$posted_by_first_name $posted_by_last_name" ?></strong> <span style="font-size: 0.9vw">says</span><br>
								</span>
								<?php
									if($posted_by == $id)
									{

								?>
								<span class="glyphicon glyphicon-remove-sign pull-right post_remove_btn" style="font-size: 20px;    color: #e74c3c;display: inline-block;left: 1%;" data-toggle="tooltip" title="Remove Your Post" id=<?php echo "post_remove_$post_id"?> >
								</span>
								<span class="glyphicon glyphicon-edit pull-right post_edit_btn" style="color:#2980b9; font-size: 20px;" data-toggle="tooltip" title="Edit Your Post" id=<?php echo "post_edit_$post_id"?> >
									
								</span>
								<?php
									}
								?>
								<br>
								<small style='color:#95a5a6;font-size: 0.9vw'> <?php echo "$time | $date"  ?></small>
							</div>		
						</div>
						<div class='row' style='margin-top:10px; margin-left:5px; text-align:justify '>
							<p class='post' id=<?php echo "posttext_$post_id"?> >
								<?php echo "$post" ?>
							</p>
							<div class="form-group post_edit_div" style="margin-top: 15px;" id=<?php echo "post_edit_div_$post_id" ?> >
  								<textarea class="form-control post_edit_box" rows="1" id=<?php echo "post_edit_box_$post_id"?> style="resize: none;" placeholder="Write Your Comment Here"></textarea>
  								<div style="margin-top: 15px;">
  									<button class="btn btn-primary btn-xs pull-right" style="margin-left: 10px;" id=<?php echo "done_editing_$post_id"?> >Done Editing</button>
  									<button class="btn btn-danger btn-xs pull-right" id=<?php echo "cancel_editing_$post_id" ?>>Cancel</button>	
  								</div>
  								
							</div>
						</div>
					</div>

					<div class='panel panel-body row' style='border-left:3px solid #7f8c8d; margin-top:-18px' id=<?php echo "ldc_$post_id"?>>
						<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4 ldc'>
							<img class='ldc_img' src='images/like.png' id=<?php echo "img-like_$post_id" ?> />
					<?php
						if(isset($visited[$post_id]))
						{
					?>
					<span class='ldc_txt liked toooltip toooltip_like' id=<?php echo "txt-like_$post_id" ?> >
						<span id=<?php echo "liked_$post_id"; ?> ac >Liked</span>
						<span class="toooltiptext" id=<?php echo "tooltip_text_$post_id"?> >
							Loading...
						</span>
					</span>

					<span class='badge' style="font-size: 0.9vw"  id=<?php echo "like_count_$post_id" ?> > <?php echo $number_of_like ?> </span>
					<?php 

						}
						else{
					?>
					<span class='ldc_txt toooltip toooltip_like' id=<?php echo "txt-like_$post_id" ?> >
						<span id=<?php echo "like_$post_id"; ?> ac > Like </span>
						<span class="toooltiptext" id=<?php echo "tooltip_text_$post_id"?> >
							Loading...
						</span>
					</span> 

					<span class='badge' style="font-size: 0.9vw" id=<?php echo "like_count_$post_id"?> > <?php echo $number_of_like ?> </span>

					<?php
							}
					?>

						</div>



						<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4 ldc'>
							<img class='ldc_img img' src='images/dislike.png' id=<?php echo "img-dislike_$post_id" ?> />
					<?php
						if(isset($visited_dislike[$post_id]))
						{
					?>
					<span class='ldc_txt disliked toooltip toooltip_dislike' id=<?php echo "txt-dislike_$post_id" ?> >
						Disliked
						<span class="toooltiptext" id=<?php echo "tooltip_text_dislike_$post_id"?> >
						Loading...
						</span>
					</span>
					<span class='badge' style="font-size: 0.9vw"  id=<?php echo "dislike_count_$post_id" ?> > <?php echo $number_of_dislike ?> </span>
					<?php 

						}
						else{
					?>
					<span class='ldc_txt toooltip toooltip_dislike' id=<?php echo "txt-dislike_$post_id" ?> >
						Disike
						<span class="toooltiptext" id=<?php echo "tooltip_text_dislike_$post_id"?> >
						Loading...
						</span>
					</span>
					<span class='badge' style="font-size: 0.9vw"  id=<?php echo "dislike_count_$post_id"?> > <?php echo $number_of_dislike ?> </span>

					<?php
							}
					?>

						</div>

						
						<div class='col-lg-4 col-md-4 col-sm-4 col-xs-4'>
							<img class='ldc_img' src='images/comment.png'/>
							<span class='toooltip ldc_txt comment_btn' id=<?php echo "comment_btn_$post_id"; ?> >
								Comments
								<span class="toooltiptext" >
									View All Comments
								</span>
							</span> 
						</div>
						
						<div class="form-group comment_div" style="margin-top: 15px;" id=<?php echo "comment_div_$post_id" ?>>
						<br>
  							<textarea class="form-control comment_box" rows="2" id=<?php echo "comment_box_$post_id"?> style="resize: none;" placeholder="Write Your Comment Here"></textarea>
  							<br>
  							<div id=<?php echo "comment_list_div_$post_id" ?>>
  								
  							</div>
						</div>
					</div>
					
					<?php 
				}

					?>
					<div>         
			          <center>
			            <button class="btn btn-default load_more_posts" lastId = <?php if(isset($post_id)) echo $post_id; else echo NULL; ?> > More Posts</button>
			          </center>
			          <center class="more_post_loader">
			            <img src="images/loading.gif" style="width: 60px; height: 60px;">
			          </center>
        			</div>

				<?php
			}
				else {

				?>
				<h2 style="display:block;text-align: center;color: white;background: #c0392b;height: 50px;line-height: 50px;">No More Posts Available..</h2>

			<?php
					}
			?>
			

</body>
</html>