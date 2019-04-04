<?php
	include 'verficationAdmin.php';
	require_once 'conn.php';

	// $sql1 = "SELECT * FROM staff";
	// $result1 = mysqli_query($link,$sql1);
	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 10;
    $offset = ($pageno-1) * $recordPerPage;
   	
    if(isset($_GET['search']) || (isset($_GET['isearch4']) && isset($_GET['role4']))) {
		if(isset($_GET['search'])) {
			$role = $_GET['role'];
			$isearch = $_GET['isearch'];
			$_GET['isearch4'] = $isearch;
			$_GET['role4'] = $role;
		} else if (isset($_GET['isearch4']) && isset($_GET['role4'])) {
			$isearch = $_GET['isearch4'];
			$role = $_GET['role4'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		if ($role != "All" && $role != "") {
			$ttlPagesSql = "SELECT * FROM staff WHERE (`Staff_ID` LIKE '%$isearch%' OR `Staff_Name` LIKE '%$isearch%' OR `Staff_Email` LIKE '%$isearch%') AND `Staff_Role` = $role";
		} else if ($role == "All") {
			$ttlPagesSql = "SELECT * FROM staff WHERE (`Staff_ID` LIKE '%$isearch%' OR `Staff_Name` LIKE '%$isearch%' OR `Staff_Email` LIKE '%$isearch%')";
		} else {
			$ttlPagesSql = "SELECT * FROM staff";
		}
	} else {
		$ttlPagesSql = "SELECT * FROM staff";
	}

    $result = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result);
    $totalPages = ceil($totalRows / $recordPerPage);

	if(isset($_GET['search']) || (isset($_GET['isearch4']) && isset($_GET['role4']))) {
		if(isset($_GET['search'])) {
			$role = $_GET['role'];
			$isearch = $_GET['isearch'];
			$_GET['isearch4'] = $isearch;
			$_GET['role4'] = $role;
		} else if (isset($_GET['isearch4']) && isset($_GET['role4'])) {
			$isearch = $_GET['isearch4'];
			$role = $_GET['role4'];
		}
		$isearch = mysqli_real_escape_string($link,$isearch);
		$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
		if ($role != "All" && $role != "") {
			$sql1 = "SELECT * FROM staff WHERE (`Staff_ID` LIKE '%$isearch%' OR `Staff_Name` LIKE '%$isearch%' OR `Staff_Email` LIKE '%$isearch%') AND `Staff_Role` = $role LIMIT $offset, $recordPerPage";
		} else if ($role == "All") {
			$sql1 = "SELECT * FROM staff WHERE (`Staff_ID` LIKE '%$isearch%' OR `Staff_Name` LIKE '%$isearch%' OR `Staff_Email` LIKE '%$isearch%') LIMIT $offset, $recordPerPage";
		} else {
			$sql1 = "SELECT * FROM staff LIMIT $offset, $recordPerPage";
		}
		$result1 = mysqli_query($link,$sql1);
	} else {
		$sql1 = "SELECT * FROM staff LIMIT $offset, $recordPerPage";
		$result1 = mysqli_query($link,$sql1);
	}

	// if(isset($_GET['search'])){
	// 	$role = $_GET['role'];
	// 	$isearch = $_GET['isearch'];
	// 	$isearch = mysqli_real_escape_string($link,$isearch);
	// 	$isearch = htmlentities($isearch, ENT_QUOTES, "UTF-8");
	// 	if ($role != "All") {
	// 		$sql1 = "SELECT * FROM staff WHERE (`Staff_ID` LIKE '%$isearch%' OR `Staff_Name` LIKE '%$isearch%' OR `Staff_Email` LIKE '%$isearch%') AND `Staff_Role` = $role";
	// 	} else if ($role == "All") {
	// 		$sql1 = "SELECT * FROM staff WHERE (`Staff_ID` LIKE '%$isearch%' OR `Staff_Name` LIKE '%$isearch%' OR `Staff_Email` LIKE '%$isearch%')";
	// 	}
	// 	$result1 = mysqli_query($link,$sql1);
	// } else {
	// 	$sql1 = "SELECT * FROM staff";
	// 	$result1 = mysqli_query($link,$sql1);
	// }

	if(isset($_GET['sid'])){
		$id = $_GET['sid'];
		$sql3 = "DELETE FROM `staff` WHERE `Staff_ID` = '$id'";
		if($result3 = mysqli_query($link,$sql3)){
			if ($id == $_GET['sID']) {
				echo "<script>alert('Staff role changed.');
				window.location='adminLogin.php';
				</script>";
			} else {
				echo "<script>alert('Staff role changed.');
				window.location='adminStaffView.php';
				</script>";
			}
		}
	}

	if(isset($_GET['cid'])){
		$id = $_GET['cid'];
		$crole = $_GET['crole'];
		$sql4 = "UPDATE `staff` SET `Staff_Role`='$crole' WHERE `Staff_ID` = '$id'";
		if($result4 = mysqli_query($link,$sql4)){
			if ($id == $_GET['sID']) {
				echo "<script>alert('Staff role changed.');
				window.location='adminLogin.php';
				</script>";
			} else {
				echo "<script>alert('Staff role changed.');
				window.location='adminStaffView.php';
				</script>";
			}
			
		}
	}
	// $icat = $_GET['icat'];
	// $sql1 = "SELECT * FROM item WHERE `Item_Cat`='$icat'";
	// echo '<script>alert("'.$sql1.'")</script>';



	// $istatus = $_GET['istatus'];
	
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