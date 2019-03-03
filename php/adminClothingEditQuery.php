<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	$sql1 = "SELECT * FROM item";
	$result1 = mysqli_query($link,$sql1);

	if(isset($_GET['did'])){
		$id = $_GET['did'];
		$sql2 = "DELETE FROM `item` WHERE `Item_ID` = '$id'";
		$sql3 = "DELETE FROM `stock` WHERE `Item_ID` = '$id'";
		if($result2 = mysqli_query($link,$sql2)){
			if($result3 = mysqli_query($link,$sql3)){
				echo "<script>alert('Item has been deleted.');
					window.location='adminClothingEdit.php';
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