<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	$dateTimeArr = array();

	if(isset($_GET['uid'])) {
		$uid = $_GET['uid'];
		$oid = $_GET['oid'];
		$sql = "SELECT * FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid' AND Order_Status = '01' AND Order_perOrderID='$oid' ORDER BY Order_DateTime";

		$item = mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($item);

		$result = mysqli_query($link,$sql);

		// $sql1 = "SELECT Order_ID FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid' AND Order_Status = '01' ORDER BY Order_DateTime";
		// $result1 = mysqli_query($link,$sql1);
  //       while($row1 = mysqli_fetch_assoc($result1)){
  //         	$orderIDArr[] = $row1['Order_ID'];
		// 	// foreach ($dateTimeArr as $dt) {
		// 	// 	echo "<script>alert('".$dt."');</script>";
		// 	// }
  //     	}
      	
      	
	}

	if(isset($_POST['con'])){
		$uid = $_POST['uid'];
		$oid = $_POST['oid'];
		$orderID = $_POST['orderID'];
		$orderIDArr = explode(',', $orderID);
		// $sql = "SELECT * FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid'";
		// $result1 = mysqli_query($link,$sql);
		$sqlSuccess = false;
        // while($row = mysqli_fetch_assoc($result1)){
		$sid = $_SESSION['sID'];
        $trackNo = $_POST['trackNo'];

        $sql2 = "UPDATE perorder SET `perOrder_ConStaffID`= '$sid', `perOrder_ConDateTime` = now(), `perOrder_TrackNo`= '$trackNo' WHERE perOrder_ID='$oid'";
        if($queryResult2 = mysqli_query($link, $sql2)){
			$sqlSuccess = true;
		} else {
			$sqlSuccess = false;
		}
		// $i = 0;
		// $len = count($orderIDArr);
		// $last_row;
		// $sql2 = "INSERT INTO `perorder` VALUES (null,'$sid',now(),'$trackNo')";
		// if($queryResult2 = mysqli_query($link, $sql2)){
		// 	$last_row = mysqli_insert_id($link);
		// 	$sqlSuccess = true;
		// } else {
		// 	$sqlSuccess = false;
		// }


    	// $itemid = $row['Order_ItemID'];
		// echo "<script>alert('".$dateTimeArr[0]."');</script>";
    	
		// $sql1 = "UPDATE orders SET `Order_Status`= '02',`Order_ConStaffID`= '$sid', `Order_ConDateTime`= now(), `Order_TrackNo`= '$trackNo' WHERE orders.User_ID='$uid' AND Order_Status = '01' AND `Order_ID` = '$oID'";
		// echo '<script>alert('.$uid.$oid.')</script>';
    	$sql1 = "UPDATE orders SET `Order_Status`= '02' WHERE orders.User_ID='$uid' AND Order_Status = '01' AND `Order_perOrderID` = '$oid'";
//     	if ($i == $len - 1) {
//     		$sql2 = "INSERT INTO `perorder` VALUES (null,'$sid',now(),'$trackNo')";
			// if($queryResult2 = mysqli_query($link, $sql2)){
			// 	$sqlSuccess = true;
			// } else {
			// 	$sqlSuccess = false;
			// }
// 		}
		if($queryResult1 = mysqli_query($link, $sql1)){
			// echo "<script>alert('Order Confirmed');</script>";
			$sqlSuccess = true;
			// header("location: adminOrderManage.php?success=true");
		}else{
			// echo "<script>alert('Failed');</script>";
			$sqlSuccess = false;
		}



		
        if ($sqlSuccess){
			header("location: adminOrderManage.php?success=true");
        } else {
			// echo "<script>alert('Failed');</script>";
        }
   	}
	// $sql = "SELECT * FROM stock,item WHERE stock.Item_ID=item.Item_ID AND item.Item_ID='$id'";
	
	

	

	?>