<?php

	//session_start();
	include 'conn.php';
?>
<!DOCTYPE html>
<html>
	<head>
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
	  <style>
	  body{
		margin:0px;
		padding:0px;
		overflow-x: hidden;
	  
	  }
		.container-fluid{
			width:100%;
		
		}
		.navbar{
			background-color:#34495e;
		}
		#mynav li.active{
			background-color: #e67e22; !important;
		}
		.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover
		{
			background-color: transparent;
		}
		#preloader { 
			position: fixed;
			left: 0;
			top: 0;
			z-index: 999; 
			width: 100%; 
			height: 100%; 
			overflow: visible; 
			background: #333 url('http://files.mimoymima.com/images/loading.gif') no-repeat center center; }
	  
	  </style>
	  <title>SUST CSE 14 Batch - Official</title>
	  <link rel="icon" href="images/icon.png">
	</head>	
	
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
			$(".dropdown").click(function(event){
				event.stopPropagation();
				$(this).find("ul").stop().fadeToggle(500);
			});
			$(window).click(function(event){
				$(".dropdown").find("ul").hide(500);
			})
			
		});
	</script>
	<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover(); 
		});
	</script>
	<div id="preloader">
	</div>
	
	<!--Code for Navebar-->
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">
					<img style="display:inline-block;margin-top: -15px;" src="images/logo.png" width="150px" height="45px">
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
			<div id="mynav" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="#home_div">Home</a></li>
					<li><a href="#members">Members</a></li>
					<li><a href="#about_us_div">About Us</a></li>
					<li><a href="#our_works_div">Explore Us</a></li>
					<li><a href="#we_belongs_div">We Belongs</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="margin-right:2%">
					<?php
						if(isset($_SESSION['id']))
						{
							echo "
								<form method='post'>
									<a type='submit' href='logout.php' class='btn btn-danger'>Log Out</a>
									
									<a type='submit' href='world/world.php' class='btn btn-default' name='world_btn'>14's  World</a>


								</form>							
							";
						}
						else{
							echo "
								<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#my_modal' >Log In</button>
								
								<button type='button' class='btn btn-info' data-toggle='modal' data-target='#signup' id='register_btn'>Register</button>
								
								
								";
						} 
					?>
				</ul>				
			</div>
		</div>
	</nav>
<div id="my_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
				<h4>Fill the form to log in</h4>
			</div>
			<div class="modal-body">
				<form role="form" class="form-horizontal" method="post" action="login.php">
					<div class="form-group">
						<label for="user_name" class="control-label col-sm-3" >User Name : </label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="Enter Your User Name" name="user_name"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="password" >Password : </label>
						<div class="col-sm-9">
							<input type="password" id="password" class="form-control" placeholder="Enter Your Pssword" name="pwd"></input>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<div class="checkbox">
								<label><input type="checkbox" name="remember" value="1" /> Remember Me</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success">Log In</button>
							<button type="reset" class="btn btn-danger">Reset All Fields</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="signup" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">					
				<button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
				<h4>Fill the form to Sign Up</h4>					
			</div>
			<div class="modal-body">
				<div id="reg_search">
						<div class="form-group">
							<center><label class="control-label">Enter Your Registration Number : </label></center><br>
							<input type="text" class="form-control" id="reg_search_no" name="reg_search_no" placeholder="2 0 1 4 3 3 1 0_ _"/>
						</div>
						<center id="val_msg_reg_search">
							<img id="img_disp_reg_search"/>
							<span id="msg_disp_reg_search"></span>
						</center>

						<div class="form-group">
							<center>
								<label class="control-label">Enter Varification Token : <br>
									<small style="color: #95a5a6">6 Digit Varification Token to Prove that you Belongs to SUST CSE 14 Batch</small>
								</label>
							</center><br>
							<input type="password" class="form-control" id="varification_token" name="" placeholder="Enter 6 Digit Token"/>
						</div>
						<center id="val_msg_token">
							<img id="img_disp_token"/>
							<span id="msg_disp_token"></span>
						</center>


						
						<center><button class="btn btn-success" id="reg_btn">Click To Register<span></span></button></center>
				</div>
				<div id="registration_form">
				<form role="form" class="form-horizontal" method="post" id="signup_form" action="registered.php" >
					<div class="form-group">
						<label class="control-label col-sm-3">First Name : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter Your First Name" />
						</div>														
					</div>
					<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_fn">
						<img id="img_disp_fn"/>
						<span id="msg_disp_fn"></span>
					</div>	
					<div class="form-group">
						<label class="control-label col-sm-3">Last Name : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Your Last Name"/>
						</div>							
					</div>
					<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_ln">
						<img id="img_disp_ln"/>
						<span id="msg_disp_ln"></span>
					</div>							
					<div class="form-group">
						<label class="control-label col-sm-3">User Name : </label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="u_name" name="u_name" placeholder="Enter Your User Name"/>
						</div>							
					</div>
					<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_un">
						<img id="img_disp_un"/>
						<span id="msg_disp_un"></span>
					</div>							
					<div class="form-group">
						<label class="control-label col-sm-3">Password : </label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="ps" name="ps" placeholder="Enter A Password"/>
						</div>							
					</div>
					<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_ps">
						<img id="img_disp_ps"/>
						<span id="msg_disp_ps"></span>
					</div>							
					<div class="form-group">
						<label class="control-label col-sm-3">Re-Type Password : </label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="rps" name="rps" placeholder="Enter Your Password Again"/>
						</div>							
					</div>
					<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_rps">
						<img id="img_disp_rps"/>
						<span id="msg_disp_rps"></span>
					</div>							
					<div class="form-group">
						<label class="control-label col-sm-3">E-Mail : </label>
						<div class="col-sm-7">
							<input class="form-control" type="email" id="email" name="email" placeholder="username@domain.com"/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Registration Number : </label>
						<div class="col-sm-7">
							<input class="form-control" type="text" id="reg_no" name="reg_no" placeholder="20143310_ _" />
						</div>
					</div>
					<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_reg">
						<img id="img_disp_reg"/>
						<span id="msg_disp_reg"></span>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Phone Number : </label>
						<div class="col-sm-7">
							<input class="form-control" type="text" id="phn" name="phn" placeholder="+880_ _ _ _ _ _ _ _ _ _"/>
						</div>
					</div>
					<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-lg-7 col-md-7 col-sm-7" id="val_msg_email">
						<img id="img_disp_email"/>
						<span id="msg_disp_email"></span>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-7">
							<div class="col-sm-4">
								<button type="submit" class="btn btn-success" id="signup" name="signup">Sign Up</button>	
							</div>
							<div class="col-sm-4">
								<button type="reset" id="rst" class="btn btn-danger">Reset</button>	
							</div>
						</div>							
					</div>
				</form>
				
				
				</div>
				
			</div>
		</div>			
	</div>
</div>	



</body>
</html>