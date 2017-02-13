<?php
include '../conn.php';
//include 'header.php';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}
else echo "Not set";



?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="notes_style.css">
	  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
	  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script type="text/javascript">
	  	$(document).load(function(){
	  		$("#notes_page").hide();
	  		$("#loader").show();
	  	})
	  	$(document).ready(function(){
	  		$("#loader").hide();
	  		$("#notes_page").show();
	  		
	  	})
	  	
	  </script>
	<title>Notes Navigation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<script src="script.js" type="text/javascript"></script>
	<script src="form_validate.js" type="text/javascript"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 
</head>

<body>
<center id="loader" style="background-color: #2c3e50;height: 100vh;">
	<div>
		<img src="images/loader.gif" style="width: 150px; height: 150px; margin-top: 40vh;">
	</div>	
</center>

<div id="notes_page">
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
	    		<div class="collapse navbar-collapse" id="">
	    			<ul class="nav navbar-nav" style="width: 65%; margin-left: 11%">
	    				<li style="width: 60%;left: 0%;">
	    					<input type="text" name="" class="form-control" placeholder="Search Your Notes Here (Will Work Soon.... :) " style="display: inline-block;"> 
	    				</li>
	    				<li>
	    					<span class="btn btn-default" style="margin-left:25%; display: inline-block;"><span class="glyphicon glyphicon-search"></span></span>
	    					
	    				</li>
	    			</ul>

	    			
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="http://localhost/project/world/world.php">
								<img src="http://localhost/project/world/images/leave.png" class="navbar_img">
								<span class="nav_menu_text">Back To World</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	<br><br>
	<div class="row" >
		<div class="col-lg-3 notes_nav">	
		<center>
			<h3 class="nav_heading">Class Notes & Refference Navigator</h3>
		</center>
		<?php 
		$course_sql = "SELECT * FROM `course` WHERE `semester`='$id' AND `type`='course_name'";
		$course_sql_result = mysqli_query($conn,$course_sql);

		$course_num_sql = "SELECT * FROM `course` WHERE `semester`='$id' AND `type`='course_num'";
		$course_num_sql_result = mysqli_query($conn,$course_num_sql);
		//echo mysqli_num_rows($course_sql_result);
		if($course_sql_result)
		{
			$code_num = mysqli_fetch_assoc($course_num_sql_result);
			while($row = mysqli_fetch_assoc($course_sql_result))
			{
				for($i=1;$i<=10;$i++)
				{
					$index = "course$i";
					if($row[$index]!=NULL)
					{
						$course = $row[$index];
						$course_num = $code_num[$index];
					//echo $course."<br>";

		?>
		<div class="course_list col-lg-12">
			<div class="col-lg-2">
				<div class="course_icon">
					<?php echo strtoupper($course_num)?>
				</div>
			</div>
			<div class="col-lg-10 course_title" id=<?php echo $course_num ?>>
				<span><?php echo $course?></span>
			</div>

			
		</div>

		<?php
					}
				}
			}
		}
		else echo "VUA";
		?>
		</div>

		<div class="col-lg-9" style="background-image: url(images/study_bg.jpg); background-size: 100% 100%; background-attachment: fixed; background-repeat: no-repeat;padding: 0px;margin-bottom: 0px;" id="">
			<div style="background-color: rgba(44,62,80,0.6); width: 100%;height: 100vh;margin: 0px; overflow: hidden;" id="notes_body" class="" >
					<div id="notes_body_content" style="position: relative;">
						
					</div>
					<div class="col-lg-12 notes_body_text" id="notes_body_text">
						<span>Get All The Class Notes Referrence Book Here....</span>
					</div>

			</div>
			
		</div>
		
	</div>
	
</div>

</body>
</html>