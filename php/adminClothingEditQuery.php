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
   	

    if(isset($_POST['search']) || (isset($_SESSION['icat']) && isset($_SESSION['istatus']) && isset($_SESSION['isearch']))) {
		if(isset($_POST['search'])) {
			$icat = $_POST['icat'];
			$istatus = $_POST['istatus'];
			$isearch = $_POST['isearch'];
			$_SESSION['icat'] = $icat;
			$_SESSION['istatus'] = $istatus;
			$_SESSION['isearch'] = $isearch;
		} else if (isset($_SESSION['icat']) && isset($_SESSION['istatus']) && isset($_SESSION['isearch'])) {
			$icat = $_SESSION['icat'];
			$istatus = $_SESSION['istatus'];
			$isearch = $_SESSION['isearch'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		if ($istatus != "All" && $icat != "All") {
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
		}
	} else {
		$ttlPagesSql = "SELECT * FROM item";
	}

    $result = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result);
    $totalPages = ceil($totalRows / $recordPerPage);

	if(isset($_POST['search']) || (isset($_SESSION['icat']) && isset($_SESSION['istatus']) && isset($_SESSION['isearch']))){
		if(isset($_POST['search'])) {
			$icat = $_POST['icat'];
			$istatus = $_POST['istatus'];
			$isearch = $_POST['isearch'];
			$_SESSION['icat'] = $icat;
			$_SESSION['istatus'] = $istatus;
			$_SESSION['isearch'] = $isearch;
		} else if (isset($_SESSION['icat']) && isset($_SESSION['istatus']) && isset($_SESSION['isearch'])) {
			$icat = $_SESSION['icat'];
			$istatus = $_SESSION['istatus'];
			$isearch = $_SESSION['isearch'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		if ($istatus != "All" && $icat != "All") {
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
		}
		$result1 = mysqli_query($link,$sql1);
	} else {
		$sql1 = "SELECT * FROM item LIMIT $offset, $recordPerPage";
		$result1 = mysqli_query($link,$sql1);
	}

	if(isset($_GET['did'])){
		$id = $_GET['did'];
		$sql2 = "DELETE FROM `item` WHERE `Item_ID` = '$id'";
		$sql3 = "DELETE FROM `stock` WHERE `Item_ID` = '$id'";
		if($result2 = mysqli_query($link,$sql2)){
			if($result3 = mysqli_query($link,$sql3)){
				echo "<script>alert('Item has been deleted.');
					window.location='adminClothingEdit.php';
				</script>";
			}
		}
	}

	
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