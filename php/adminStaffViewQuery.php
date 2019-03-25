<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	$sql1 = "SELECT * FROM staff";
	$result1 = mysqli_query($link,$sql1);

	if(isset($_GET['sid'])){
		$id = $_GET['sid'];
		$sql3 = "DELETE FROM `staff` WHERE `Staff_ID` = '$id'";
		if($result3 = mysqli_query($link,$sql3)){
			if ($id == $_SESSION['sID']) {
				echo "<script>alert('Staff role changed.');
				window.location='adminLogin.php';
				</script>";
			} else {
				echo "<script>alert('Staff role changed.');
				window.location='adminStaffView.php';
				</script>";
			}
		}
	}

	if(isset($_GET['cid'])){
		$id = $_GET['cid'];
		$crole = $_GET['crole'];
		$sql4 = "UPDATE `staff` SET `Staff_Role`='$crole' WHERE `Staff_ID` = '$id'";
		if($result4 = mysqli_query($link,$sql4)){
			if ($id == $_SESSION['sID']) {
				echo "<script>alert('Staff role changed.');
				window.location='adminLogin.php';
				</script>";
			} else {
				echo "<script>alert('Staff role changed.');
				window.location='adminStaffView.php';
				</script>";
			}
			
		}
	}
	// $icat = $_POST['icat'];
	// $sql1 = "SELECT * FROM item WHERE `Item_Cat`='$icat'";
	// echo '<script>alert("'.$sql1.'")</script>';



	// $istatus = $_POST['istatus'];
	
	// if($icat != "All" || $istatus != "All"){
	// 	$sql1 .= " WHERE ";
	// }

	// if($icat != "All"){
	// 	$sql1 .= "`Item_Cat`='$icat' ";
	// }

	// if($icat != "All" && $istatus != "All"){
	// 	$sql1 .= "AND ";
	// }

	// if($istatus != "All"){
	// 	$sql1 .= "`Item_Status`='$istatus'";
	// }

	// $result1 = mysqli_query($link,$sql1);

	?>