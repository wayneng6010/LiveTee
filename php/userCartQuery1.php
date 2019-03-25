<?php
	// include 'verficationAdmin.php';
	session_start();
	require_once '../conn.php';

	$isize = $_POST['isize'];
	$cartID = $_POST['cartID'];
	$iquan = $_POST['iquan'];
	// echo "<script>alert('".$isize.' '.$cartID."')</script>";
	if (isset($_SESSION['uID'])){
		$uid = $_SESSION['uID'];
		$sql = "UPDATE `cart` SET `Cart_ItemSize` = '$isize', `Cart_ItemQuan` = '$iquan' WHERE `User_ID` = '$uid' AND `Cart_ID` = '$cartID'";
		if ($result = mysqli_query($link,$sql)) {
			echo 'haha';
		} else {
			echo "gg";
		}

		// echo $isize.$cartID;

	} else {
		// header('Location: ../userLogin.php');
	}


?>