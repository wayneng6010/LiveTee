<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	if(isset($_GET['uid'])) {
		$uid = $_GET['uid'];
		$oid = $_GET['oid'];
		$sql = "SELECT * FROM orders, user, item, staff, perorder WHERE orders.User_ID = user.User_ID AND orders.Order_ItemID = item.Item_ID AND perorder.perOrder_ConStaffID = staff.Staff_ID AND orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID='$uid' AND Order_Status != '01' AND perOrder.perOrder_ID = '$oid' ORDER BY Order_DateTime";

		$item = mysqli_query($link,$sql);
		$result = mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($item);
	}
	// $sql = "SELECT * FROM stock,item WHERE stock.Item_ID=item.Item_ID AND item.Item_ID='$id'";
	?>