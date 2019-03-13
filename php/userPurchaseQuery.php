<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	
	$sql = "SELECT * FROM orders, item WHERE orders.Order_ItemID = item.Item_ID AND User_ID ='$_SESSION[uID]' ORDER BY Order_DateTime DESC";
	$result = mysqli_query($link,$sql);

?>