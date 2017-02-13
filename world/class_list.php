<?php
include '../conn.php';
if(isset($_POST['date']) && isset($_POST['sem']))
{
	$date = $_POST['date'];
	$sem = $_POST['sem'];
	$class_sql = "SELECT * FROM `class_update` WHERE `date`='$date'";
	$class_sql_result = mysqli_query($conn,$class_sql);
	$visited = array();
	$venue_array = array();
	$start_time_array = array();
	$end_time_array = array();
	if($class_sql_result)
	{
		while($row = mysqli_fetch_assoc($class_sql_result))
		{
			//echo "OOO";
			$course_name = $row['course_name'];
			$start_time = $row['start_time'];
			$end_time = $row['end_time'];
			$venue = $row['venue'];
			$id = $row['id'];
			//echo "$course_name ";
			$visited[$course_name]=1;
			$venue_array[$course_name]=$venue;
			$start_time_array[$course_name]=$start_time;
			$end_time_array[$course_name]=$end_time;
		}
	}
	else echo "Problem";
}
else echo "ddddddddddddddds";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="class_update_js.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		option{
			font-size: 0.9vw;
		}
		input[type='checkbox']{
			width: 0.9vw;
		}
	</style>
</head>
<body>
	<table class="table table-responsive" id="class_table">
		
		<?php
			$sql_courses = "SELECT * FROM course WHERE `semester`='$sem' AND `type`='course_name'";
			$sql_courses_result = mysqli_query($conn,$sql_courses);
			$num_row = mysqli_num_rows($sql_courses_result);
			if($num_row>0)
			{
		?>
			<tr style="background-color: #7f8c8d; color: white">
				<th>Course </th>
				<th>From </th>
				<th>To  </th>
				<th>At </th>
			</tr>

		<?php
			$i = 1;
			while ($course_row = mysqli_fetch_assoc($sql_courses_result)) {
				for($i=1;$i<=9;$i++)
				{
					$crs = $course_row["course$i"];
					//echo $crs;
		?> 
					<tr>
						<td>
							<div class='checkbox' >
								<?php
									$found = 0; 
									if(isset($visited[$crs]))
									{
										$found=1;
									}
								?>
								<?php
									if($found)
									{
										$start_time_arr = explode(':', $start_time_array[$crs]);
										$start_hrs = $start_time_arr[0];
										$start_min = $start_time_arr[1];

										$end_time_arr = explode(':', $end_time_array[$crs]);
										$end_hrs = $end_time_arr[0];
										$end_min = $end_time_arr[1];
										//echo "$start_hrs - $start_min -> $end_hrs - $end_min";

								?>
									<span class="glyphicon glyphicon-remove class_cancel_btn" id=<?php echo "class_cancel_$id"?> ></span>
								<?php
									}
									else 
									{
										$start_hrs = 0;
										$start_min = -1;
										$end_hrs = 0;
										$end_min = -1;

									}
								?>
								<label style="font-size: 1vw;"><input id=<?php echo "course$i" ?> type='checkbox' <?php if($found) echo "checked" ?> /><?php echo $crs?></label>
								
							</div>
						</td>
						<td width='20%'>
							<form class='form-inline'>
								<select id=<?php echo "hrscourse$i"?> class='form-control start_hrs slt' >
									<option <?php if($start_hrs==0) echo "selected"?> >Hour</option>
									<option <?php if($start_hrs==8) echo "selected"?> > 8 </option>
									<option <?php if($start_hrs==9) echo "selected"?> >9</option>
									<option <?php if($start_hrs==10) echo "selected"?> >10</option>
									<option <?php if($start_hrs==11) echo "selected"?> >11</option>
									<option <?php if($start_hrs==12) echo "selected"?> >12</option>
									<option <?php if($start_hrs==1) echo "selected"?> >1</option>
									<option <?php if($start_hrs==2) echo "selected"?> >2</option>
									<option <?php if($start_hrs==3) echo "selected"?> >3</option>
									<option <?php if($start_hrs==4) echo "selected"?> >4</option>
									<option <?php if($start_hrs==5) echo "selected"?> >5</option>
								</select>:
								<select id=<?php echo "mincourse$i"?> class='form-control start_min' >
									<option <?php if($start_min==-1) echo "selected"?> >Min</option>
									<option <?php if($start_min==0) echo "selected"?> >00</option>
									<option <?php if($start_min==5) echo "selected"?> >05</option>
									<option <?php if($start_min==10) echo "selected"?> >10</option>
									<option <?php if($start_min==15) echo "selected"?> >15</option>
									<option <?php if($start_min==20) echo "selected"?> >20</option>
									<option <?php if($start_min==25) echo "selected"?> >25</option>
									<option <?php if($start_min==30) echo "selected"?> >30</option>
									<option <?php if($start_min==35) echo "selected"?> >35</option>
									<option <?php if($start_min==40) echo "selected"?> >40</option>
									<option <?php if($start_min==45) echo "selected"?> >45</option>
									<option <?php if($start_min==50) echo "selected"?> >50</option>
									<option <?php if($start_min==55) echo "selected"?> >55</option>
								</select>
							</form>
						</td>

						<td width='20%'>
							<form class='form-inline'>
								<select class='form-control end_hrs' id=<?php echo "end_hrscourse$i"?> >
									<option <?php if($end_hrs==0) echo "selected"?> >Hour</option>
									<option <?php if($end_hrs==8) echo "selected"?> > 8 </option>
									<option <?php if($end_hrs==9) echo "selected"?> >9</option>
									<option <?php if($end_hrs==10) echo "selected"?> >10</option>
									<option <?php if($end_hrs==11) echo "selected"?> >11</option>
									<option <?php if($end_hrs==12) echo "selected"?> >12</option>
									<option <?php if($end_hrs==1) echo "selected"?> >1</option>
									<option <?php if($end_hrs==2) echo "selected"?> >2</option>
									<option <?php if($end_hrs==3) echo "selected"?> >3</option>
									<option <?php if($end_hrs==4) echo "selected"?> >4</option>
									<option <?php if($end_hrs==5) echo "selected"?> >5</option>
								</select>: 
								<select class='form-control end_min' id=<?php echo "end_mincourse$i"?> >
									<option <?php if($end_min==-1) echo "selected"?> >Min</option>
									<option <?php if($end_min==0) echo "selected"?> >00</option>
									<option <?php if($end_min==5) echo "selected"?> >05</option>
									<option <?php if($end_min==10) echo "selected"?> >10</option>
									<option <?php if($end_min==15) echo "selected"?> >15</option>
									<option <?php if($end_min==20) echo "selected"?> >20</option>
									<option <?php if($end_min==25) echo "selected"?> >25</option>
									<option <?php if($end_min==30) echo "selected"?> >30</option>
									<option <?php if($end_min==35) echo "selected"?> >35</option>
									<option <?php if($end_min==40) echo "selected"?> >40</option>
									<option <?php if($end_min==45) echo "selected"?> >45</option>
									<option <?php if($end_min==50) echo "selected"?> >50</option>
									<option <?php if($end_min==55) echo "selected"?> >55</option>
								</select>
							</form>
						</td>

						<td>
							<input id=<?php echo "venuecourse$i" ?>  type='text' class='form-control' value= <?php if($found) echo "$venue_array[$crs]"?> >
						</td>
					</tr>
		<?php
				}
			}
		?>
	</table>
	<button class="btn btn-success pull-right" id="class_update_btn" data-dismiss="modal">Update</button>
	<?php 
		}
		else 
		{
	?>
	<div style="color: white;background-color: #d35400;padding: 10px;font-size: 1vw">
		<center>Sorry Nothing Found</center>
	</div>
	<?php
		}
	?>
</body>
</html>