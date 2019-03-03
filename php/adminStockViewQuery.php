<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	
	// $sql1 = "SELECT * FROM item";
	$sql = "SELECT *, SUM(Stock_Quan) AS ttlStock FROM stock,item WHERE stock.Item_ID=item.Item_ID GROUP BY stock.Item_ID";
	$result1 = mysqli_query($link,$sql);

	$sql2 = "SELECT * FROM item WHERE Item_ID NOT IN(SELECT Item_ID FROM stock)";
	$result2 = mysqli_query($link,$sql2);
	?>