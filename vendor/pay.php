<?php
	session_start();
	require_once '../conn.php';
	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;
	require 'app/start.php';
	if (!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])) {
		die();
	}	
	if ((bool)$_GET['success'] === false) {
		header("Location: http://localhost/FYP/userCart.php");
		die();
	}
	$paymentId = $_GET['paymentId'];
	$payerId = $_GET['PayerID'];
	$payment = Payment::get($paymentId, $paypal);
	$execute = new PaymentExecution();
	$execute->setPayerId($payerId);
	try {
		$result = $payment->execute($execute, $paypal);
	} catch (Exception $e) {
		$data = json_decode($e->getData());
		echo $data->message;
		die($e);
	}
	echo "Payment made."."<br>";
	if (isset($_SESSION['post_cartID'])){
		$uid1 = $_SESSION['uID'];
		$sql3 = "INSERT INTO `perorder` VALUES (null, null, null, null)";
		if($queryResult3 = mysqli_query($link, $sql3)){
			$last_row = mysqli_insert_id($link);
			echo "Order placed successfully."."<br>";
		} else {
			echo "<script>alert('Error occured while placing order')</script>";
		}
		foreach($_SESSION['post_cartID'] as $checked){
			// echo "<script>alert('".$uid1."')</script>";
			$sql1 = "SELECT * FROM cart WHERE `User_ID` = '$uid1' AND `Cart_ID` = '$checked'";
			$result1 = mysqli_query($link,$sql1);
			$row1 = mysqli_fetch_assoc($result1);
			$Order_ItemID = $row1['Cart_ItemID'];
			$Order_ItemSize = $row1['Cart_ItemSize'];
			$Order_ItemQuan = $row1['Cart_ItemQuan'];
			$sqlDel = "DELETE FROM cart WHERE `User_ID` = '$uid1' AND `Cart_ID` = '$checked'";
			// echo "<script>alert('".$Order_ItemID."')</script>";
			// echo "<script>alert('".$Order_ItemSize."')</script>";
			// echo "<script>alert('".$Order_ItemQuan."')</script>";
			$sql2 = "INSERT INTO orders VALUES(null, '$uid1', '$Order_ItemID', '$Order_ItemSize', '$Order_ItemQuan', '01', 0, now(), '$last_row')";
			if ($result2 = mysqli_query($link,$sql2)){
				if ($resultDel = mysqli_query($link,$sqlDel)){
					// echo "<script>alert('Order placed successfully')</script>";
					header("Refresh:0");
				} else {
				echo "<script>alert('Error occured while placing order')</script>";
				}
			} else {
				echo "<script>alert('Error occured while placing order')</script>";
			}
		}
		unset($_SESSION["post_cartID"]);
	}
	
	echo "Redirecting.."."<br>";
	header('Refresh: 2; URL=http://localhost/FYP/userPurchase.php');
	// header("Location: http://localhost/FYP/userPurchase.php");
?>


<!-- <script type="text/javascript">
    var redirect = function() {
        window.location.replace("http://localhost/FYP/userPurchase.php");
    };

    $(document).ready(function() {
    	document.write('Redirecting..');
        setInterval(redirect, 2000);
    });
</script> -->