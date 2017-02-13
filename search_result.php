<?php
include 'php_scripts.php';
include 'header.php';
echo "<br><br>";
$found = false;
	if(isset($_POST['search']))
	{
		$reg = $_POST['search_input'];
		$sql = "SELECT * from user_data WHERE reg_no='$reg'";
		$result = mysql_query($sql,$conn);
		$rows = mysql_num_rows($result);
		if($rows>0)
		{
			$found=true;
		}
		else $found = false;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
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
			background-color:#FE6D02;
			border-bottom:0px solid blue;
		}
	  
	  </style>
</head>
<body>
<?php	
	if($found)
	{
		echo "<img src='images/s_success.png' class='img-responsive img-circle search_img' width='300px' height='300px'/><br><center><h2 class='s_success_heading'>You Searched For \"$reg\"</h2></center>";
		while($row=mysql_fetch_assoc($result))
		{
			echo $row['first_name']." ".$row['last_name'];
		}
	}
	else 
	{
		echo "<img src='images/s_failed.jpg' class='img-responsive img-circle search_img' width='300px' height='300px'/><br><center><h2 class='s_failed_heading'>Opps!!! No Result Found for \"$reg\"</h2></center>";
		
	}
	echo "";
?>

</body>
</html>