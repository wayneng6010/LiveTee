<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	
	$itemID = $_GET['item'];
	$sql1 = "SELECT * FROM item WHERE Item_ID='$itemID'";
	$sql4 = "SELECT Rv_Txt, Rv_Rating, Rv_DateTime, User_Name FROM review, orders, user WHERE review.Rv_OrderID = orders.Order_ID AND orders.User_ID = user.User_ID AND Order_ItemID='$itemID'";
	
	$result1 = mysqli_query($link,$sql1);
	$result2 = mysqli_query($link,$sql1);
	$result3 = mysqli_query($link,$sql1);
	$result4 = mysqli_query($link,$sql4);
	$item = mysqli_fetch_assoc($result3);

	if (isset($_SESSION['uLogin'])){
		$uLogin = $_SESSION['uLogin'];
		$uID = $_SESSION['uID'];
	}

	if(isset($_POST['cart'])){
		if ($uLogin != ""){
			$iid = $_POST['iid'];
			$iname = $item['Item_ID'];
			$iprice = $item['Item_Price'];
			$iquan = $_POST['pdquan'];
			$isize = $_POST['isize'];
			$sql2 = "INSERT INTO cart VALUES(null, '$uID', '$iid', '$iquan', '$isize', now())";
			if($result2 = mysqli_query($link,$sql2)){
				// echo "<script>alert('".$uLogin."')</script>";
				header("Location: userProduct.php?item=".$iid);
			} else{
				echo "<script>alert('Error add to cart.')</script>";
			}
			// echo "<script>alert('".$uLogin."')</script>";
		} else {
			header("Location: userLogin.php");
		}
	}

	if(isset($_POST['buy'])){
		if ($uLogin != ""){

		} else {
			header("Location: userLogin.php");
		}
	}

	

	?>