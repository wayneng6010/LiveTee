<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';
	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 10;
    $offset = ($pageno-1) * $recordPerPage;
   	
    if(isset($_GET['search']) || (isset($_GET['icat1']) && isset($_GET['istatus1']) && isset($_GET['isearch1']))) {
		if(isset($_GET['search'])) {
			$icat = $_GET['icat'];
			$istatus = $_GET['istatus'];
			$isearch = $_GET['isearch'];
			$_GET['icat1'] = $icat;
			$_GET['istatus1'] = $istatus;
			$_GET['isearch1'] = $isearch;
		} else if (isset($_GET['icat1']) && isset($_GET['istatus1']) && isset($_GET['isearch1'])) {
			$icat = $_GET['icat1'];
			$istatus = $_GET['istatus1'];
			$isearch = $_GET['isearch1'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		if ($istatus != "All" && $icat != "All" && $istatus != "" && $icat != "") {
			$ttlPagesSql = "SELECT *
					FROM item
					WHERE (`Item_Name` LIKE '%$isearch%' OR `Item_ID` LIKE '%$isearch%') AND `Item_Cat`='$icat' AND `Item_Status`='$istatus'";
		} else if ($istatus == "All" && $icat == "All") {
			$ttlPagesSql = "SELECT *
				FROM item
				WHERE (`Item_Name` LIKE '%$isearch%' OR `Item_ID` LIKE '%$isearch%')";
		} 
		else if ($istatus == "All") {
			$ttlPagesSql = "SELECT *
				FROM item 
				WHERE (`Item_Name` LIKE '%$isearch%' OR `Item_ID` LIKE '%$isearch%') AND `Item_Cat`='$icat'";
		} else if ($icat == "All") {
			$ttlPagesSql = "SELECT * 
				FROM item 
				WHERE (`Item_Name` LIKE '%$isearch%' OR `Item_ID` LIKE '%$isearch%') AND `Item_Status`='$istatus'";
		} else {
			$ttlPagesSql = "SELECT * FROM item";
		}
	} else {
		$ttlPagesSql = "SELECT * FROM item";
	}

    $result = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result);
    $totalPages = ceil($totalRows / $recordPerPage);

	if(isset($_GET['search']) || (isset($_GET['icat1']) && isset($_GET['istatus1']) && isset($_GET['isearch1']))){
		if(isset($_GET['search'])) {
			$icat = $_GET['icat'];
			$istatus = $_GET['istatus'];
			$isearch = $_GET['isearch'];
			$_GET['icat1'] = $icat;
			$_GET['istatus1'] = $istatus;
			$_GET['isearch1'] = $isearch;
		} else if (isset($_GET['icat1']) && isset($_GET['istatus1']) && isset($_GET['isearch1'])) {
			$icat = $_GET['icat1'];
			$istatus = $_GET['istatus1'];
			$isearch = $_GET['isearch1'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		if ($istatus != "All" && $icat != "All" && $istatus != "" && $icat != "") {
			$sql1 = "SELECT *
					FROM item
					WHERE (`Item_Name` LIKE '%$isearch%' OR `Item_ID` LIKE '%$isearch%') AND `Item_Cat`='$icat' AND `Item_Status`='$istatus' LIMIT $offset, $recordPerPage";
		} else if ($istatus == "All" && $icat == "All") {
			$sql1 = "SELECT *
				FROM item
				WHERE (`Item_Name` LIKE '%$isearch%' OR `Item_ID` LIKE '%$isearch%') LIMIT $offset, $recordPerPage";
		} 
		else if ($istatus == "All") {
			$sql1 = "SELECT *
				FROM item
				WHERE (`Item_Name` LIKE '%$isearch%' OR `Item_ID` LIKE '%$isearch%') AND `Item_Cat`='$icat' LIMIT $offset, $recordPerPage";
		} else if ($icat == "All") {
			$sql1 = "SELECT * 
				FROM item 
				WHERE (`Item_Name` LIKE '%$isearch%' OR `Item_ID` LIKE '%$isearch%') AND `Item_Status`='$istatus' LIMIT $offset, $recordPerPage";
		} else {
			$sql1 = "SELECT * FROM item LIMIT $offset, $recordPerPage";
		}
		$result1 = mysqli_query($link,$sql1);
	} else {
		$sql1 = "SELECT * FROM item LIMIT $offset, $recordPerPage";
		$result1 = mysqli_query($link,$sql1);
	}

	// $sql1 = "SELECT * FROM item";

	// $result1 = mysqli_query($link,$sql1);
	// $icat = $_POST['icat'];
	// $sql1 = "SELECT * FROM item WHERE `Item_Cat`='$icat'";
	// echo '<script>alert("'.$sql1.'")</script>';



	// $istatus = $_POST['istatus'];
	
	// if($icat != "All" || $istatus != "All"){
	// 	$sql1 .= " WHERE ";
	// }

	// if($icat != "All"){
	// 	$sql1 .= "`Item_Cat`='$icat' ";
	// }

	// if($icat != "All" && $istatus != "All"){
	// 	$sql1 .= "AND ";
	// }

	// if($istatus != "All"){
	// 	$sql1 .= "`Item_Status`='$istatus'";
	// }

	// $result1 = mysqli_query($link,$sql1);

	?>