<?php
include 'header.php';
include 'conn.php';
include 'php_scripts.php';
echo "<br><br><br><br>";
$sql = "SELECT image FROM user_data WHERE `reg_no`=$reg_no";
$result = mysqli_query($conn,$sql);
if($result)
{	
	$row = mysqli_fetch_assoc($result);
	$img = $row['image'];
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="row">
		
			<div class="alert alert-success fade in col-md-12 col-lg-6 col-lg-offset-3 col-sm-12 col-xs-12" style="color:;background:#DDFFDD;font-size:1em; border-left: 3px solid green">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Congratulation!!!</strong> 
				<span>You Have Successfully Signed Up.Click on Login at Top Right Window to Login to your account and Explore 14's World<br><br>
				<span style="color: red; font-weight: bold; ">Attention!!! </span>Please upload an image for your account. Please Choose an image within <strong>5MB.</strong> <br>Sorry for the restriction. We are working on this issue. Hope to solve soon</span>
			</div>		
		

	</div>
	
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6" >
			<div class="panel">
				<div class="dashboard_heading">
					<?php echo "<h2>Welcome $first_name</h2>"?>
				</div>
				<div class="well">
					<center>
						<img src=<?php echo "user_image/$img" ?> id="registered_img" class="img-responsive pro_pic" width="320px" height="320px"/>
						<form method="post" enctype="multipart/form-data" role="form form-horzontal" id="img_upload_form" action="upload.php">
							<button id="img_browse_btn" class="btn btn-primary file-upload">Upload Your Image
								<input type="file" class="file-input" name="fileToUpload" />
							</button>
							<input class="btn btn-success" name="img_up_btn" id="img_up_btn" type="submit" value="Submit" />
							<input type="text" name="tmp_reg" class="tmp_reg" value=<?php echo "$reg_no"?> />
							<div class="progress" id="progress">
								<div class="progress-bar" id="progress_bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
								<span id="show_percent">0%</span>
								</div>
							</div>
							<div id="val_msg_img">
								<img id="img_disp_img"/>
								<span id="msg_disp_img"></span>
							</div>
						</form>
					</center>
				</div>
			
			</div>		
		</div>
		<div class="col-lg-9 col-sm-9 col-md-9 col-xs-9" >
			<div class="panel">
				<div class="dashboard_heading">
					<h2>Your Detail Information</h2>
				</div>
				<div class="well">
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">First Name : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233"><?php echo "$first_name"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Last Name : </strong>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233"><?php echo "$last_name"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">User Name : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233"><?php echo "$user_name"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Registration No : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233" id="rg"><?php echo "$reg_no"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Email ID : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233"><?php echo "$email"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Phone No : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233"><?php echo "$phn_no"?></strong>
						</div>
					</div>
					
				</div>
			
			</div>		
		</div>
	</div>
		
	
</body>
</html>