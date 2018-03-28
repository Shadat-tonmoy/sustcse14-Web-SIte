<!DOCTYPE html>
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
    <script src="notification.js" type="text/javascript"></script>
    <script src="see_who_liked.js" type="text/javascript"></script>		
    <script src="see_who_disliked.js" type="text/javascript"></script>		
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
      	#notification_div a{
	        text-decoration: none;
	        color:white;
	    }
      .num_of_notification{
		    display: inline-block;
		    color: white;
		    width: 25px;
		    height: 25px;
		    line-height: 25px;
		    background-color: red;
		    text-align: center;
		    border-radius: 85px;
    		margin-left: -10px;

      }
      #notification_div a:hover{
       	text-decoration:none;
        color:#95a5a6;
        transition: color 0.5s;
      }
	  </style>
    <title>14's World</title>
    <link rel="icon" href="../images/icon.png">
	</head>
<body>
<nav class="navbar navbar-fixed-top navbar-inverse" style="height: 55px; line-height: 55px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="../">
              		<img style="display:inline-block;margin-top: -15px;" src="images/logo.png" width="150px" height="45px">
            	</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#worldNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
			<div id="worldNavbar" class="collapse navbar-collapse">
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
    					<a href="../dashboard.php">
	    					<img src=<?php echo "../user_image/$image"?> class="navbar_img">
	    						<span class="nav_menu_text">
	    							Your Account
	    						</span>
	    				</a>
	    			</li>
	    			
	    			<li>
    					<a href="#" id="notification_btn" style="position: relative;">
							<img src="images/notification.png" class="navbar_img">
	    					<span class="nav_menu_text">
                    			Notifications 
                  			</span>
	    				</a>

              			<div id="notification_panel">
                			<div class="tri" id="tri"></div>
                			<div style="width: 300%; height: 60vh; background-color: black;position: absolute; color:white; overflow-y: scroll; overflow-x: hidden;" id="notification_div" class="notification_item">
                			</div>
              			</div>
	    			</li>
	    			
	    			<span class="num_of_notification" id="num_of_notification"></span>

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

</body>
</html>