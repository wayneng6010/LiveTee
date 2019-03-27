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
			$sql1 = "SELECT * FROM cart, item WHERE cart.Cart_ItemID = item.Item_ID AND cart.User_ID = $uid AND `Cart_ID` = '$cartID'";
			$result1 = mysqli_query($link,$sql1);
			if($row1 = mysqli_fetch_assoc($result1)) {
				$finalprice = $row1['Item_Price']*$row1['Cart_ItemQuan'];
				echo $finalprice;
				// echo "<script>
	   //          	var e = document.getElementById('popUpMsg');
	   //          	e.style.display = 'flex';
	   //        	</script>";
			}
		} else {
			echo "Error";
		}

	} else {
		header('Location: ../userLogin.php');
	}


?>