<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	
	$itemID = $_GET['item'];
	$sql1 = "SELECT * FROM item WHERE Item_ID='$itemID'";
	
	$result1 = mysqli_query($link,$sql1);
	$result2 = mysqli_query($link,$sql1);
	$result3 = mysqli_query($link,$sql1);

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
	

	?>