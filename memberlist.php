<?php
	include 'conn.php';	
?>
<div id="memberlist_div" class="row slideanim" style="border-left:5px solid #008933; background-color:">
	<div class="panel panel-body memberlist">
		<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
			<img class="img-responsive slideanim" width="300px" height="300px" src="images/olist.png"; style=";"/>
		</div>
		<div class="col-sm-8 col-xs-8 col-md-8 col-lg-8">
			<div class="panel-heading bg-info slideanim">
				<h5 style="letter-spacing:5px;">Our List......</h5>
			</div>
			<br><br>
				<div id="top5">
				<?php 
					$sql = "SELECT * FROM user_data ORDER BY reg_no";
					$result = mysqli_query($conn,$sql);
					if($result)
					{
						
					$rows = mysqli_num_rows($result);
					}
					//echo "total ".$rows." is found<br>";
					$count = 0;
					if(isset($_SESSION['id']))
					{
						echo 
						"<table class='table table-striped slideanim'>
							<tr>
								<th>Name</th>
								<th>Registration Number</th>
								<th>Email ID</th>
							</tr>
						";
						while($row=mysqli_fetch_assoc($result))
						{
							echo 
							"<tr>
								<td>".$row['first_name']." ".$row['last_name']."</td>
								<td>".$row['reg_no']."</td>
								<td>".$row['email']."</td>
							</tr>";
							if($count==4)
								break;
							$count++;
						}
						echo "</table>";
					
				?>
				</div>
				<?php 
					
						echo "<button type='button' class='btn btn-default pull-right' id='showall' >Show All</button>";
						echo "<div id='res'></div>";
					}
					else 
					{
						echo "<div class='notloggedin'> You Are Not Logged In!!! Please 
						<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#my_modal' >Log In</button>
						
						</div>";
					}
				?>
			<div id="res" class="col-lg-12"></div>
			
		</div>		
	</div>	
</div>