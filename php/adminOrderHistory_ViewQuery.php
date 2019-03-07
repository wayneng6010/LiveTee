<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	if(isset($_GET['uid'])) {
		$uid = $_GET['uid'];
		$dateTime = $_GET['dateTime'];
		$sql = "SELECT * FROM orders, user, item, staff WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND  orders.Order_ConStaffID = staff.Staff_ID AND orders.User_ID='$uid' AND Order_Status != '01' AND orders.Order_ConDateTime = '$dateTime' ORDER BY Order_DateTime";
		$item = mysqli_query($link,$sql);
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($item);
	}
	// $sql = "SELECT * FROM stock,item WHERE stock.Item_ID=item.Item_ID AND item.Item_ID='$id'";
	?>