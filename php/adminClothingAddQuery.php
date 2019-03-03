<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

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
				//select id and size from item
				$sql2 = "SELECT Item_ID, Item_Size FROM item WHERE Item_Name='$iname'";
				$result2 = mysqli_query($link,$sql2);
				$row2 = mysqli_fetch_assoc($result2);
				//explode sizes to array
				$itemSize = explode(',', $row2['Item_Size']);
				//insert 0 stock for each size in table stock
				$counter = 0;
				$length = count($itemSize);
				foreach($itemSize as $i) {
           	 		$sql3 = "INSERT INTO stock VALUES(null, ".$row2['Item_ID'].", '$i', 0)";
					if ($result3 = mysqli_query($link,$sql3)){
						$counter++;
						if ($counter == $length - 1) {
							echo "<script>alert('Success')</script>";
					    }
					}
          		}
			}else {
			    echo '<script>alert("Item Name Exist!")</script>';
			}
		}
	}

	?>