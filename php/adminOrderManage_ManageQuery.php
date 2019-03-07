<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	if(isset($_GET['uid'])) {
		$uid = $_GET['uid'];
		$sql = "SELECT * FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid' AND Order_Status = '01' ORDER BY Order_DateTime";
		$item = mysqli_query($link,$sql);
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($item);
	}
	// $sql = "SELECT * FROM stock,item WHERE stock.Item_ID=item.Item_ID AND item.Item_ID='$id'";
	
	

	if(isset($_POST['con'])){
		$uid = $_POST['uid'];
		$sql = "SELECT * FROM orders, user, item WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND orders.User_ID='$uid'";
		$result1 = mysqli_query($link,$sql);
        while($row = mysqli_fetch_assoc($result1)){
        	$itemid = $row['Order_ItemID'];
        	$sid = $_SESSION['sID'];
			$sql1 = "UPDATE orders SET `Order_Status`= '02',`Order_ConStaffID`= '$sid', `Order_ConDateTime`= now()  WHERE orders.User_ID='$uid' AND Order_Status = '01'";
			if($queryResult = mysqli_query($link, $sql1)){
				echo "<script>alert('Order Confirmed');</script>";
				header("location: adminOrderManage.php?success=true");
			}else{
				echo "<script>alert('Failed');</script>";
			}
        }
    }

	?>