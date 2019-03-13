<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	$dateTimeArr = array();

	if(isset($_GET['uid'])) {
		$uid = $_GET['uid'];
		$sql = "SELECT * FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid' AND Order_Status = '01' ORDER BY Order_DateTime";

		$item = mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($item);

		$result = mysqli_query($link,$sql);

		$sql1 = "SELECT Order_ID FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid' AND Order_Status = '01' ORDER BY Order_DateTime";
		$result1 = mysqli_query($link,$sql1);
        while($row1 = mysqli_fetch_assoc($result1)){
          	$orderIDArr[] = $row1['Order_ID'];
			// foreach ($dateTimeArr as $dt) {
			// 	echo "<script>alert('".$dt."');</script>";
			// }
      	}
      	
      	
	}

	if(isset($_POST['con'])){
		$uid = $_POST['uid'];
		$orderID = $_POST['orderID'];
		$orderIDArr = explode(',', $orderID);
		// $sql = "SELECT * FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid'";
		// $result1 = mysqli_query($link,$sql);
		$sqlSuccess = false;
        // while($row = mysqli_fetch_assoc($result1)){
		foreach ($orderIDArr as $oID) {
        	// $itemid = $row['Order_ItemID'];
			// echo "<script>alert('".$dateTimeArr[0]."');</script>";
        	$sid = $_SESSION['sID'];
        	$trackNo = $_POST['trackNo'];
			// $sql1 = "UPDATE orders SET `Order_Status`= '02',`Order_ConStaffID`= '$sid', `Order_ConDateTime`= now(), `Order_TrackNo`= '$trackNo' WHERE orders.User_ID='$uid' AND Order_Status = '01' AND `Order_ID` = '$oID'";
        	$sql1 = "UPDATE orders SET `Order_Status`= '02' WHERE orders.User_ID='$uid' AND Order_Status = '01' AND `Order_ID` = '$oID'";
        	$sql1 = "INSERT INTO `perorder`(null, `Order_ConStaffID`= '$sid', `Order_ConDateTime`, `Order_TrackNo`) VALUES ([value-1],[value-2],[value-3],[value-4])";
			if($queryResult = mysqli_query($link, $sql1)){
				echo "<script>alert('Order Confirmed');</script>";
				$sqlSuccess = true;
				// header("location: adminOrderManage.php?success=true");
			}else{
				echo "<script>alert('Failed');</script>";
				$sqlSuccess = false;
			}
        }
        if ($sqlSuccess){
			header("location: adminOrderManage.php?success=true");
        }
   	}
	// $sql = "SELECT * FROM stock,item WHERE stock.Item_ID=item.Item_ID AND item.Item_ID='$id'";
	
	

	

	?>