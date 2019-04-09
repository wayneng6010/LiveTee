<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	
	$itemID = $_GET['item'];

	$sql1 = "SELECT * FROM item WHERE item.Item_ID='$itemID'";
	
	$result1 = mysqli_query($link,$sql1);
	$result2 = mysqli_query($link,$sql1);
	$result3 = mysqli_query($link,$sql1);
	$result5 = mysqli_query($link,$sql1);
	
	$item = mysqli_fetch_assoc($result3);
	$itemAvailable = mysqli_fetch_assoc($result5);


	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 1;
    $offset = ($pageno-1) * $recordPerPage;

	$ttlPagesSql = "SELECT Rv_Txt, Rv_Rating, Rv_DateTime, User_Name FROM review, orders, user WHERE review.Rv_OrderID = orders.Order_ID AND orders.User_ID = user.User_ID AND Order_ItemID='$itemID'";

	// $result4 = mysqli_query($link,$sql4);

    $result4 = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result4);
    $totalPages = ceil($totalRows / $recordPerPage);

    $sql4 = "SELECT Rv_Txt, Rv_Rating, Rv_DateTime, User_Name FROM review, orders, user WHERE review.Rv_OrderID = orders.Order_ID AND orders.User_ID = user.User_ID AND Order_ItemID='$itemID' LIMIT $offset, $recordPerPage";

    $result4 = mysqli_query($link, $sql4);

	// if (!$itemAvailable['Item_Status']) {
	// 	// header("Location: userHome.php"); 
	// 	echo '<script> location.replace("userHome.php"); </script>';

	// }
	// print_r($sizeArr);
	

	if (isset($_SESSION['uLogin'])){
		$uLogin = $_SESSION['uLogin'];
		$uID = $_SESSION['uID'];
	}

	if(isset($_POST['cart'])){
		$iid = $_POST['iid'];
		$iquan = $_POST['pdquan'];
		$isize = $_POST['isize'];

		$sql1 = "SELECT Stock_Quan FROM stock WHERE Item_ID='$iid' AND Item_Size='$isize'";
		$sql2 = "SELECT SUM(`Order_ItemQuan`) AS `orderQuan` FROM `orders` WHERE `Order_ItemID` = '$iid' AND `Order_ItemSize` = '$isize' AND `Order_Status` = '01';";

		$result1 = mysqli_query($link,$sql1);
		$result2 = mysqli_query($link,$sql2);
		$row1 = mysqli_fetch_assoc($result1);
		$row2 = mysqli_fetch_assoc($result2);
		$stockAvailable = $row1['Stock_Quan'] - $row2['orderQuan'];

		if ($iquan <= $stockAvailable) {
			if ($uLogin != ""){
				$iname = $item['Item_ID'];
				$iprice = $item['Item_Price'];
				$sql2 = "INSERT INTO cart VALUES(null, '$uID', '$iid', '$iquan', '$isize', now())";
				if($result2 = mysqli_query($link,$sql2)){
					// echo "<script>alert('".$uLogin."')</script>";
					// echo '<script> location.replace("userProduct.php?item='.$iid.'&success=true"); </script>';
					header("Location: userProduct.php?item=".$iid."&success=true");
				} else{
					echo "<script>alert('Error add to cart.')</script>";
				}
				// echo "<script>alert('".$uLogin."')</script>";
			} else {
				header("Location: userLogin.php");
				// echo '<script> location.replace("userLogin.php"); </script>';
			}
		} else {
			// header("Location: userHome.php");
			echo '<script> location.replace("userProduct.php?item='.$iid.'"); </script>';
		}

		
	}

	if(isset($_POST['buy'])){
		if ($uLogin != ""){

		} else {
			echo '<script> location.replace("userLogin.php"); </script>';
			// header("Location: userLogin.php");
		}
	}
?>