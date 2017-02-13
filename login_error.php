<?php
include 'header.php';
?>
<html>
	<head>
		<style type="text/css">
			.navbar{
				background-color: #e74c3c;
			}


		</style>


	</head>
	<body>
		<br><br><br><br><br>
		<div class='row'>
			<center>
				<img src='images/s_failed.jpg' class='img img-responsive' width="300px"; height="300px" />
				<div class='col-lg-12'>
					<span style='background-color: #e74c3c; color:white; height:45px; line-height: 45px; display :block; width:60%; font-weight: bold;'>Oops!!! There was an error in login..May be incorrect User Name and Password Combination. Please Try Again</span>
				</div>
			</center>
		</div>

		<br><br>
		<div class='row'>
			<center>
				<div class='col-lg-8 col-lg-offset-2'>
					
					<form role="form" class="form-horizontal" method="post" action="login.php">
						<div class="form-group">
							<label for="user_name" class="control-label col-sm-3" >User Name : </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" placeholder="Enter Your User Name" name="user_name"></input>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="password" >Password : </label>
							<div class="col-sm-7">
								<input type="password" id="password" class="form-control" placeholder="Enter Your Pssword" name="pwd"></input>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9 col-lg-5">
								<button type="submit" class="btn btn-success">Log In</button>
								<button type="reset" class="btn btn-danger">Reset All Fields</button>
							</div>
						</div>
					</form>
				</div>
			</center>
		</div>

		<div class='row'>
			<center>
				<div class='col-lg-12'>
					<span style='background-color: #2980b9; color:white; height:45px; line-height: 45px; display :block; width:60%; font-weight: bold;'>Not Registered Yet??
					<span style='cursor: pointer;' id='reg_try' data-toggle="modal" data-target="#signup" >Click Here To Register</span>
					</span>

				</div>
			</center>
		</div>


	</body>


</html>