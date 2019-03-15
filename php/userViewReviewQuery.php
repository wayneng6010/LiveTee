<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	if (!isset($_SESSION['uID'])) {
		header('Location: userLogin.php');
	}

	$oid = $_GET['oid'];
	//delivering
	$sql = "SELECT * FROM orders, item, perorder, review WHERE review.Rv_OrderID =  orders.Order_ID AND orders.Order_ItemID = item.Item_ID AND orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID ='$_SESSION[uID]' AND Order_ID = '$oid'";
	$result = mysqli_query($link,$sql);

	if(isset($_POST['add'])){
		$poid = $_POST['poid'];
		header('location: userPurchase.php?oid='.$poid);
	}

?>

