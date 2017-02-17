<!--@Author - Shadat Tonmoy
Dept of CSE, SUST
Reg no - 2014331070-->
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
		<style type="text/css">
		.home_body{

			background-image:url("images/bg.JPG");
			background-repeat:no-repeat;
			background-attachment:fixed;
			background-size:100% 100%;
			height: 100vh;
		}
		
		</style>
		<title>SUST CSE 14 Batch - Official</title>
		<meta charset="UTF-8">
		<meta name="description" content="SUST CSE 14 Batch">
		<meta name="keywords" content="SUST,CSE,SUST CSE,SUST CSE 14,SUST CSE 14 Batch" >
		<meta name="author" content="Shadat Tonmoy">
	</head>
	<body id="home_body" class="home_body">
		 

	</body>


</html>
