<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	if(isset($_POST['update'])){
		// $eid = 40;
		$eid = $_POST['eid'];
		$iname = $_POST['iname'];
		$iprice = $_POST['iprice'];
		$idescription = mysql_real_escape_string($_POST['idescription']);
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
			$sql1 = "SELECT *, stock.Item_Size AS ssize, item.Item_Size AS isize FROM stock, item WHERE stock.Item_ID=item.Item_ID AND item.Item_ID=$eid";
			$result1 = mysqli_query($link,$sql1);
			$item1 = mysqli_fetch_assoc($result1);
			$isize = explode(',', $item1['isize']);
			$result2 = mysqli_query($link,$sql1);
			$result3 = mysqli_query($link,$sql1);
			
			while ($item2 = mysqli_fetch_assoc($result2)){
				$isInclude = true;
				// foreach($isize as $i) {
				if (!(in_array($item2['ssize'], $isize))){
					$isInclude = false;
				}
				if (!$isInclude){
					// break;
					// echo "<script>alert('".$item2['Item_ID']."')</script>";
					$ssize = $item2['ssize'];
					$sid = $item2['Item_ID'];
					$sqlDel = "DELETE FROM stock WHERE Item_Size='$ssize' AND Item_ID='$sid'";
					if ($resultDel = mysqli_query($link,$sqlDel)){
						// echo "<script>alert('Delete successfully')</script>";
					}

				}
				// }
			}

			$ssize = array();
			while ($item3 = mysqli_fetch_assoc($result3)){
				$ssize[] = $item3['ssize'];
			}

			foreach($isize as $i) {
				// if ($isize == $item3['ssize']){
				// 	$isAdd = true;
				// }
				$isAdd = false;
				if (!(in_array($i, $ssize))){
					$isAdd = true;
				}
				if ($isAdd){
           	 		$sql4 = "INSERT INTO stock VALUES(null, '$eid', '$i', 0)";
           	 		if ($result4 = mysqli_query($link,$sql4)){
						// echo "<script>alert('Add successfully')</script>";
           	 		}
				}
			}

			echo "<script>
				alert('Update successfully');
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