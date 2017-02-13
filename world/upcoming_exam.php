<?php
include '../conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		$("#exam_update_btn").click(function(){
			$.ajax({
				method:"post",
				url:"exam_update.php",
				success:function(data)
				{
					$("#exam_div").html(data);
				}
			})
		});
		$("#show_all_exam_btn").unbind('click').bind('click',function(){
			$.ajax({
				method:"post",
				url:"full_exam_update.php",
				success:function(data)
				{
					$("#full_exam_div").html(data);
				}
			})

		})

	</script>
</head>
<body>

<div class="panel" style="width: 95%; margin-left: 4%">
	<div class="panel-heading" style="background-color: #e67e22">
		<strong style="font-size: 11px; color: white;">Upcoming Exams : </strong>
	</div>
	<div class="panel-body" style="border:2px solid #e67e22">
	<?php
		$current_date = date("Y-m-d");
		$exam_sql = "SELECT * FROM `exam_update` WHERE `date`>='$current_date' ORDER BY `date` LIMIT 3";
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
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 xm-name">
			<?php echo $course ?>
		</div>
	</div>
			<?php
				}
					}
			?>
	<button class="btn btn-primary btn-sm pull-right" id="show_all_exam_btn" data-toggle="modal" data-target="#exam_update_full_div">Show All</button>
		<?php
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
	<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#exam_update" id="exam_update_btn">Update</button>
	</div>
</div>

</body>
</html>