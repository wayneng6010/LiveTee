<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 4;
    $offset = ($pageno-1) * $recordPerPage;
   	
    if(isset($_GET['search']) || isset($_GET['isearch2'])) {
		if(isset($_GET['search'])) {
			$isearch = $_GET['isearch'];
			$_GET['isearch2'] = $isearch;
		} else if (isset($_GET['isearch2'])) {
			$isearch = $_GET['isearch2'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		$ttlPagesSql = "SELECT * FROM orders, perorder, user WHERE perorder.perOrder_ID LIKE '%$isearch%' AND orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND orders.Order_Status = '01' GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC";
	} else {
		$ttlPagesSql = "SELECT * FROM orders, perorder, user WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND orders.Order_Status = '01' GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC";
	}

    $result = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result);
    $totalPages = ceil($totalRows / $recordPerPage);

	if(isset($_GET['search']) || isset($_GET['isearch2'])) {
		if(isset($_GET['search'])) {
			$isearch = $_GET['isearch'];
			$_GET['isearch2'] = $isearch;
		} else if (isset($_GET['isearch2'])) {
			$isearch = $_GET['isearch2'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		$sql1 = "SELECT * FROM orders, perorder, user WHERE perorder.perOrder_ID LIKE '%$isearch%' AND orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND orders.Order_Status = '01' GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC LIMIT $offset, $recordPerPage";
		$result1 = mysqli_query($link,$sql1);
	} else {
		$sql1 = "SELECT * FROM orders, perorder, user WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND orders.Order_Status = '01' GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC LIMIT $offset, $recordPerPage ";
		$result1 = mysqli_query($link,$sql1);
	}
	
	// if(isset($_GET['search'])){
	// 	$isearch = $_GET['isearch'];
	// 	$isearch = mysqli_real_escape_string($link,$isearch);
	// 	$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
	// 	$sql1 = "SELECT * FROM orders, perorder, user WHERE perorder.perOrder_ID LIKE '%$isearch%' AND orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND orders.Order_Status = '01' GROUP BY perorder.perOrder_ID";
	// } else {
	// 	$sql1 = "SELECT * FROM orders, perorder, user WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND orders.Order_Status = '01' GROUP BY perorder.perOrder_ID";
	// }

	// $sql1 = "SELECT orders.User_ID, SUM(Order_ItemQuan),`Order_DateTime`, User_Email, User_Name FROM orders, user WHERE orders.User_ID = user.User_ID AND Order_Status = '01' GROUP BY orders.User_ID";
	//SELECT User_ID, SUM(Order_ItemQuan),`Order_DateTime` FROM orders GROUP BY `User_ID`
	//SELECT orders.User_ID, SUM(Order_ItemQuan),`Order_DateTime`, User_Email, User_Name FROM orders, user WHERE orders.User_ID = user.User_ID GROUP BY orders.User_ID
	//SELECT orders.User_ID, SUM(Order_ItemQuan),`Order_DateTime`, User_Email, User_Name FROM orders, user WHERE orders.User_ID = user.User_ID GROUP BY orders.User_ID

	// $result1 = mysqli_query($link,$sql1);

	?>