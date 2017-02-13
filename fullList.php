<?php
include 'conn.php';
$sql = "SELECT * FROM user_data ORDER BY reg_no";
$result = mysql_query($sql,$conn);
$rows = mysql_num_rows($result);
echo 	"<table class='table table-striped'>
			<tr>
				<th>Name</th>
				<th>Registration Number</th>
				<th>Email ID</th>
			</tr>";
	while($row=mysql_fetch_assoc($result))
	{
		echo "<tr>
					<td>".$row['first_name']." ".$row['last_name']."</td>
					<td>".$row['reg_no']."</td>
					<td>".$row['email']."</td>
			</tr>";		
	}
	echo "</table>";




?>