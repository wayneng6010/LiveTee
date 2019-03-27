<?php
	require_once '../conn.php';
	header('Content-Type: application/json'); 
	$sql = "SELECT DISTINCT DATE(`Order_DateTime`) AS dates, SUM(`Order_ItemQuan`) AS quan FROM orders WHERE `Order_Status` = '03' GROUP BY DATE(`Order_DateTime`)";
	$result = mysqli_query($link,$sql);

	$data = array();
	foreach ($result as $row) {
  		$data[] = $row;
	}

	// print json_encode($data);
	echo json_encode($data, JSON_PRETTY_PRINT);

?>