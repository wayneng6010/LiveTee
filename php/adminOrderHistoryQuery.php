<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	
	// $sql1 = "SELECT orders.User_ID, SUM(Order_ItemQuan),`perOrder_ConDateTime`, `Order_Status`, `perOrder_TrackNo`, `perOrder_ID`, User_Email, User_Name FROM orders, user, perorder WHERE orders.User_ID = user.User_ID AND orders.Order_perOrderID = perorder.perOrder_TrackNo AND Order_Status != '01' GROUP BY orders.User_ID, perorder.perOrder_ID";

	$sql1 = "SELECT * FROM perorder, orders, user WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID GROUP BY perorder.perOrder_ID";

	$result1 = mysqli_query($link,$sql1);

	?>

	