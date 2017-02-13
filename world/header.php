<?php

?>
<!DOCTYPE html>
<html>
<head>
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
	  
	  </style>
	</head>	
	<title></title>
</head>
<body>

	<br><br><br><br>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="height: 55px; line-height: 55px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
      			</button>
      			<a class="navbar-brand" href="#">14's World</a>
    		</div>
    		<div class="collapse navbar-collapse" id="myNavbar">
    			<ul class="nav navbar-nav">
    				<li>
    					<a href="http://localhost/project/world/world.php" id="home_btn">
	    						<img src="world/images/home.ico" class="navbar_img">
	    						<span class="nav_menu_text">
	    							Home
	    						</span>
	    				</a>
	    			</li>
    				<li>
    					<a href="http://localhost/project/dashboard.php">
	    						<img src=<?php echo "user_image/$image"?> class="navbar_img">

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
						<a href="http://localhost/project">
							<img src="world/images/leave.png" class="navbar_img">
							<span class="nav_menu_text">Leave World</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

</body>
</html>