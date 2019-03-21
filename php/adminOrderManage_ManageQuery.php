<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	// $iidArr = array();

	if(isset($_GET['uid'])) {
		$uid = $_GET['uid'];
		$oid = $_GET['oid'];
		$sql = "SELECT * FROM orders, user, item, stock WHERE stock.Item_ID = orders.Order_ItemID AND stock.Item_Size = orders.Order_ItemSize AND orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid' AND Order_Status = '01' AND Order_perOrderID='$oid' ORDER BY Order_DateTime";

		$item = mysqli_query($link,$sql);
		// $item1 = mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($item);

		$result = mysqli_query($link,$sql);

		// while($rowiid = mysqli_fetch_assoc($item1)){
		//     $iidArr[] = $rowiid['Order_ItemID']; 
		//   	$iidArr[$rowiid['Order_ItemID']] = $rowiid['value'];

		// }
		// $sql1 = "SELECT Order_ID FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid' AND Order_Status = '01' ORDER BY Order_DateTime";
		// $result1 = mysqli_query($link,$sql1);
  //       while($row1 = mysqli_fetch_assoc($result1)){
  //         	$orderIDArr[] = $row1['Order_ID'];
		// 	// foreach ($dateTimeArr as $dt) {
		// 	// 	echo "<script>alert('".$dt."');</script>";
		// 	// }
  //     	}
      	
      	
	}
	
	// print_r($iidArr);
		

	if(isset($_POST['con'])){
		$uid = $_POST['uid'];
		$oid = $_POST['oid'];
		// $orderID = $_POST['orderID'];
		// $orderIDArr = explode(',', $orderID);
		// $sql = "SELECT * FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid'";
		// $result1 = mysqli_query($link,$sql);
		$sqlSuccess = false;
        // while($row = mysqli_fetch_assoc($result1)){
		$sid = $_SESSION['sID'];
        $trackNo = $_POST['trackNo'];

        
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
    	


//     	if ($i == $len - 1) {
//     		$sql2 = "INSERT INTO `perorder` VALUES (null,'$sid',now(),'$trackNo')";
			// if($queryResult2 = mysqli_query($link, $sql2)){
			// 	$sqlSuccess = true;
			// } else {
			// 	$sqlSuccess = false;
			// }
// 		}
		

		$sql5 = "SELECT * FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid' AND Order_Status = '01' AND Order_perOrderID='$oid' ORDER BY Order_DateTime";
		$item5 = mysqli_query($link,$sql5);

		for ($x = 0; $x < 2; $x++) {

		while ($row5 = mysqli_fetch_assoc($item5)) {
					$gg = "0";
			// echo $row2['Order_ItemID']." ".$row2['Order_ItemSize']." ".$row2['Order_ItemQuan'].", ";
			$iid = $row5['Order_ItemID'];
			$isize = $row5['Order_ItemSize'];
			$sql4 = "SELECT * FROM stock WHERE Item_ID = '$iid' AND Item_Size = '$isize'";
			$item4 = mysqli_query($link,$sql4);
			while ($row4 = mysqli_fetch_assoc($item4)) { 
			 	// echo $row4['Item_ID']." ".$row4['Item_Size']." ".$row4['Stock_Quan'].", ";
			 	$sid = $row4['Item_ID'];
			 	$ssize = $row4['Item_Size'];
			 	$squan = $row4['Stock_Quan'];
			}
			$isize = $row5['Order_ItemSize'];
			$iquan = $row5['Order_ItemQuan'];

			if ($x == 0) {
				if ($squan >= $iquan) {
					$sqlSuccess = true;
				} else {	
					$sqlSuccess = false;
					echo "<script>alert('Insufficient stock');</script>";
					break 2;
				}
			}
			

			if ($x == 1 && $sqlSuccess) {
				if ($squan >= $iquan) {
    			$sql3 = "UPDATE stock SET `Stock_Quan`= (`Stock_Quan` - '$iquan') WHERE Item_ID = '$sid' AND `Item_Size` = '$ssize'";
    			if ($item3 = mysqli_query($link,$sql3)) {
    				// echo $sid."success";
					$sqlSuccess = true;
	    		} else {
					$sqlSuccess = false;
					$gg = "1";
	    		}
				} else {	
					$sqlSuccess = false;
					$gg = "2";
					echo "<script>alert('Insufficient stock');</script>";
				}
			}
			
			}
		}

		if ($sqlSuccess) {
			$sid = $_SESSION['sID'];
			$sql2 = "UPDATE perorder SET `perOrder_ConStaffID`= '$sid', `perOrder_ConDateTime` = now(), `perOrder_TrackNo`= '$trackNo' WHERE perOrder_ID='$oid'";
	        if($queryResult2 = mysqli_query($link, $sql2)){
				$sqlSuccess = true;
			} else {
				$sqlSuccess = false;
			}

			$sql1 = "UPDATE orders SET `Order_Status`= '02' WHERE orders.User_ID='$uid' AND Order_Status = '01' AND `Order_perOrderID` = '$oid'";

			if($queryResult1 = mysqli_query($link, $sql1)){
				// echo "<script>alert('Order Confirmed');</script>";
				$sqlSuccess = true;
				// header("location: adminOrderManage.php?success=true");
			}else{
				// echo "<script>alert('Failed');</script>";
				$sqlSuccess = false;
			}
		} else {
			// echo "<script>alert('Insufficient stock');</script>";
			header("location: adminOrderManage_Manage.php?uid=$uid&oid=$oid&failed=true&gg=".$gg);

		}
		
        if ($sqlSuccess){
			header("location: adminOrderManage.php?success=true");
        } else {
			// echo "<script>alert('Failed');</script>";
        }
   	}
	// $sql = "SELECT * FROM stock,item WHERE stock.Item_ID=item.Item_ID AND item.Item_ID='$id'";
	
	

	

	?>