<?php
//include 'header.php';
session_start();
include 'conn.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM user_data WHERE `id`=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$reg_no=$row['reg_no'];
$user_name=$row['user_name'];
$email=$row['email'];
$phn=$row['phone'];
$image=$row['image'];
$password=$row['password'];
include 'world/header.php';
/*php code for image upload*/

?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	.navbar{
		background-color: #34495e;
	}


</style>
</head>
<body>
	<div id="success_msg" class='col-lg-12' style=" height: 60px; line-height: 60px; background-color: #2980b9; color:white; display:none ; ">
		<div class='col-lg-9'>
			<strong>Congratulation!! </strong>Your Profile Has Been Successfully Updated!

		</div>

		<div class='col-lg-3' >
			<span class='col-lg-6' style="color:#ecf0f1; cursor: pointer;" id="view_btn">View Profile
				<span class='glyphicon glyphicon-eye-open'></span>
			</span>
			<span class='col-lg-6' style="color:#ecf0f1; cursor: pointer;" id="close_btn">Close
				<span class="glyphicon glyphicon-remove-circle"></span>
			</span>
		</div>

	</div>

	<div id="success_msg_ps_change" class='col-lg-12' style=" height: 60px; line-height: 60px; background-color: #2980b9; color:white; display:none; ">
		<div class='col-lg-9'>
			<strong>Congratulation!! </strong>Your Password Has Been Succesfully Changed
		</div>

		<div class='col-lg-3' >
			<span class='col-lg-6' style="color:#ecf0f1; cursor: pointer;" id="view_btn_ps">View Profile
				<span class='glyphicon glyphicon-eye-open'></span>
			</span>
			<span class='col-lg-6' style="color:#ecf0f1; cursor: pointer;" id="close_btn_ps">Close
				<span class="glyphicon glyphicon-remove-circle"></span>
			</span>
		</div>

	</div>


	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6" >
			<div class="panel">
				<div class="dashboard_heading" style="background-color: #e67e22">
					<?php echo "<h2>Welcome ".strtoupper($first_name)."</h2>";?>
				</div>
				<div class="well">
					<center>
						<img src=<?php echo "user_image/$image" ?> id="updated_img" class="img-responsive pro_pic" width="300px" height="350px"/>
						<form method="post" enctype="multipart/form-data" role="form form-horzontal" id="img_update_form" action="update.php">
							<button id="img_browse_btn" class="btn btn-primary file-upload">Change Your Image
								<input type="file" class="file-input" name="uploadimage" />
							</button>
							<input class="btn btn-success" name="img_update_up_btn" id="img_up_btn" type="submit" value="Submit" />
							<input type="text" name="tmp_reg_update" class="tmp_reg" value=<?php echo "$reg_no"?> />
							<div class="progress" id="progress_update">
								<div class="progress-bar" id="progress_bar_update" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
								<span id="show_percent_update">0%</span>
								</div>
							</div>
							<div id="val_msg_img_update">
								<img id="img_disp_img_update"/>
								<span id="msg_disp_img_update"></span>
							</div>
						</form>
					</center>
				</div>
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="panel" id="disp_acc">
				<div class="dashboard_heading" style="background-color: #e67e22">
					<h2>Your DashBoard</h2>
				</div>
				<div class="well">
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">First Name : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233";><?php echo "$first_name"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Last Name : </strong>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233";><?php echo "$last_name"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">User Name : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233";><?php echo "$user_name"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Registration No : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233" id="reg_no_dash"><?php echo "$reg_no"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Email ID : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233";><?php echo "$email"?></strong>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Phone No : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<strong style="color:#D14233";><?php echo "$phn"?></strong>
						</div>
					</div>
					
				</div>
			
			</div>
			<div class="panel" id="edit_account">
				<div class="dashboard_heading" style="background-color: #e67e22">
					<h2>
						Edit Your Account
					</h2>
				</div>
				<form id="update_info_form" >
				<div class="well">
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">First Name : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<div class="form-group">
								<input type="text" class="form-control" id="fn_edit" name="fn_edit" value="<?php echo $first_name ?>"/>
							</div>
						</div>
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_fn_edit">
							<img id="img_disp_fn_edit"/>
							<span id="msg_disp_fn_edit"></span>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Last Name : </strong>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<div class="form-group">
								<input type="text" class="form-control" id="ln_edit" name="ln_edit" value="<?php echo $last_name ?>"/>
							</div>
						</div>
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_ln_edit">
							<img id="img_disp_ln_edit"/>
							<span id="msg_disp_ln_edit"></span>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">User Name : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<div class="form-group">
								<input type="text" class="form-control" id="un_edit" name="un_edit" value="<?php echo $user_name ?>"/>
							</div>
						</div>
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_un_edit">
							<img id="img_disp_un_edit"/>
							<span id="msg_disp_un_edit"></span>
						</div>
					</div>
					<div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Email ID : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<div class="form-group">
								<input type="text" class="form-control" id="email_edit" name="email_edit" value="<?php echo $email ?>"/>
							</div>
						</div>
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_email_edit">
							<img id="img_disp_email_edit"/>
							<span id="msg_disp_email_edit"></span>
						</div>
					</div>
					
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">Phone No : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<div class="form-group">
								<input type="text" class="form-control" id="phn_edit" name="phn_edit" value="<?php echo $phn ?>"/>
							</div>
						</div>
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_phn_edit">
							<img id="img_disp_phn_edit"/>
							<span id="msg_disp_phn_edit"></span>
						</div>
					</div>
					<center>
						<button class="btn btn-success"  name="update_info_btn" id="update_info_btn">Update Info</button>
						<button class="btn btn-danger" id="update_back_btn">Back To Your Account</button>
					</center>
					
					
				</div>
				</form>
			</div>		
		</div>
			<div id="change_password">
				<div class="dashboard_heading" style="background-color: #e67e22">
						<h2>Change Your Password</h2>
				</div>
				<div class="well">
				<form method="post">
					<div class="panel panel-body">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">New Password : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<div class="form-group">
								<input type="password" class="form-control" id="new_ps" name="new_ps" placeholder="Enter Your New Password" />
							</div>
						</div>
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_new_ps">
							<img id="img_disp_new_ps"/>
							<span id="msg_disp_new_ps"></span>
						</div>
					</div>
					
					<div class="panel panel-body">	
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<strong class="pull-right">New Password Repeat : </strong>
						</div>	
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
							<div class="form-group">
								<input type="password" class="form-control" id="new_ps_rpt" name="new_ps_rpt" placeholder="Enter Your New Password Again" />
							</div>
						</div>
						<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_new_ps_rpt">
							<img id="img_disp_new_ps_rpt"/>
							<span id="msg_disp_new_ps_rpt"></span>
						</div>						
					</div>
				</form>
				<center>
					<button class="btn btn-success" id="password_change_final_btn">Change Password</button>
					<button class="btn btn-danger" id="password_back_btn">Back To Your Account</button>
				</center>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-6" >
			<div class="panel">
				<div class="dashboard_heading" style="background-color: #e67e22">
					<h2> Manage Your Account</h2>
				</div>
				<div class="well">
				<button class="btn btn-primary" id="edit_account_btn">Update Info</button>  <button id="change_password_btn" class="btn btn-warning" data-toggle="modal" data-target="#check_password_window">Change Password</button>
				
				</div>
			
			</div>		
		</div>
		
		
	</div>
<div id="check_password_window" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #e67e22">
				<button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
				<h4 style="color: white" >Enter Your Old Password</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="form-horizontal">
					<div class="form-group">
						<label for="user_name" class="control-label col-sm-3" >Old Password : </label>
						<div class="col-sm-9">
							<input type="password" class="form-control" placeholder="Enter Your Old Password" name="old_ps" id="old_ps"></input>
						</div>
					</div>
					<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_old_ps">
						<img id="img_disp_old_ps"/>
						<span id="msg_disp_old_ps"></span>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success" id="ps_change_btn">Change Password</button>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
		
	
</body>
</html>