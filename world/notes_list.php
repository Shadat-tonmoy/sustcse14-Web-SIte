<?php
session_start();
include '../conn.php';
if(isset($_POST['course']))
{
	$course = trim($_POST['course']);
	$note_sql = "SELECT *  FROM `notes` WHERE `course_name`='$course'";
	$note_sql_result = mysqli_query($conn,$note_sql);
	$rows = mysqli_affected_rows($conn);
	$catagory_array = array(array());
	$course_array = array();
	$login_id = $_SESSION['id'];
	if($note_sql_result)
	{
		$i=0;
		$j=0;
		$k=0;
		$l=0;
		$btn_cnt= 0;
		$note_count = 0;
		$reff_book_count = 0;
		$sample_question_count = 0;
		$others_count = 0;
		$color_array = array("#e67e22","#27ae60","#2980b9","#f39c12","#c0392b","#16a085","#8e44ad");
		while($row=mysqli_fetch_assoc($note_sql_result))
		{
			$course_title = trim($row['course_name']);
			$author = trim($row['author']);
			$link = trim($row['link']);
			$type = trim($row['type']);
			$added_by = trim($row['added_by']);
			$desc = trim($row['description']);
			$course_id = trim($row['id']);
			if($type=="Class Notes")
			{
				$course_array["name"] = $course_title;
				$course_array["author"] = $author;
				$course_array["link"] = $link;
				$course_array["added_by"] = $added_by;
				$course_array["desc"] = $desc;
				$course_array["id"] = $course_id;
				$catagory_array["Class Note$i"]=$course_array;
				$i++;
				$note_count++;
			}
			else if($type=="Reff. Book")
			{
				$course_array["name"] = $course_title;
				$course_array["author"] = $author;
				$course_array["link"] = $link;
				$course_array["added_by"] = $added_by;
				$course_array["desc"] = $desc;
				$course_array["id"] = $course_id;
				$catagory_array["Reff. Book$j"]=$course_array;
				$j++;
				$reff_book_count++;
			}
			else if($type=="Sample Question")
			{
				$course_array["name"] = $course_title;
				$course_array["author"] = $author;
				$course_array["link"] = $link;
				$course_array["added_by"] = $added_by;
				$course_array["desc"] = $desc;
				$course_array["id"] = $course_id;
				$catagory_array["Sample Question$k"]=$course_array;
				$k++;
				$sample_question_count++;
			}
			else if($type=="Others")
			{
				$course_array["name"] = $course_title;
				$course_array["author"] = $author;
				$course_array["link"] = $link;
				$course_array["added_by"] = $added_by;
				$course_array["desc"] = $desc;
				$course_array["id"] = $course_id;
				$catagory_array["Others$l"]=$course_array;
				$l++;
				$others_count++;
			}
			//echo "<h2 style='background-color:white;'>$course_title $author $link $type $added_by</h2>";
		}
	}
	else echo "<h2 style='background-color:white;'>Problem</h2>";
	//echo $course_name;
}
else $course_name = "ERROR IN COURSE NAME";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-6" id="note_bg" style="background-image: url(images/note.png);background-repeat: no-repeat;width: 280px;height: 280px;margin-left: 15%;margin-top: 30px;padding: 0px;">
					<div class="foreground" id="note_fg">
						<br>
						<center>
							<img src="images/note.png" class="img_fg">
						</center>
						<h3 class="foreground_text">Get All The Class Notes </h3>
					</div>
					
				</div>
				<div class="col-lg-6" id="book_bg" style="background-image: url(images/book.png);background-repeat: no-repeat;width: 280px;height: 280px;margin-left: 15%;margin-top: 30px;padding: 0px;">
					<div class="foreground" id="book_fg">
						<br>
						<center>
							<img src="images/book.png" class="img_fg">
						</center>
						<h3 class="foreground_text">Get All The Referrence Book</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-lg-12">
				<div class="col-lg-6" id="question_bg" style="background-image: url(images/question.png);background-repeat: no-repeat;width: 280px;height: 280px;margin-left: 15%;margin-top: 30px;padding: 0px;">
					<div class="foreground" id="question_fg">
						<br>
						<center>
							<img src="images/question.png" class="img_fg">
						</center>
						<h3 class="foreground_text">Get Sample Question</h3>
					</div>
					
				</div>
				<div class="col-lg-6" id="others_bg" style="background-image: url(images/other.png);background-repeat: no-repeat;width: 280px;height: 280px;margin-left: 15%;margin-top: 30px;padding: 0px;">
					<div class="foreground" id="others_fg">
						<br>
						<center>
							<img src="images/other.png" class="img_fg">
						</center>
						<h3 class="foreground_text">Get Other Stuff</h3>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div id="class_note_final" class="col-lg-12">
				<?php 
					if($note_count>0)
					{
				?>
				<span class="note_table_header"> Grab All You Need </span>
				<br>
				<table class="table" style="color:white;padding: 20px;width: 90%;margin-left: 5%;">
					<tr>
						<th>Author</th>
						<th>Download Link</th>
						<th>Description</th>
						<th>Manage Stuff</th>
					</tr>

				<?php
				foreach ($catagory_array as $key => $course_array) {
					//echo $key;
					if($key[0]=='C')
					{
						$author_found = false;
						$link_found = false;
						$desc_found = false;
						$id_found = false;

						foreach ($course_array as $key => $value) {
						if($key=="author")
						{
							$author = $value;
							$author_found = true;
				
						}
						else if($key=="link")
						{
							$link = $value;
							$link_found = true;

						}
						else if($key=="desc")
						{
							$desc = $value;
							$desc_found = true;
							if($desc=="")
								$desc = "N/A";

						}
						else if($key=="id")
						{
							$id = $value;
							$id_found=true;
						}
						if($author_found && $link_found && $desc_found && $id_found)
						{
				?>
				<tr>
					<?php $ran_num = rand(0,6);?>
					<td style="line-height: 40px;"> <span class="author_icon" style="background-color: <?php echo $color_array[$ran_num]; ?>" ><?php echo $author[0]; ?></span><?php echo $author?>
					</td>
					<td>
						<a href=<?php echo $link?> ><img src="images/download.png"; width="40px"; height="40px";></a>
					</td>
					<td style="line-height: 40px;"><?php echo $desc?></td>
					<?php 
						if($login_id==$added_by)
						{
							$btn_cnt++;
					?>
					<td><button class="btn btn-danger note_remove_btn" id=<?php echo "$id"?>> Remove X</button></td>
					<?php

						}
						else 
						{
					?>
					<td><button class="btn btn-danger disabled" style="opacity: 0.5">Remove X</button></td>
					<?php
						}
					?>
					
				</tr>
				<?php
							$author_found = false;
							$link_found = false;
							$desc_found = false;
							$id_found = false;
				
						}	# code...
					}
				}
			}
				?>
				</table>
				<?php 
					}
					else {
						?>
						<center>
							<br><br>
							<img src="images/nothing_found.png" width="150px"; height="150px";>
							<br><br>
							<span class="nothing_found_msg">Sorry!!!Nothing Found in this Catagory</span>
						</center>
				<?php
					}
				?>				
		</div>

		<div id="reff_book_final" class="col-lg-12" style="background-color: #34495e; color:white;">
				<?php 
					if($reff_book_count>0)
					{
				?>

				<span class="note_table_header"> Grab All You Need </span>
				<br>
				<table class="table" style="color:white;padding: 20px;width: 90%;margin-left: 5%;">
					<tr>
						<th>Author</th>
						<th>Download Link</th>
						<th>Description</th>
						<th>Manage Stuff</th>
					</tr>

				<?php
				foreach ($catagory_array as $key => $course_array) {
					//echo $key;
					if($key[0]=='R')
					{
						$author_found = false;
						$link_found = false;
						$desc_found = false;
						$id_found = false;

						foreach ($course_array as $key => $value) {
						if($key=="author")
						{
							$author = $value;
							$author_found = true;
				
						}
						else if($key=="link")
						{
							$link = $value;
							$link_found = true;

						}
						else if($key=="desc")
						{
							$desc = $value;
							$desc_found = true;
							if($desc=="")
								$desc = "N/A";

						}
						else if($key=="id")
						{
							$id = $value;
							$id_found=true;
						}
						if($author_found && $link_found && $desc_found && $id_found)
						{
				?>
				<tr>
					<?php $ran_num = rand(0,6);?>
					<td style="line-height: 40px;"> <span class="author_icon" style="background-color: <?php echo $color_array[$ran_num]; ?>" ><?php echo $author[0]; ?></span><?php echo $author?>
					</td>
					<td>
						<a href=<?php echo $link?> ><img src="images/download.png"; width="40px"; height="40px";></a>

					</td>
					<td style="line-height: 40px;"><?php echo $desc?></td>
					<?php 
						if($login_id==$added_by)
						{
							$btn_cnt++;
					?>
					<td><button class="btn btn-danger note_remove_btn" id=<?php echo "$id"?> > Remove X</button></td>
					<?php

						}
						else 
						{
					?>
					<td><button class="btn btn-danger disabled" style="opacity: 0.5">Remove X</button></td>
					<?php
						}
					?>
				</tr>
				<?php
							$author_found = false;
							$link_found = false;
							$desc_found = false;
							$id_found=false;
				
						}	# code...
					}
				}
			}
				?>
				</table>
				<?php 
					}
					else {
				?>
						<center>
							<br><br>
							<img src="images/nothing_found.png" width="150px"; height="150px";>
							<br><br>
							<span class="nothing_found_msg" id="noti">Sorry!!!Nothing Found in this Catagory</span>
						</center>
				<?php
					}
				?>				
		</div>

		<div id="sample_question_final" class="col-lg-12" style="background-color: #34495e; color:white;">
				<?php 
					if($sample_question_count>0)
					{
				?>
				<span class="note_table_header"> Grab All You Need </span>
				<br>
				<table class="table" style="color:white;padding: 20px;width: 90%;margin-left: 5%;">
					<tr>
						<th>Author</th>
						<th>Download Link</th>
						<th>Description</th>
						<th>Manage Stuff</th>
					</tr>

				<?php
				foreach ($catagory_array as $key => $course_array) {
					//echo $key;
					if($key[0]=='S')
					{
						$author_found = false;
						$link_found = false;
						$desc_found = false;
						$id_found = false;

						foreach ($course_array as $key => $value) {
						if($key=="author")
						{
							$author = $value;
							$author_found = true;
				
						}
						else if($key=="link")
						{
							$link = $value;
							$link_found = true;

						}
						else if($key=="desc")
						{
							$desc = $value;
							$desc_found = true;
							if($desc=="")
								$desc = "N/A";

						}
						else if($key=="id")
						{
							$id = $value;
							$id_found=true;
						}
						if($author_found && $link_found && $desc_found && $id_found)
						{
				?>
				<tr>
					<?php $ran_num = rand(0,6);?>
					<td style="line-height: 40px;"> <span class="author_icon" style="background-color: <?php echo $color_array[$ran_num]; ?>" ><?php echo $author[0]; ?></span><?php echo $author?>
					</td>
					<td>
						<a href=<?php echo $link?> ><img src="images/download.png"; width="40px"; height="40px";></a>

					</td>
					<td style="line-height: 40px;"><?php echo $desc?></td>

					<?php 
						if($login_id==$added_by)
						{
							$btn_cnt++;
					?>
					<td><button class="btn btn-danger note_remove_btn" id=<?php echo "$id"?>> Remove X</button></td>
					<?php

						}
						else 
						{
					?>
					<td><button class="btn btn-danger disabled" style="opacity: 0.5">Remove X</button></td>
					<?php
						}
					?>
				</tr>
				<?php
							$author_found = false;
							$link_found = false;
							$desc_found = false;
							$id_found = false;
				
						}	# code...
					}
				}
			}
				?>
				</table>
				<?php
					}
					else {
				?>
						<center>
							<br><br>
							<img src="images/nothing_found.png" width="150px"; height="150px";>
							<br><br>
							<span class="nothing_found_msg">Sorry!!!Nothing Found in this Catagory</span>
						</center>
				<?php
					}

				?>				
		</div>

		<div id="others_final" class="col-lg-12" style="background-color: #34495e; color:white;">
				<?php 
					if($others_count>0)
					{
				?>
				<span class="note_table_header"> Grab All You Need </span>
				<br>
				<table class="table" style="color:white;padding: 20px;width: 90%;margin-left: 5%;">
					<tr>
						<th>Author</th>
						<th>Download Link</th>
						<th>Description</th>
						<th>Manage Stuff</th>
					</tr>
				<?php
				foreach ($catagory_array as $key => $course_array) {
					//echo $key;
					if($key[0]=='O')
					{
						$author_found = false;
						$link_found = false;
						$desc_found = false;
						$id_found = false;

						foreach ($course_array as $key => $value) {
						if($key=="author")
						{
							$author = $value;
							$author_found = true;				
						}
						else if($key=="link")
						{
							$link = $value;
							$link_found = true;
						}
						else if($key=="desc")
						{
							$desc = $value;
							$desc_found = true;
							if($desc=="")
								$desc = "N/A";
						}
						else if($key=="id")
						{
							$id = $value;
							$id_found=true;
						}
						if($author_found && $link_found && $desc_found && $id_found)
						{
				?>
				<tr>
					<?php $ran_num = rand(0,6);?>
					<td style="line-height: 40px;"> <span class="author_icon" style="background-color: <?php echo $color_array[$ran_num]; ?>" ><?php echo $author[0]; ?></span><?php echo $author?>
					</td>
					<td>
						<a href=<?php echo $link?> ><img src="images/download.png"; width="40px"; height="40px";></a>

					</td>
					<td style="line-height: 40px;"><?php echo $desc?></td>

					<?php 
						if($login_id==$added_by)
						{
							$btn_cnt++;
					?>
					<td><button class="btn btn-danger note_remove_btn" id=<?php echo "$id"?> > Remove X</button></td>
					<?php

						}
						else 
						{
					?>
					<td><button class="btn btn-danger disabled" style="opacity: 0.5">Remove X</button></td>
					<?php
						}
					?>
					
				</tr>
				<?php
							$author_found = false;
							$link_found = false;
							$desc_found = false;
							$id_found = false;
				
						}	# code...
					}
				}
			}
				?>
				</table>
				<?php
					}
					else {
				?>
						<center>
							<br><br>
							<img src="images/nothing_found.png" width="150px"; height="150px";>
							<br><br>
							<span class="nothing_found_msg">Sorry!!!Nothing Found in this Catagory</span>
						</center>
				<?php
					}
				?>				
		</div>

		
		
		

</body>
</html>