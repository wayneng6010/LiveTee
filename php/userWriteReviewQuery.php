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

	if(isset($_POST['add'])){
		$oid = $_POST['oid'];
		$poid = $_POST['poid'];
		$uid = $_SESSION['uID'];
		$review = mysql_real_escape_string($_POST['review']);

		$rating = $_POST['rate'];
		// echo "<script>alert('".$oid." ".$uid." ".$review." ".$rating." "."')</script>";
		// echo "<script>alert('".$oid."')</script>";

		$sql1 = "INSERT INTO `review` VALUES(null, '$oid', '$uid', '$review', '$rating', now())";
		$sql2 = "UPDATE `orders` SET `Order_Review` = 1 WHERE `Order_ID` = '$oid'";
		if ($result1 = mysqli_query($link,$sql1) && $result2 = mysqli_query($link,$sql2)) {
			header('location: userPurchase.php?rvSuccess=true&oid='.$poid);
			// echo "<script>alert('yes')</script>";
		} else {
			echo "<script>alert('You had submitted the review before.')</script>";
		}
		// echo "<script>alert('".$rating."')</script>";
	}

	// // processing
	// $sql1 = "SELECT * FROM orders, item  WHERE orders.Order_ItemID = item.Item_ID AND User_ID = 8 AND Order_Status = '01' ORDER BY Order_DateTime DESC";
	// $result1 = mysqli_query($link,$sql1);
?>

