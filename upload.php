<?php

	ini_set('upload_max_filesize', '10M');
	ini_set('post_max_size', '10M');
	ini_set('max_input_time', 600);
	ini_set('max_execution_time', 600);
	include 'conn.php';
	if(isset($_POST["img_up_btn"]) && !empty($_FILES['fileToUpload']))
	{		
		$reg = $_POST['tmp_reg'];
		$target_dir = "user_image/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$name = $_FILES["fileToUpload"]["name"];
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
		/* if ($_FILES["fileToUpload"]["size"] > 5000000) {
			$uploadOk = 0;
		} */
		if(strtolower($imageFileType) == "jpg" ||strtolower($imageFileType) == "png" || strtolower($imageFileType) == "jpeg" || strtolower($imageFileType) == "gif"  ) {
			$uploadOk = 1;
		}
		if($uploadOk==1)
		{
			if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
			{
				$sql = "UPDATE `user_data` SET `image`='$name' WHERE `reg_no` = $reg";
				$result = mysqli_query($conn,$sql);
				if(!$result)
				{
					echo 0;
				}
				else echo $target_file."1";
			}
			else echo 0;
			
		}
			
		
	}
	else echo 0;







?>