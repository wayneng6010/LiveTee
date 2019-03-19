<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once '../conn.php';
	
	// $itemID = $_GET['item'];
	$isize = $_POST['option'];
	$itemID = $_POST['itemID'];

	$sql1 = "SELECT Stock_Quan FROM stock WHERE Item_ID='$itemID' AND Item_Size='$isize'";
	$sql2 = "SELECT SUM(`Order_ItemQuan`) AS `orderQuan` FROM `orders` WHERE `Order_ItemID` = 47 AND `Order_ItemSize` = 'S'";

	$result1 = mysqli_query($link,$sql1);
	$result2 = mysqli_query($link,$sql2);
	$row1 = mysqli_fetch_assoc($result1);
	$row2 = mysqli_fetch_assoc($result2);
	$stockAvailable = $row1['Stock_Quan'] - $row2['orderQuan'];
	echo $stockAvailable;
	// $sizeArr = array();

	// while ($isize = mysqli_fetch_assoc($result5)) {
 //    	$sizeArr[$isize['Item_Size']] = $isize['Stock_Quan'];
	// }


	?>