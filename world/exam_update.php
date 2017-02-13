<?php 

      include '../conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="exam_update_js.js"></script>
</head>
<body>
      <div id="exam_list_div">
      <table class="table" id="exam_list">
            <tr>
                  <th width="35%">Date</th>
                  <th width="65%">Course Name</th>
            </tr>
            <?php 
                  $current_date = date("Y-m-d");
                  $exam_list_sql = "SELECT * FROM `exam_update` WHERE `date`>='$current_date'";
                  $exam_list_result = mysqli_query($conn,$exam_list_sql);
                  if($exam_list_result)
                  {
                        while ($row=mysqli_fetch_assoc($exam_list_result)) 
                        {
                              $date = $row['date'];
                              $course = $row['course_name'];
                              $id = $row['id'];
            ?>
            <tr id=<?php echo "row$id"?> >
                  <td id=<?php echo "date$id"?>> <?php echo $date ?> </td>
                  <td id=<?php echo "exam$id"?>> <?php echo $course ?> </td>
                  <td>
                        <button class="btn btn-danger remove_exam_btn" id=<?php echo $id?>>Remove X</button>
                  </td>
            </tr>
            <?php
                              # code...
                        }
                  }

            ?>  
      </table>
      <button class="btn btn-primary" id="update_back_btn">Back To Update</button>
      <button class="btn btn-default pull-right" id="remove_done_btn" data-dismiss="modal">Done</button>
      </div>
      <div id="exam_update_div">
	<table class="table" id="exam_table">
    	       <tr>
      		<th width="35%">Date</th>
      		<th width="65%">Course Name</th>
      	</tr>
            <?php
            $current_date = date("Y-m-d");
            $exam_list_sql = "SELECT * FROM `exam_update` WHERE `date`>='$current_date'";
            $exam_list_result = mysqli_query($conn,$exam_list_sql);
            if($exam_list_result)
            {
                  while ($row=mysqli_fetch_assoc($exam_list_result)) 
                  {
                        $date = $row['date'];
                        $course = htmlspecialchars($row['course_name']);
                        $id = $row['id'];
            ?>
      	<tr>
      		<td>
      			<input type="" name="" value=<?php echo $date ?> class="form-control exam_date_input" placeholder="Pick a Valid Date" />
      		</td>
      		<td>
      			<?php
                        echo "<input type='text' name='' value='$course' class='form-control' placeholder='Course Name of Exam'> ";
                        ?>
      		</td>
      	</tr>
            <?php 
                  }
            }
            ?>
      	<tr>
      		<td>
      			<input type="" name="" class="form-control exam_date_input" placeholder="Pick a Valid Date">
      		</td>
      		<td>
      			<input type="text" name="" class="form-control" placeholder="Course Name of Exam">
      		</td>
      	</tr>

      	<tr>
      		<td>
      			<input type="" name="" class="form-control exam_date_input" placeholder="Pick a Valid Date">
      		</td>
      		<td>
      			<input type="text" name="" class="form-control" placeholder="Course Name of Exam">
      		</td>
      	</tr>
      	
      	<tr id="exam_row">
      		<td>
      			<input type="text" name="" class="form-control exam_date_input" placeholder="Pick a Valid Date">
      		</td>
      		<td>
      			<input type="text" name="" class="form-control" placeholder="Course Name of Exam">
      		</td>
      	</tr>
      </table>
      <button class="btn btn-success" id="exam_update_submit_btn" data-dismiss="modal" >Update</button>
      <button class="btn btn-info" id="addmore_btn">Add More</button>
      <button class="btn btn-danger pull-right" id="cancel_exam_btn">Cancel An Exam</button>
      </div>
      

</body>
</html>