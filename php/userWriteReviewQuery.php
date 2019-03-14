<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	if (!isset($_SESSION['uID'])) {
		header('Location: userLogin.php');
	}

	$oid = $_GET['oid'];
	
	//delivering
	$sql = "SELECT * FROM orders, item, perorder WHERE orders.Order_ItemID = item.Item_ID AND orders.Order_perOrderID = perorder.perOrder_ID AND User_ID ='$_SESSION[uID]' AND Order_ID = '$oid'";
	$result = mysqli_query($link,$sql);

	// // processing
	// $sql1 = "SELECT * FROM orders, item  WHERE orders.Order_ItemID = item.Item_ID AND User_ID = 8 AND Order_Status = '01' ORDER BY Order_DateTime DESC";
	// $result1 = mysqli_query($link,$sql1);
?>