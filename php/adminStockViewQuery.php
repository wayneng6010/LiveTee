<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	
	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 2;
    $offset = ($pageno-1) * $recordPerPage;
   	
    if(isset($_POST['search']) || (isset($_SESSION['icat1']) && isset($_SESSION['istatus1']) && isset($_SESSION['isearch1']))) {
		if(isset($_POST['search'])) {
			$icat = $_POST['icat'];
			$istatus = $_POST['istatus'];
			$isearch = $_POST['isearch'];
			$_SESSION['icat1'] = $icat;
			$_SESSION['istatus1'] = $istatus;
			$_SESSION['isearch1'] = $isearch;
		} else if (isset($_SESSION['icat1']) && isset($_SESSION['istatus1']) && isset($_SESSION['isearch1'])) {
			$icat = $_SESSION['icat1'];
			$istatus = $_SESSION['istatus1'];
			$isearch = $_SESSION['isearch1'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		if ($istatus != "All" && $icat != "All") {
			$ttlPagesSql = "SELECT *, SUM(Stock_Quan) AS ttlStock 
					FROM item, stock
					WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Cat`='$icat' AND `Item_Status`='$istatus' GROUP BY stock.Item_ID";
		} else if ($istatus == "All" && $icat == "All") {
			$ttlPagesSql = "SELECT *, SUM(Stock_Quan) AS ttlStock 
				FROM item, stock
				WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') GROUP BY stock.Item_ID";
		} 
		else if ($istatus == "All") {
			$ttlPagesSql = "SELECT *, SUM(Stock_Quan) AS ttlStock
				FROM item, stock 
				WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Cat`='$icat' GROUP BY stock.Item_ID";
		} else if ($icat == "All") {
			$ttlPagesSql = "SELECT *, SUM(Stock_Quan) AS ttlStock 
				FROM item, stock 
				WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Status`='$istatus' GROUP BY stock.Item_ID";
		}
	} else {
		$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock FROM stock,item WHERE stock.Item_ID = item.Item_ID GROUP BY stock.Item_ID";
	}

    $result = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result);
    $totalPages = ceil($totalRows / $recordPerPage);

	if(isset($_POST['search']) || (isset($_SESSION['icat1']) && isset($_SESSION['istatus1']) && isset($_SESSION['isearch1']))){
		if(isset($_POST['search'])) {
			$icat = $_POST['icat'];
			$istatus = $_POST['istatus'];
			$isearch = $_POST['isearch'];
			$_SESSION['icat1'] = $icat;
			$_SESSION['istatus1'] = $istatus;
			$_SESSION['isearch1'] = $isearch;
		} else if (isset($_SESSION['icat1']) && isset($_SESSION['istatus1']) && isset($_SESSION['isearch1'])) {
			$icat = $_SESSION['icat1'];
			$istatus = $_SESSION['istatus1'];
			$isearch = $_SESSION['isearch1'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		if ($istatus != "All" && $icat != "All") {
			$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock 
					FROM item, stock
					WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Cat`='$icat' AND `Item_Status`='$istatus' GROUP BY stock.Item_ID LIMIT $offset, $recordPerPage";
		} else if ($istatus == "All" && $icat == "All") {
			$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock 
				FROM item, stock
				WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') GROUP BY stock.Item_ID LIMIT $offset, $recordPerPage";
		} 
		else if ($istatus == "All") {
			$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock
				FROM item, stock 
				WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Cat`='$icat' GROUP BY stock.Item_ID LIMIT $offset, $recordPerPage";
		} else if ($icat == "All") {
			$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock 
				FROM item, stock 
				WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Status`='$istatus' GROUP BY stock.Item_ID LIMIT $offset, $recordPerPage";
		}
		$result1 = mysqli_query($link,$sql1);
	} else {
		$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock FROM stock,item WHERE stock.Item_ID = item.Item_ID GROUP BY stock.Item_ID LIMIT $offset, $recordPerPage";
		$result1 = mysqli_query($link,$sql1);
	}

	// $sql1 = "SELECT * FROM item";
	// if(isset($_POST['search'])){
	// 	$icat = $_POST['icat'];
	// 	$istatus = $_POST['istatus'];
	// 	$isearch = $_POST['isearch'];
	// 	$isearch = mysqli_real_escape_string($link,$isearch);
	// 	$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
	// 	if ($istatus != "All" && $icat != "All") {
	// 		$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock 
	// 				FROM item, stock
	// 				WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Cat`='$icat' AND `Item_Status`='$istatus' GROUP BY stock.Item_ID";
	// 	} else if ($istatus == "All" && $icat == "All") {
	// 		$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock 
	// 			FROM item, stock
	// 			WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') GROUP BY stock.Item_ID";
	// 	} 
	// 	else if ($istatus == "All") {
	// 		$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock
	// 			FROM item, stock 
	// 			WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Cat`='$icat' GROUP BY stock.Item_ID";
	// 	} else if ($icat == "All") {
	// 		$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock 
	// 			FROM item, stock 
	// 			WHERE stock.Item_ID = item.Item_ID AND (`Item_Name` LIKE '%$isearch%' OR item.Item_ID LIKE '%$isearch%') AND `Item_Status`='$istatus' GROUP BY stock.Item_ID";
	// 	}
	// 	$result1 = mysqli_query($link,$sql1);
	// } else {
	// 	$sql1 = "SELECT *, SUM(Stock_Quan) AS ttlStock FROM stock,item WHERE stock.Item_ID = item.Item_ID GROUP BY stock.Item_ID";
	// 	$result1 = mysqli_query($link,$sql1);
	// }
	// $sql = "SELECT *, SUM(Stock_Quan) AS ttlStock FROM stock,item WHERE stock.Item_ID = item.Item_ID GROUP BY stock.Item_ID";
	// $result1 = mysqli_query($link,$sql);

	// $sql2 = "SELECT * FROM item WHERE Item_ID NOT IN(SELECT Item_ID FROM stock)";
	// $result2 = mysqli_query($link,$sql2);
	?>