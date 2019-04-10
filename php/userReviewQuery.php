<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	if (!isset($_SESSION['uID'])) {
		header('Location: userLogin.php');
	}

	$uid = $_SESSION['uID'];
//

	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 10;
    $offset = ($pageno-1) * $recordPerPage;

	$ttlPagesSql = "SELECT Rv_Txt, Rv_Rating, Rv_DateTime, user.User_ID, Item_Name, Item_ID FROM review, orders, user, item WHERE item.Item_ID = orders.Order_ItemID AND review.Rv_OrderID = orders.Order_ID AND orders.User_ID = user.User_ID AND user.User_ID = '$uid' ORDER BY Rv_DateTime DESC";

	// $result4 = mysqli_query($link,$sql4);

    $result4 = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result4);
    $totalPages = ceil($totalRows / $recordPerPage);

    $sql4 = "SELECT Rv_Txt, Rv_Rating, Rv_DateTime, user.User_ID, Item_Name, Item_ID FROM review, orders, user, item WHERE item.Item_ID = orders.Order_ItemID AND review.Rv_OrderID = orders.Order_ID AND orders.User_ID = user.User_ID AND user.User_ID = '$uid' ORDER BY Rv_DateTime DESC LIMIT $offset, $recordPerPage";

    $result4 = mysqli_query($link, $sql4);
//

	// $sql4 = "SELECT Rv_Txt, Rv_Rating, Rv_DateTime, user.User_ID, Item_Name, Item_ID FROM review, orders, user, item WHERE item.Item_ID = orders.Order_ItemID AND review.Rv_OrderID = orders.Order_ID AND orders.User_ID = user.User_ID AND user.User_ID = '$uid' ORDER BY Rv_DateTime DESC";


	// $result4 = mysqli_query($link,$sql4);
	// $rowRv = mysqli_fetch_assoc($result4);
?>