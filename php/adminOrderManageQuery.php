<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	
	$sql1 = "SELECT orders.User_ID, SUM(Order_ItemQuan),`Order_DateTime`, User_Email, User_Name FROM orders, user WHERE orders.User_ID = user.User_ID AND Order_Status = '01' GROUP BY orders.User_ID";
	//SELECT User_ID, SUM(Order_ItemQuan),`Order_DateTime` FROM orders GROUP BY `User_ID`
	//SELECT orders.User_ID, SUM(Order_ItemQuan),`Order_DateTime`, User_Email, User_Name FROM orders, user WHERE orders.User_ID = user.User_ID GROUP BY orders.User_ID
	//SELECT orders.User_ID, SUM(Order_ItemQuan),`Order_DateTime`, User_Email, User_Name FROM orders, user WHERE orders.User_ID = user.User_ID GROUP BY orders.User_ID

	$result1 = mysqli_query($link,$sql1);

	?>