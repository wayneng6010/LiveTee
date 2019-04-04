<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	
	// $sql1 = "SELECT orders.User_ID, SUM(Order_ItemQuan),`perOrder_ConDateTime`, `Order_Status`, `perOrder_TrackNo`, `perOrder_ID`, User_Email, User_Name FROM orders, user, perorder WHERE orders.User_ID = user.User_ID AND orders.Order_perOrderID = perorder.perOrder_TrackNo AND Order_Status != '01' GROUP BY orders.User_ID, perorder.perOrder_ID";
	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 10;
    $offset = ($pageno-1) * $recordPerPage;
   	
    if(isset($_GET['search']) || isset($_GET['isearch3'])) {
		if(isset($_GET['search'])) {
			$isearch = $_GET['isearch'];
			$_GET['isearch3'] = $isearch;
		} else if (isset($_GET['isearch3'])) {
			$isearch = $_GET['isearch3'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		$ttlPagesSql = "SELECT * FROM perorder, orders, user WHERE perorder.perOrder_ID LIKE '%$isearch%' AND orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND (orders.Order_Status = '02' OR orders.Order_Status = '03') GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC";
	} else {
		$ttlPagesSql = "SELECT * FROM perorder, orders, user WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND (orders.Order_Status = '02' OR orders.Order_Status = '03') GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC";
	}

    $result = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result);
    $totalPages = ceil($totalRows / $recordPerPage);

	if(isset($_GET['search']) || isset($_GET['isearch3'])) {
		if(isset($_GET['search'])) {
			$isearch = $_GET['isearch'];
			$_GET['isearch3'] = $isearch;
		} else if (isset($_GET['isearch3'])) {
			$isearch = $_GET['isearch3'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		$sql1 = "SELECT * FROM perorder, orders, user WHERE perorder.perOrder_ID LIKE '%$isearch%' AND orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND (orders.Order_Status = '02' OR orders.Order_Status = '03') GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC LIMIT $offset, $recordPerPage";
		$result1 = mysqli_query($link,$sql1);
	} else {
		$sql1 = "SELECT * FROM perorder, orders, user WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND (orders.Order_Status = '02' OR orders.Order_Status = '03') GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC LIMIT $offset, $recordPerPage";
		$result1 = mysqli_query($link,$sql1);
	}

	// if(isset($_GET['search'])){
	// 	$isearch = $_GET['isearch'];
	// 	$isearch = mysqli_real_escape_string($link,$isearch);
	// 	$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
	// 	$sql1 = "SELECT * FROM perorder, orders, user WHERE perorder.perOrder_ID LIKE '%$isearch%' AND orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND (orders.Order_Status = '02' OR orders.Order_Status = '03') GROUP BY perorder.perOrder_ID";

	// } else {
	// 	$sql1 = "SELECT * FROM perorder, orders, user WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND (orders.Order_Status = '02' OR orders.Order_Status = '03') GROUP BY perorder.perOrder_ID";
	// }

	// $result1 = mysqli_query($link,$sql1);

	?>

	