
<?php
	include '../conn.php';
	if(isset($_POST['date']))
	{
		$date = $_POST['date'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="row" style="background-color:;">
<br>
		<?php
			
			$class_sql = "SELECT * FROM `class_update` WHERE `date`='$date' ORDER BY `start_time` ";
			$class_result = mysqli_query($conn,$class_sql);
			$num_rows = mysqli_num_rows($class_result);
		?>
	<div class="panel">
		<div class="panel-body">
			<div class="row">
				<div class="table-responsive">
					<table id="" class="table">
					<?php
					if($num_rows>0)
					{
						//$header_date = $current_date;
					?>
					<tr style='background-color: #2c3e50; color: white'>
						<th>Course </th>
						<th>From </th>
						<th>To  </th>
						<th>At </th>
					</tr>
					<?php
						while($class_row = mysqli_fetch_assoc($class_result))
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
				?>
				</table>
			</div>
		</div>
	</div>
</div>
</div>

</body>
</html>