<?php
// include 'verficationAdmin.php';
	session_start();
	require_once 'conn.php';

	if($_SESSION['sRole']==1){
		echo "<script>
            var e = document.getElementsByClassName('addStaffbtn')[0];
            e.style.display = 'inline-block';
            </script>";
	}

	if(isset($_POST['update'])){
		$eid = $_GET['eid'];
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
		if($imageName!==""){
			$imageData = mysql_real_escape_string(file_get_contents($_FILES["iimg"]["tmp_name"]));
			$imageType = mysql_real_escape_string($_FILES["iimg"]["type"]);
		}
		$sql = "";
		if ($imageName == ""|| $imageData == ""){
			$sql = "UPDATE item SET `Item_Name`='$iname', `Item_Price`='$iprice', `Item_Desp`='$idescription',`Item_Size`='$isize',`Item_Cat`='$icat',`Item_Tag`='$itag',`Item_Status`='$istatus' WHERE `Item_ID`='$eid'";
		} else {
			$sql = "UPDATE item SET `Item_Name`='$iname', `Item_Price`='$iprice', `Item_Desp`='$idescription',`Item_Size`='$isize',`Item_Cat`='$icat',`Item_Image`='$imageData',`Item_Tag`='$itag',`Item_Status`='$istatus' WHERE `Item_ID`='$eid'";
		}

		if(mysqli_query($link, $sql)){
			echo "<script>
				alert('".$eid."Update succesfully');
				location.assign('adminClothingEdit.php'); 
			</script>";
		}else{
			echo mysqli_error($link);
		}
	}

	if(isset($_GET['eid'])){
		$id = $_GET['eid'];
		$sql = "SELECT * FROM item WHERE Item_ID='$id'";
		$item = mysqli_query($link,$sql);
		$item = mysqli_fetch_assoc($item);
		$itemSize = explode(',', $item['Item_Size']);
		$XS = false;
		$S = false;
		$M = false;
		$L = false;
		$XL = false;
		$XXL = false;
		foreach ($itemSize as $size) {
			switch ($size) {
			    case 'XS':
			        $XS = true;
			        break;
			    case 'S':
			        $S = true;
			        break;
			    case 'M':
			        $M = true;
			        break;
			    case 'L':
			        $L = true;
			        break;
			    case 'XL':
			        $XL = true;
			        break;
			    case 'XXL':
			        $XXL = true;
			        break;
			}
		}
	} 



	
	?>