<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	
	$itemID = $_GET['item'];
	$sql1 = "SELECT * FROM item WHERE Item_ID='$itemID'";
	
	$result1 = mysqli_query($link,$sql1);
	$result2 = mysqli_query($link,$sql1);

	

	?>