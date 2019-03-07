<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';

	if (isset($_SESSION['uID'])){
		$uid = $_SESSION['uID'];
		$sql = "SELECT * FROM cart, item WHERE cart.Cart_ItemID = item.Item_ID AND cart.User_ID	= $uid";
		$result = mysqli_query($link,$sql);
	} else {
		header('Location: userLogin.php');
	}

	if(isset($_POST['checkout'])){
		if (isset($_SESSION['uID'])){
			
			if(!empty($_POST['cartID'])){
				$uid1 = $_SESSION['uID'];
				foreach($_POST['cartID'] as $checked){
					// echo "<script>alert('".$uid1."')</script>";

					$sql1 = "SELECT * FROM cart WHERE `User_ID` = '$uid1' AND `Cart_ID` = '$checked'";
					$result1 = mysqli_query($link,$sql1);
					$row1 = mysqli_fetch_assoc($result1);
					$Order_ItemID = $row1['Cart_ItemID'];
					$Order_ItemSize = $row1['Cart_ItemSize'];
					$Order_ItemQuan = $row1['Cart_ItemQuan'];
					// echo "<script>alert('".$Order_ItemID."')</script>";
					// echo "<script>alert('".$Order_ItemSize."')</script>";
					// echo "<script>alert('".$Order_ItemQuan."')</script>";

					$sql2 = "INSERT INTO orders VALUES(null, '$uid1', '$Order_ItemID', '$Order_ItemSize', '$Order_ItemQuan', '01', 0, now(), null, null)";
					if ($result2 = mysqli_query($link,$sql2)){
						echo "<script>alert('Order placed successfully')</script>";
					} else {
						echo "<script>alert('Error occured while placing order')</script>";
					}
				}
			}
		}
	}

?>