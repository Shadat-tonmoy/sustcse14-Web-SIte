
<?php
	include '../conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#show_all_class_btn").click(function(){
			date = $("#class_date").attr("date");
			//alert(date);
			$.ajax({
				method:"POST",
				url:"full_class_update.php",
				data:{date:date},
				success:function(data)
				{
					$("#full_class_update_div").html(data);
				}
			})
		})
	})
	</script>
</head>
<body>

<div class="row" style="background-color:;">
<br>
		<?php
			$current_date = date("Y-m-d");
			$next_date = date("Y-m-d", strtotime("$current_date +1 day"));
			//echo $current_date." -> ".$next_date;
			$class_sql_current_date = "SELECT * FROM `class_update` WHERE `date`='$current_date' ORDER BY `start_time` LIMIT 4";
			$class_sql_next_date = "SELECT * FROM `class_update` WHERE `date`='$next_date' ORDER BY `start_time` LIMIT 4";
			$class_result_current_date = mysqli_query($conn,$class_sql_current_date);
			$num_rows_current_date = mysqli_num_rows($class_result_current_date);
			$class_result_next_date = mysqli_query($conn,$class_sql_next_date);
			$num_rows_next_date = mysqli_num_rows($class_result_next_date);
		?>
	<div class="panel" style="width: 81%;margin-left: 11%;margin-top: -10px;">
		<div class="panel-heading" style="background-color: #e67e22">
			<strong id="" style="font-size: 0.9vw; color: white;">Classes of <span>
			<?php 
				if($num_rows_next_date>0)
				{
					$header_date = date("d-M-Y",strtotime($next_date));									
				}
				else if($num_rows_current_date>0)
				{
					$header_date = date("d-M-Y",strtotime($current_date));
				}
				else 
				{
					$header_date = date("d-M-Y");
				}
			?>
			<span id="class_date" date=<?php echo date("Y-m-d",strtotime($header_date)); ?>>
				<?php echo trim($header_date);?>	
			</span>
			</span> : </strong>
		</div>
		<div class="panel-body" style="border:2px solid #e67e22">
			<div class="row" style="margin-bottom:-20px">
				<div class="table-responsive">
					<table id="class_table" class="table" style="font-size: 11px;">
					<?php
										//echo $num_rows_current_date." next day :  ".$num_rows_next_date;
					if($num_rows_next_date>0)
					{
						$header_date = $next_date;
						$delete_prev_sql = "DELETE FROM `class_update` WHERE `date` <= '$current_date'";
						$delete_prev_result = mysqli_query($conn,$delete_prev_sql);
						if($delete_prev_result)
						{
												//echo "Previous records are cleared ";
						}
						else echo mysqli_error($conn);
					?>
					<tr style='background-color: #2c3e50; color: white'>
						<th>Course </th>
						<th>From </th>
						<th>To  </th>
						<th>At </th>
					</tr>
					<?php
						while($class_row = mysqli_fetch_assoc($class_result_next_date))
						{
							$course = $class_row['course_name'];
							$start_time = $class_row['start_time'];
							$end_time = $class_row['end_time'];
							$venue = $class_row['venue'];
					?>
					<tr>
						<td><?php echo $course?></td>
						<td><?php echo $start_time?></td>
						<td><?php echo $end_time?></td>
						<td><?php echo $venue?></td>
					</tr>
					<?php
						}	
					}
					else if($num_rows_current_date>0)
					{
						$header_date = $current_date;
					?>
					<tr style='background-color: #2c3e50; color: white'>
						<th>Course </th>
						<th>From </th>
						<th>To  </th>
						<th>At </th>
					</tr>
					<?php
						while($class_row = mysqli_fetch_assoc($class_result_current_date))
						{
							$course = $class_row['course_name'];
							$start_time = $class_row['start_time'];
							$end_time = $class_row['end_time'];
							$venue = $class_row['venue'];
					?>
					<tr>
						<td><?php echo $course?></td>
						<td><?php echo $start_time?></td>
						<td><?php echo $end_time?></td>
						<td><?php echo $venue?></td>
					</tr>

					<?php
					}
				}
				else {

				?>
				<center>
					<img src='images/no_update.jpg' class='no_update_img'/>
					<strong><h5 style='font-size: 1vw;''>No class update available...</h5></strong>
				</center>
				<?php

				}
				?>

				</table>
			</div>
		</div>

		<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#class_update" id="update_btn">
		Update
		</button>
		<?php
			if($num_rows_current_date>0 || $num_rows_next_date>0)
			{
		?>
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#show_all_class_update" id="show_all_class_btn">Show All</button>
		<?php
			}
		?>
	</div>
</div>
</div>

</body>
</html>