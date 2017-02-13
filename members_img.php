<?php
include 'conn.php';

?>
<div class="row memberimage" style="border-left:4px solid #fe6d02;" id="members">
	<br><br><br>
	<h2  style="height:45px; line-height:45px; margin-left: 5%" class="slideanim">Visit Our Members</h2><br>
		<div class="row slideanim">
			<?php 
				$members = array(array());
				$sql = "SELECT * FROM student_list ORDER BY RAND() LIMIT 8";
				$result = mysqli_query($conn,$sql);
				if($result)
				{
					$i=0;
					while ($row = mysqli_fetch_assoc($result)) {
						$members[$i]= $row;
						$i++;
						//echo $members[1]['name'];
					}
				}
				else echo "Not Found".mysqli_error($conn);

			?>
			<div class="col-lg-3 col-sm-3 col-xs-3 ">
				<?php
					$name = $members[0]['name'];
					$reg = $members[0]['reg_no'];
					$pos = $members[0]['current_position'];
					$email = $members[0]['email'];
					$hometown = $members[0]['hometown'];
					$image = $members[0]['image'];
					$nick_name = $members[0]['nick_name'];
				?>
				<div style="position:relative;" id="member0" class="shadow_div">  
					<img src=<?php echo "images/$image" ?> class="img-responsive img-circle" style="margin:auto" width="175px" height="175px" id=""/><br>
	   				<div id="shadow_member0" class="shadow">
	   					<center style="margin-top: 12%; " class="shadow_text">
	   						<h5>Name : <?php echo $name?></h5>
	   						<h6>Reg No : <?php echo $reg?></h6>
	   						<h6>Home District : <?php echo $hometown?></h6>
	   						<h6>Current Position : <?php echo $pos?></h6>
	   						<h6>Contact : <?php echo $email?></h6>
	   					</center>
	   				</div>
	   			</div>

				<div class="  text-center memberbtn"><?php echo $nick_name?></div>
			</div>


			<div class="col-lg-3 col-sm-3 col-xs-3 " style="border-left: 3px solid #16a085">
				<?php
					$name = $members[1]['name'];
					$reg = $members[1]['reg_no'];
					$pos = $members[1]['current_position'];
					$email = $members[1]['email'];
					$hometown = $members[1]['hometown'];
					$image = $members[1]['image'];
					$nick_name = $members[1]['nick_name'];
				?>
				<div style="position:relative;" id="member1" class="shadow_div">  
					<img src=<?php echo "images/$image" ?> class="img-responsive img-circle" style="margin:auto" width="175px" height="175px" id=""/><br>
	   				<div id="shadow_member1" class="shadow">
	   					<center style="margin-top: 12%; " class="shadow_text">
	   						<h5>Name : <?php echo $name?></h5>
	   						<h6>Reg No : <?php echo $reg?></h6>
	   						<h6>Home District : <?php echo $hometown?></h6>
	   						<h6>Current Position : <?php echo $pos?></h6>
	   						<h6>Contact : <?php echo $email?></h6>
	   					</center>
	   				</div>
	   			</div>

				<div class="  text-center memberbtn"><?php echo $nick_name?></div>
			</div>


			<div class="col-lg-3 col-sm-3 col-xs-3 " style="border-left: 3px solid #16a085">
				<?php
					$name = $members[2]['name'];
					$reg = $members[2]['reg_no'];
					$pos = $members[2]['current_position'];
					$email = $members[2]['email'];
					$hometown = $members[2]['hometown'];
					$image = $members[2]['image'];
					$nick_name = $members[2]['nick_name'];
				?>
				<div style="position:relative;" id="member2" class="shadow_div">  
					<img src=<?php echo "images/$image" ?> class="img-responsive img-circle" style="margin:auto" width="175px" height="175px" id=""/><br>
	   				<div id="shadow_member2" class="shadow">
	   					<center style="margin-top: 12%; " class="shadow_text">
	   						<h5>Name : <?php echo $name?></h5>
	   						<h6>Reg No : <?php echo $reg?></h6>
	   						<h6>Home District : <?php echo $hometown?></h6>
	   						<h6>Current Position : <?php echo $pos?></h6>
	   						<h6>Contact : <?php echo $email?></h6>
	   					</center>
	   				</div>
	   			</div>

				<div class="  text-center memberbtn"><?php echo $nick_name?></div>
			</div>


			<div class="col-lg-3 col-sm-3 col-xs-3 " style="border-left: 3px solid #16a085">
				<?php
					$name = $members[3]['name'];
					$reg = $members[3]['reg_no'];
					$pos = $members[3]['current_position'];
					$email = $members[3]['email'];
					$hometown = $members[3]['hometown'];
					$image = $members[3]['image'];
					$nick_name = $members[3]['nick_name'];
				?>
				<div style="position:relative;" id="member3" class="shadow_div">  
					<img src=<?php echo "images/$image" ?> class="img-responsive img-circle" style="margin:auto" width="175px" height="175px" id=""/><br>
	   				<div id="shadow_member3" class="shadow">
	   					<center style="margin-top: 12%; " class="shadow_text">
	   						<h5>Name : <?php echo $name?></h5>
	   						<h6>Reg No : <?php echo $reg?></h6>
	   						<h6>Home District : <?php echo $hometown?></h6>
	   						<h6>Current Position : <?php echo $pos?></h6>
	   						<h6>Contact : <?php echo $email?></h6>
	   					</center>
	   				</div>
	   			</div>

				<div class="  text-center memberbtn"><?php echo $nick_name?></div>
			</div>
		</div>
		<br><br>
	<div class="row slideanim">
					<div class="col-lg-3 col-sm-3 col-xs-3 ">
				<?php
					$name = $members[4]['name'];
					$reg = $members[4]['reg_no'];
					$pos = $members[4]['current_position'];
					$email = $members[4]['email'];
					$hometown = $members[4]['hometown'];
					$image = $members[4]['image'];
					$nick_name = $members[4]['nick_name'];
				?>
				<div style="position:relative;" id="member4" class="shadow_div">  
					<img src=<?php echo "images/$image" ?> class="img-responsive img-circle" style="margin:auto" width="175px" height="175px" id=""/><br>
	   				<div id="shadow_member4" class="shadow">
	   					<center style="margin-top: 12%; " class="shadow_text">
	   						<h5>Name : <?php echo $name?></h5>
	   						<h6>Reg No : <?php echo $reg?></h6>
	   						<h6>Home District : <?php echo $hometown?></h6>
	   						<h6>Current Position : <?php echo $pos?></h6>
	   						<h6>Contact : <?php echo $email?></h6>
	   					</center>
	   				</div>
	   			</div>

				<div class="  text-center memberbtn"><?php echo $nick_name?></div>
			</div>


			<div class="col-lg-3 col-sm-3 col-xs-3 " style="border-left: 3px solid #16a085">
				<?php
					$name = $members[5]['name'];
					$reg = $members[5]['reg_no'];
					$pos = $members[5]['current_position'];
					$email = $members[5]['email'];
					$hometown = $members[5]['hometown'];
					$image = $members[5]['image'];
					$nick_name = $members[5]['nick_name'];
				?>
				<div style="position:relative;" id="member5" class="shadow_div">  
					<img src=<?php echo "images/$image" ?> class="img-responsive img-circle" style="margin:auto" width="175px" height="175px" id=""/><br>
	   				<div id="shadow_member5" class="shadow">
	   					<center style="margin-top: 12%; " class="shadow_text">
	   						<h5>Name : <?php echo $name?></h5>
	   						<h6>Reg No : <?php echo $reg?></h6>
	   						<h6>Home District : <?php echo $hometown?></h6>
	   						<h6>Current Position : <?php echo $pos?></h6>
	   						<h6>Contact : <?php echo $email?></h6>
	   					</center>
	   				</div>
	   			</div>

				<div class="  text-center memberbtn"><?php echo $nick_name?></div>
			</div>


			<div class="col-lg-3 col-sm-3 col-xs-3 " style="border-left: 3px solid #16a085">
				<?php
					$name = $members[6]['name'];
					$reg = $members[6]['reg_no'];
					$pos = $members[6]['current_position'];
					$email = $members[6]['email'];
					$hometown = $members[6]['hometown'];
					$image = $members[6]['image'];
					$nick_name = $members[6]['nick_name'];
				?>
				<div style="position:relative;" id="member6" class="shadow_div">  
					<img src=<?php echo "images/$image" ?> class="img-responsive img-circle" style="margin:auto" width="175px" height="175px" id=""/><br>
	   				<div id="shadow_member6" class="shadow">
	   					<center style="margin-top: 12%; " class="shadow_text">
	   						<h5>Name : <?php echo $name?></h5>
	   						<h6>Reg No : <?php echo $reg?></h6>
	   						<h6>Home District : <?php echo $hometown?></h6>
	   						<h6>Current Position : <?php echo $pos?></h6>
	   						<h6>Contact : <?php echo $email?></h6>
	   					</center>
	   				</div>
	   			</div>

				<div class="  text-center memberbtn"><?php echo $nick_name?></div>
			</div>


			<div class="col-lg-3 col-sm-3 col-xs-3 " style="border-left: 3px solid #16a085">
				<?php
					$name = $members[7]['name'];
					$reg = $members[7]['reg_no'];
					$pos = $members[7]['current_position'];
					$email = $members[7]['email'];
					$hometown = $members[7]['hometown'];
					$image = $members[7]['image'];
					$nick_name = $members[7]['nick_name'];
				?>
				<div style="position:relative;" id="member7" class="shadow_div">  
					<img src=<?php echo "images/$image" ?> class="img-responsive img-circle" style="margin:auto" width="175px" height="175px" id=""/><br>
	   				<div id="shadow_member7" class="shadow">
	   					<center style="margin-top: 12%; " class="shadow_text">
	   						<h5>Name : <?php echo $name?></h5>
	   						<h6>Reg No : <?php echo $reg?></h6>
	   						<h6>Home District : <?php echo $hometown?></h6>
	   						<h6>Current Position : <?php echo $pos?></h6>
	   						<h6>Contact : <?php echo $email?></h6>
	   					</center>
	   				</div>
	   			</div>

				<div class="  text-center memberbtn"><?php echo $nick_name?></div>
			</div>
	</div>
	<br><br>
</div>