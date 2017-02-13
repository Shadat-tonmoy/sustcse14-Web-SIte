<?php
include '../conn.php';
if(isset($_POST['sem']))
{//i
	$sem = $_POST['sem'];
	$course_sql = "SELECT * FROM `course` WHERE `semester`='$sem' ";
	$course_sql_result = mysqli_query($conn,$course_sql);
}
else echo "NOt set";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="share_note.js"></script>
	<style>
	</style>
</head>
<body>
      <div id="share_note_div">
		<table class="table" id="note_table">
    	       <tr>
      		<th width="20%">Course</th>
      		<th width="15%">Author</th>
      		<th width="30%">Link</th>
      		<th width="15%">Type</th>
                  <th width="20%">Description</th>
      	</tr>
      	<tr>
      		<td>
      			<select class="form-control course_name">
      				<option selected> Select a Course </option>
				<?php
	      			if($course_sql_result)
	      			{
	      				$row = mysqli_fetch_assoc($course_sql_result);
	      				for($i=1;$i<=10;$i++)
	      				{
	      					$index = "course$i";
	      					$course = $row[$index];
	      					if($course!=NULL)
	      					{
	      				
	      		?>
      				<option> <?php echo $course ?> </option>
      			<?php
      						}
      					}
      				}
      			?>
      			</select>
      		</td>
      		<td>
      			<input type="text" name="author" class="form-control" placeholder="Author Name">
      		</td>
      		<td>
      			<input type="text" name="link" class="form-control" placeholder="Paste Your Notes Link Here">
      		</td>
      		<td>
      			<select class="form-control link_type">
      				<option>Select a Type</option>
      				<option>Class Notes</option>
      				<option>Reff. Book</option>
      				<option>Sample Question</option>
      				<option>Others</option>

      			</select>
      		</td>
                  <td>
                        <input type="text" class="form-control" placeholder="Add a Short Description">
                  </td>
      	</tr>

      	<tr>

      		<td>
      			<select class="form-control">
      				<option selected>Select a Course</option>
				<?php
						for($i=1;$i<=10;$i++)
	      				{
	      					$index = "course$i";
	      					$course = $row[$index];
	      					if($course!=NULL)
	      					{
	      				
	      		?>
      				<option><?php echo $course ?></option>
      			<?php
      						}
      					}
      				
      			?>
      			</select>
      		</td>

      		<td>
      			<input type="text" name="" class="form-control" placeholder="Author Name">
      		</td>
      		<td>
      			<input type="text" name="" class="form-control" placeholder="Paste Your Notes Link Here">
      		</td>
      		<td>
      			<select class="form-control">
      				<option>Select a Type</option>
      				<option>Class Notes</option>
      				<option>Reff. Book</option>
      				<option>Sample Question</option>
      				<option>Others</option>

      			</select>
      		</td>
                  <td>
                        <input type="text" class="form-control" placeholder="Add a Short Description">
                  </td>
      	</tr>

      	<tr>      		
      		<td>
      			<select class="form-control">
      				<option selected>Select a Course</option>
				<?php
						for($i=1;$i<=10;$i++)
	      				{
	      					$index = "course$i";
	      					$course = $row[$index];
	      					if($course!=NULL)
	      					{
	      				
	      		?>
      				<option><?php echo $course ?></option>
      			<?php
      						}
      					}
      				
      			?>
      			</select>
      		</td>
      		<td>
      			<input type="text" name="" class="form-control" placeholder="Author Name">
      		</td>
      		<td>
      			<input type="text" name="" class="form-control" placeholder="Paste Your Notes Link Here">
      		</td>
      		<td>
      			<select class="form-control">
      				<option>Select a Type</option>
      				<option>Class Notes</option>
      				<option>Reff. Book</option>
      				<option>Sample Question</option>
      				<option>Others</option>

      			</select>
      		</td>
                  <td>
                        <input type="text" class="form-control" placeholder="Add a Short Description">
                  </td>
      	</tr>
      	
      	<tr id="notes_row">
      		<td>
      			<select class="form-control">
      				<option selected>Select a Course</option>
				<?php
						for($i=1;$i<=10;$i++)
	      				{
	      					$index = "course$i";
	      					$course = $row[$index];
	      					if($course!=NULL)
	      					{
	      				
	      		?>
      				<option><?php echo $course ?></option>
      			<?php
      						}
      					}
      				
      			?>
      			</select>
      		</td>
      		<td>
      			<input type="text" name="" class="form-control" placeholder="Author Name">
      		</td>
      		<td>
      			<input type="text" name="" class="form-control" placeholder="Paste Your Notes Link Here">
      		</td>
      		<td>
      			<select class="form-control">
      				<option>Select a Type</option>
      				<option>Class Notes</option>
      				<option>Reff. Book</option>
      				<option>Sample Question</option>
      				<option>Others</option>

      			</select>
      		</td>
                  <td>
                        <input type="text" class="form-control" placeholder="Add a Short Description">
                  </td>
      	</tr>

            
      </table>
      <button class="btn btn-success" id="note_share_now_btn">Share Now!!</button>
      <button class="btn btn-info" id="notes_addmore_btn">Add More</button>
      </div>
      
      
</body>
</html>