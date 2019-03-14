<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once '../conn.php';
	if (!isset($_SESSION['uID'])) {
		header('Location: userLogin.php');
	}

	$oid = $_GET['oid'];
	
	$sql = "UPDATE `orders` SET `Order_Review` = 0, `Order_Status` = '03' WHERE `Order_perOrderID` = '$oid'";
	if ($result = mysqli_query($link,$sql)) {
		header("location: ../userPurchase.php?oid=".$oid);
	}

?>