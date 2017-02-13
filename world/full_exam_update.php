<?php
include '../conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		

	</script>
	<style type="text/css">
		.xm-name-full{
		    border-bottom: 3px solid red;
		    height: 40px;
		    line-height: 40px;
		    color: white;
		    background: #34495e;
		    margin-top: 5px;
		    font-size: 13px;
		    margin-left: -7%;
		}
	</style>
</head>
<body>

<div class="panel">
	<div class="panel-body" style="border-left: 2px solid #2980b9">
	<?php
		$current_date = date("Y-m-d");
		$exam_sql = "SELECT * FROM `exam_update` WHERE `date`>='$current_date' ORDER BY `date` ";
		$exam_sql_result = mysqli_query($conn,$exam_sql);
		$rows = mysqli_num_rows($exam_sql_result);
		if($rows>0)
		{
			while($row=mysqli_fetch_assoc($exam_sql_result))
			{
				$course = $row['course_name'];
				$date = $row['date'];
				if($date>=$current_date)
				{
					$date_array = array();
					$date_array = explode('-', $date);
					$year = $date_array[0];
					$month_i = intval($date_array[1]);
					$date = $date_array[2];
					$month_array = array("Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec");
					$month = $month_array[$month_i-1];
	?>

	<div class="row" style="margin-bottom: 10px">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
			<p class="calendar"><?php echo $date?> <em><?php echo $month?></em></p>	
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 xm-name-full">
			<?php echo $course ?>
		</div>
	</div>
			<?php
				}
			}
		}
		else 
		{
		?>
	<center>
		<img src="images/sad_panda.jpeg" width="90px" height="90px">
		<h5>No Exam Update</h5>
	</center>
		<?php
		}
		?>
	</div>
</div>

</body>
</html>