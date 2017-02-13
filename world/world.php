<?php
ob_start();
session_start();
include '../conn.php';
$id = $_SESSION['id'];
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
date_default_timezone_set("ASIA/DHAKA");
//echo "<img src='../user_image/$image'/>"
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="../style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>		
		<script src="script.js" type="text/javascript"></script>		
		<script src="http://malsup.github.com/jquery.form.js"></script> 

		<style>
		  body{
			margin:0px;
			padding:0px;
			overflow-x: hidden;
		  
		  }
			.container-fluid{
				width:100%;
			
			}
			#class_update .modal-dialog{
				width: 80%;
			}
	  
	  </style>
    <title>14's World</title>
    <link rel="icon" href="http://localhost/project/images/icon.png">
		

	</head>
	<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="height: 55px; line-height: 55px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
      			</button>
      			<a class="navbar-brand" href="http://localhost/project">
              <img style="display:inline-block;margin-top: -15px;" src="images/logo.png" width="150px" height="45px">
            </a>
    		</div>
    		<div class="collapse navbar-collapse" id="myNavbar">
    			<ul class="nav navbar-nav">
    				<li>
    					<a href="world.php" id="home_btn">
	    						<img src="images/home.ico" class="navbar_img">
	    						<span class="nav_menu_text">
	    							Home
	    						</span>
	    				</a>
	    			</li>
    				<li>
    					<a href="dashboard.php">
	    						<img src=<?php echo "../user_image/$image"?> class="navbar_img">

	    						<span class="nav_menu_text">
	    							Your Account
	    						</span>
	    				</a>
	    			</li>
	    			<!--
	    			<li>
    					<a id="msg_btn">
	    						<img src="images/message.ico" class="navbar_img">
	    					Messages
	    				</a>
	    				<div id="msg_dropdown">
		    				<div class="tri" id="tri">
		    					heh
		    				</div>
		    				<div class="msg_box" id="msg_box">
		    					<a href="http://facebook.com">Your Message Will Be Shown Here</a>
		    				</div>	
						</div>
	    				
	    			</li>
	    			
	    			<li>
    					<a href="#" id="notification_btn">
	    						<img src="images/notification.png" class="navbar_img">
	    					Notifications
	    				</a>
	    			</li>
	    			-->
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="../">
							<img src="images/leave.png" class="navbar_img">
							<span class="nav_menu_text">Leave World</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br><br><br><br>
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 fixed-left" >
			<div class="row" id="sample_class_update_div">
				<div class="comment_loading"> 				
					<center>
						<img src="images/loading.gif" style="width: 40px; height: 40px;">
					</center>
				</div>

			</div>
			<div class="row" style="">
				<br>
				<div class="panel" style="width: 90%; margin-left: 7%; margin-top: -10px; ">
					<div class="panel-heading" style="background-color: #e67e22;">
						<strong style="font-size: 0.9vw; color: white">Class Lectures and Notes : </strong>
					</div>
					<div class="panel-body" style="height:auto; border:2px solid #e67e22;">
							<div class="row">
								<center>
									<div class="panel panel-body note" style="width: 65%;font-size: 0.9vw" data-toggle="modal" data-target="#browse_note">Browse Class Note</div>
								</center>
								<center>
									<div class="panel panel-body note" style="width: 65%;font-size: 0.9vw" data-toggle="modal" data-target="#share_note" id="share_note_btn">Share Class Note</div>
								</center>
							</div>
					</div>
				</div>	
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color: #ecf0f1;margin-left: 24%;">
			
			<div id="class_update" class="modal fade" role="dialog">
 				 <div class="modal-dialog">
    				<div class="modal-content">
      					<div class="modal-header" style="background-color: #e67e22; color: white">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
        					<h4 class="modal-title">Update Class Schedule : </h4>
      					</div>
      					<div class="modal-body">
      						<div id="datepicker_panel" class="panel panel-body">
      							<div class="row">
      							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      								<h4>Select Semester<h4><br>
      								<select class="form-control" id="sem_list_class_update" >
      									<option selected sem="0" >Select a semester</option>
      									<optgroup label="First Year">
      										<option sem="1/1">
      											First Semester
      										</option>
      										<option sem="1/2">
      											Second Semester
      										</option>
      									</optgroup>

      									<optgroup label="Second Year">
      										<option sem="2/1">
      											First Semester
      										</option>
      										<option sem="2/2">
      											Second Semester
      										</option>
      									</optgroup>

      									<optgroup label="Third Year">
      										<option sem="3/1">
      											First Semester
      										</option>
      										<option sem="3/2">
      											Second Semester
      										</option>
      									</optgroup>

      									<optgroup label="Final Year">
      										<option sem="4/1">
      											First Semester
      										</option>
      										<option sem="4/2">
      											Second Semester
      										</option>
      									</optgroup>
      								</select>
      							</div>

      							<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
      								<h4>Select Date of Class : </h4><br>
      								<input id="datepicker" class="form-control" placeholder="Select A Valid Date" name="datepicker" />
      							</div>
      							</div>

      							
      							<div class="row">
      								<br><br>
      								<center>
      									<button class="btn btn-success" id="datepicker_btn">Submit</button>
      								</center>
      							</div>

      						</div>
      						<div id="class_div" class="table-responsive">
      							<div class="class_list_loading"> 				
									<center>
										<img src="images/loading.gif" style="width: 60px; height: 60px;">
									</center>
								</div>
      						</div>
      					</div>
    				</div>
  				</div>
			</div>

			<div id="exam_update" class="modal fade" role="dialog">
 				 <div class="modal-dialog">
    				<div class="modal-content">
      					<div class="modal-header" style="background-color: #e67e22; color: white">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
        					<h4 class="modal-title">Update Upcoming Exam : </h4>
      					</div>
      					<div class="modal-body">
      						<div id="exam_div" class="table-responsive"></div>
      					</div>
    				</div>
  				</div>
			</div>

      <div id="exam_update_full_div" class="modal fade" role="dialog" >
         <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header" style="background-color: #e67e22; color: white">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Upcoming Exam : </h4>
                </div>
                <div class="modal-body">
                  <div id="full_exam_div" class="table-responsive">
                    
                  </div>
                </div>
            </div>
          </div>
      </div>

			<div id="share_note" class="modal fade" role="dialog">
 				 <div class="modal-dialog" style="width: 80%">
    				<div class="modal-content">
      					<div class="modal-header" style="background-color: #e67e22; color: white">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
        					<h4 class="modal-title">Share Notes : </h4>
      					</div>
      					<div class="modal-body" id="share_note_sem">
      						<center><h4>Select Semester To Share Notes : </h4></center>
      						<div id="share_note_sem_lg">
      						<div class="">
      							<div class="row">
      								<div class="col-lg-6">
	      								<div class="col-lg-6">
	      									<h2 class="note_share_sem_icon" style="background-color: #27ae60" >1/1</h2>
	      								</div>
	      								<div class="col-lg-6">
	      									<h2 class="note_share_sem_icon" style="background-color: #e67e22" >1/2</h2>
	      								</div>
      								</div>
      								<div class="col-lg-6">
	      								<div class="col-lg-6">
	      									<h2 class="note_share_sem_icon" style="background-color: #c0392b">2/1</h2>
	      								</div>
	      								<div class="col-lg-6">
	      									<h2 class="note_share_sem_icon" style="background-color: #e67e22">2/2</h2>
	      								</div>
      								</div>
      							</div>      	


      							<div class="row">
      								<div class="col-lg-6">
	      								<div class="col-lg-6">
	      									<h2 class="note_share_sem_icon" style="background-color: #e67e22">3/1</h2>
	      								</div>
	      								<div class="col-lg-6">
	      									<h2 class="note_share_sem_icon" style="background-color: #16a085">3/2</h2>
	      								</div>
      								</div>
      								<div class="col-lg-6">
	      								<div class="col-lg-6">
	      									<h2 class="note_share_sem_icon" style="background-color: #7f8c8d">4/1</h2>
	      								</div>
	      								<div class="col-lg-6">
	      									<h2 class="note_share_sem_icon" style="background-color: #2980b9">4/2</h2>
	      								</div>
      								</div>
      							</div>      	

      						</div>
      						</div>

      					</div>
      					<div class="row wells" id="sem_icon_sm" style="display: block;margin: auto;padding: 5px;">
      						<center>
      							  <span class="wells" style="font-size: 20px;border-left: 3px solid red;height: 50px;display: inline-block;line-height: 50px;"> 

      							  		<span style="margin-left: 10px;margin-right: 10px;">Semesters :</span>

      							   </span>
						      	  <h2 class="note_share_sem_icon sem_icon" style="background-color: #27ae60" >1/1</h2>
							      <h2 class="note_share_sem_icon sem_icon" style="background-color: #e67e22" >1/2</h2>
							      <h2 class="note_share_sem_icon sem_icon" style="background-color: #c0392b">2/1</h2>
							      <h2 class="note_share_sem_icon sem_icon" style="background-color: #e67e22">2/2</h2>
							      <h2 class="note_share_sem_icon sem_icon" style="background-color: #e67e22">3/1</h2>
							      <h2 class="note_share_sem_icon sem_icon" style="background-color: #16a085">3/2</h2>
							      <h2 class="note_share_sem_icon sem_icon" style="background-color: #7f8c8d">4/1</h2>
							      <h2 class="note_share_sem_icon sem_icon" style="background-color: #2980b9">4/2</h2>	
						      </center>
      						
      					</div>
    				</div>
  				</div>
			</div>

			<div id="browse_note" class="modal fade" role="dialog">
 				 <div class="modal-dialog">
    				<div class="modal-content">
      					<div class="modal-header" style="background-color: #e67e22; color: white">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
        					<h4 class="modal-title">Select Semester to Browse Notes : </h4>
      					</div>
      					<div class="modal-body">
      						<div id="" class="">
      							<div class="row">
      								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 panel panel-body semester_name">
      										<div  class="">
      											<span>3<sup>rd</sup> Year : </span>
      										</div>
      									</div>
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      										<center>
      											<img class="semester_img" src="images/3-1.png" id="3/1">
      										</center>
      									</div>
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      										<center>
      											<img class="semester_img" src="images/3-2.png" id="3/2">
      										</center>
      									</div>
      								</div>      								
      							</div>
      							<br>
      							<div class="row">
      								<dir class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 panel panel-body semester_name">
      										<div  class="">
      											<span>2<sup>nd</sup> Year : </span>
      										</div>
      									</div>
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      										<center>
      											<img class="semester_img" src="images/2-1.png" id="2/1">
      										</center>
      									</div>
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      										<center>
      											<img class="semester_img" src="images/2-2.png" id="2/2">
      										</center>
      									</div>
      								</dir>      								
      							</div>
      							<br>
      							<div class="row">
      								<dir class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 panel panel-body semester_name">
      										<div  class="">
      											<span>1<sup>st</sup> Year : </span>
      										</div>
      									</div>
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      										<center>
      											<img class="semester_img" src="images/3-1.png">
      										</center>
      									</div>
      									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      										<center>
      											<img class="semester_img" src="images/3-2.png">
      										</center>
      									</div>
      								</dir>      								
      							</div>
      						</div>
      					</div>
    				</div>
  				</div>
			</div>

			<div id="show_all_class_update" class="modal fade" role="dialog">
 				 <div class="modal-dialog" style="width: 85%;">
    				<div class="modal-content">
      					<div class="modal-header" style="background-color: #e67e22; color: white">
        					<button type="button" class="close" data-dismiss="modal">&times;</button>
        					<h4 class="modal-title">Get The Full Class Update </h4>
      					</div>
      					<div class="modal-body" id="full_class_update_div">
      						<div class="loading"> 				
								<center>
									<img src="images/loading.gif" style="width: 100px; height: 100px;">
								</center>
							</div>
      					</div>
    				</div>
  				</div>
			</div>

			<?php
				$sql = "SELECT * FROM new_post";
				$result = mysqli_query($conn,$sql);
				if($result)
				{
					$row = mysqli_fetch_assoc($result);
					$new_post = $row['new_post'];
					if($new_post)
					{
						echo '
						<div style="border-left:4px solid #f1c40f">
							<div class="alert alert-warning alert-dismissible">
  								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  								<strong>Done!</strong> Your Post Has Been Successfully Updated
							</div>
						</div>';
						$sql_new = "UPDATE new_post SET new_post=0";
						$result_new = mysqli_query($conn,$sql_new);
					}
				}



			?>
			

			<div class="row">


				<form method="post" action="update_post.php">
					<textarea name="post" cols="80" rows="4" class="status_box form-control" placeholder=" Share with your mates...."></textarea>
					<br>
					<input type="submit" name="status_btn" value="Share" class=" status_btn"/>	
				</form>
			</div>
			<br>

			<div id="post_div">

				<div id="top_posts">
					<?php include 'posts.php'; ?>	
				</div>				
			</div>

       <div class="load_more_posts" lastId = <?php echo $post_id; ?> >         
          <center>
            <img src="images/loading.gif" style="width: 60px; height: 60px;">
          </center>
        </div>
			
						
		</div>


		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 fixed" > 
			<div class="row" style="background-color:" id="exam_update_sample_div">

      </div>
			<div class="row" style="background-color:">
				<br>
				<div class="panel" style="width: 95%; margin-left: 4%">
					<div class="panel-heading" style="background-color: #e67e22">
						<strong style="color: white; font-size: 11px;">Semester Day Counter : </strong>
					</div>
					<div class="panel-body" style="height:auto;border:2px solid #e67e22">
							<div class="row">
								<center>
									<p>
										<strong>3<sup>rd</sup> Year 1<sup>st</sup> Semester Has </strong>
									</p>
								</center>
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  semester-counter-div">
									<p class="num" id="sem_day">3</p>
									<p class="txt">Days</p>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  semester-counter-div">
									<p class="num" id="sem_hrs"></p>
									<p class="txt">Hours</p>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  semester-counter-div">
									<p class="num" id="sem_min"></p>
									<p class="txt">Minutes</p>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3  semester-counter-div">
									<p class="num" id="sem_sec">3</p>
									<p class="txt">Seconds</p>
								</div>	
							</div>

							<div class="row">
								<center>
									<p>
										<strong>Remaining... </strong>
									</p>
								</center>
							</div>


							

						
					</div>
				</div>	
			</div>
			
		 </div>

	</div>


		

	</body>
</html>