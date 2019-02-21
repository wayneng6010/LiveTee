<?php
// include 'verficationAdmin.php';
	session_start();
	require_once 'conn.php';
	require 'html/adminClothingAdd.html';

	if($_SESSION['role']==1){
		echo "<script>
            var e = document.getElementsByClassName('addStaffbtn')[0];
            e.style.display = 'inline-block';
            </script>";
	}

	if(isset($_POST['add'])){
		$iname = $_POST['iname'];
		$iprice = $_POST['iprice'];
		$idescription = $_POST['idescription'];
		// $isize = $_POST['isize'];
		$isize = "";
		$checked_count = count($_POST['isize']);
		$counter = 1;
		foreach($_POST['isize'] as $selected) {
			// echo "<script>alert('".$isize."')</script>";
			if($counter < $checked_count){
				$isize .= $selected . ",";
			// echo "<script>alert('".$selected."')</script>";
			}else{
				$isize .= $selected;
			}
			$counter += 1;
		}
		$icat = $_POST['icat'];
		$itag = $_POST['itag'];
		$istatus = $_POST['istatus'];
		$imageName = mysql_real_escape_string($_FILES["iimg"]["name"]);
		$imageData = mysql_real_escape_string(file_get_contents($_FILES["iimg"]["tmp_name"]));
		$imageType = mysql_real_escape_string($_FILES["iimg"]["type"]);

		// echo "<script>alert('".$isize."')</script>";
		if(substr($imageType, 0, 5) == "image"){
			$sql1 = "INSERT INTO item VALUES(null, '$iname', '$iprice', '$idescription', '$isize', '$icat', '$imageData' , '$itag', '$istatus')";
			if($result1 = mysqli_query($link,$sql1)){
				echo "<script>alert('Success')</script>";
			}else{
				echo mysqli_error($link);
			}
		}else{
			echo "<script>alert('NAY')</script>";

		}
	}
	?>