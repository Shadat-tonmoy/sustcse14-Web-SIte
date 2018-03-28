<?php
	$date = date("Y-m-d");
	$past_days = date("Y-m-d", strtotime("$date -2 day"));
	echo "$date $past_days";
?>
<!DOCTYPE html>
<html>
<head>
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
	<title></title>
	<script type="text/javascript" src="test.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			window.open("http://www.facebook.com", '_blank');
		})
	</script>
	<style type="text/css">
		.parent{
			color:white;
			background-color: black;
		}
		.child{
			color:white;
			background-color: orange;
		}
		.parent_clk{
			color:red;
		}
	</style>
</head>
<body>
	<div class="parent" id="parent">
		<h2>I am parent</h2>
		<div class="child" id="child">
			<h2>I am child</h2>
		</div>
		
	</div>


</body>
</html>