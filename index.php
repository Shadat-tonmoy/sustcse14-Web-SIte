<?php
if(isset($_COOKIE['remember']))
{
	session_start();
    $id = $_COOKIE['remember'];
    $_SESSION['id']=$id;
}
else 
{
	session_start();

}
//die();

include 'header.php';
include 'day_count.php';
include 'members_img.php';
include 'who_we_are.php';
include 'we_are_creative.php';
include 'who_we_belongs.php';
include 'footer.php';
?>
<html>
	<head>
		<!--<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
		<script type="text/javascript">
			$(document).load(function(){
				$("#preloader").show("slide",{direction:"up"});
			})
			$(document).ready(function(){
				$("#preloader").hide();
				$("#home_body").addClass("home_body");
			})
		</script>-->
		<style type="text/css">
		.home_body{

			background-image:url("images/bg.JPG");
			background-repeat:no-repeat;
			background-attachment:fixed;
			background-size:100% 100%;
			height: 100vh;
		}
			.preloader{				
    			width: 30vw;
    			height: 30vw;
    			display: block;
			}
			.slow{
    			width: 90px;
    			height: 100px;
    			margin-bottom: -45px;
			}
			.preloader_text{
				display: inline-block;
				-webkit-animation-name: anim;
    			-webkit-animation-duration: 5s;
    			-webkit-animation-iteration-count: infinite;
    			-webkit-animation-direction: alternate; /* Safari 4.0 - 8.0 */
    			animation-direction: alternate;
    			color: #e67e22

			}
			@keyframes anim {
    			0% {opacity:0.2;}
    			25% {opacity:0.4;}
    			50% {opacity:0.6;}
    			75% {opacity:0.7;}
    			100% {opacity:0.9;}

			}
		</style>
		<title>SUST CSE 14 Batch - Official</title>
	</head>
	<body id="home_body" class="home_body">
	<center id="preloader">
		<br><br><br>
		<div>
			<img src="images/preloader.gif" class="preloader">		
		</div>	
		<div id="preloader_text">
			<h2 class="preloader_text">
				We Are Getting Ready Please Wait<span><img src="images/loading_dots.gif" class="slow"></span>
			</h2>
			
		</div>
	</center>
	

	</body>


</html>