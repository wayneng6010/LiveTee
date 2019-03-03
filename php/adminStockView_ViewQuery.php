<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	
	// $sql1 = "SELECT * FROM item";
	$iid = $_GET['iid'];
	$sql = "SELECT *, stock.Item_Size AS ssize FROM stock, item WHERE stock.Item_ID=item.Item_ID AND stock.Item_ID=$iid";
	$result1 = mysqli_query($link,$sql);
	$num_rows = $result1->num_rows;


	?>