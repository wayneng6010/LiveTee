<?php
	require_once 'conn.php';
	session_start();
	header('Content-Type: application/json'); 
	
	if (isset($_GET['graphType'])) {
		if ($_GET['graphType'] != "default") {
			$graphType = $_GET['graphType'];
		} else {
			$graphType = "bar";
		}
	} else {
		$graphType = "bar";
	}

	if (isset($_GET['duration'])) {
		if ($_GET['duration'] != "default") {
			$duration = $_GET['duration'];
		} else {
			$duration = "this month";
		}
	} else {
		$duration = "this month";
	}

	switch ($duration) {
		// echo "<script>alert('"$duration"')</script>";
		case "this month":
			$month = date('m');
			$sql = "SELECT DISTINCT DATE(`Order_DateTime`) AS dates, SUM(`Order_ItemQuan` * `Item_Price`) AS quan FROM orders, item WHERE orders.Order_ItemID = item.Item_ID AND `Order_Status` = '03' AND MONTH(`Order_DateTime`) = '$month' GROUP BY DATE(`Order_DateTime`)";
			break;
		case "last month":
			$lastmonth = date('m') - 1;
			$sql = "SELECT DISTINCT DATE(`Order_DateTime`) AS dates, SUM(`Order_ItemQuan` * `Item_Price`) AS quan FROM orders, item WHERE orders.Order_ItemID = item.Item_ID AND `Order_Status` = '03' AND MONTH(`Order_DateTime`) = '$lastmonth' GROUP BY DATE(`Order_DateTime`)";
			break;
		case "this year":
			$year = date('Y');
			$sql = "SELECT DISTINCT YEAR(`Order_DateTime`) AS dates, SUM(`Order_ItemQuan` * `Item_Price`) AS quan FROM orders, item WHERE orders.Order_ItemID = item.Item_ID AND `Order_Status` = '03' AND YEAR(`Order_DateTime`) = '$year' GROUP BY YEAR(`Order_DateTime`)";
			break;
		default:
			$sql = "SELECT DISTINCT DATE(`Order_DateTime`) AS dates, SUM(`Order_ItemQuan` * `Item_Price`) AS quan FROM orders, item WHERE orders.Order_ItemID = item.Item_ID AND `Order_Status` = '03' GROUP BY DATE(`Order_DateTime`)";
			break;
	}
	
	$result = mysqli_query($link,$sql);

	$data = array();
	foreach ($result as $row) {
  		$data[] = $row;
	}
	// if (isset($_GET['graphType'])) {
	// 	echo "<script>alert('".$_GET['graphType']."');</script>";
	// }

	// if (isset($_SESSION['graphType'])) {
	// 	$graphType = $_SESSION['graphType'];
	// } else {
	// 	$graphType = "bar";
	// 		// echo "<script>alert('".$_SESSION['graphType']."');</script>";
	// }

	$data['graphType'] = $graphType;

	// print json_encode($data);
	echo json_encode($data, JSON_PRETTY_PRINT);
?>