<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';

	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 16;
    $offset = ($pageno-1) * $recordPerPage;
    $cat="";
    $col="";
    $searchTxt="";
    if(isset($_GET['searchTxt']) AND $_GET['searchTxt'] != "") { 
    	$searchTxt = $_GET['searchTxt'];
    	$ttlPagesSql = "SELECT * FROM item WHERE `Item_Name` LIKE '%$searchTxt%' AND `Item_Status` = 1;";
	} else if(isset($_GET['cat']) AND $_GET['cat'] != "") {
		$cat = $_GET['cat'];
		$ttlPagesSql = "SELECT * FROM item WHERE `Item_Status` = 1 AND `Item_Cat` = '$_GET[cat]';";
	} else if(isset($_GET['col']) AND $_GET['col'] != "") {
		$col = $_GET['col'];
		$ttlPagesSql = "SELECT * FROM item WHERE `Item_Status` = 1 AND `Item_Tag` = '$_GET[col]';";
	} else {
    	$ttlPagesSql = "SELECT * FROM item WHERE `Item_Status` = 1;";
	}
    $result = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result);
    $totalPages = ceil($totalRows / $recordPerPage);

    $sql1 = "";

    if(isset($_GET['searchTxt'])) { 
    	$searchTxt = $_GET['searchTxt'];
		$sql1 = "SELECT * FROM item WHERE `Item_Name` LIKE '%$searchTxt%' AND `Item_Status` = 1 LIMIT $offset, $recordPerPage";
	} else {
    	$sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 LIMIT $offset, $recordPerPage";
	}

	// require_once 'html/userHome.html';

	if(isset($_GET['sort']) AND $_GET['sort'] != "") {
		$sort = $_GET['sort'];
		if ($sort == "Relevance"){
			$sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 LIMIT $offset, $recordPerPage";
		}
		else if ($sort == "Popularity"){
			$sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 ORDER BY `Item_Price` DESC LIMIT $offset, $recordPerPage";
		}
		else if ($sort == "Lowest Price"){
			$sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 ORDER BY `Item_Price` ASC LIMIT $offset, $recordPerPage";
		}
		else if ($sort == "Highest Price"){
			$sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 ORDER BY `Item_Price` DESC LIMIT $offset, $recordPerPage";
		}
		else if ($sort == "Latest Arrival"){
			$sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 ORDER BY `Item_Price` DESC LIMIT $offset, $recordPerPage";
		}
			
		// echo "<script>
		// 	var e = document.getElementById('sortSelect');
		// 	e.value = 'highPri';
		// </script>";
		
	// header('Location: '.$_SERVER['REQUEST_URI'].'?sort=Relevance');

	}

	if(isset($_GET['cat']) AND $_GET['cat'] != "") {
		$sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 AND `Item_Cat` = '$_GET[cat]' LIMIT $offset, $recordPerPage";
	}

	if(isset($_GET['col']) AND $_GET['col'] != "") {
		$sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 AND `Item_Tag` = '$_GET[col]' LIMIT $offset, $recordPerPage";
	}





	$result1 = mysqli_query($link,$sql1);


	?>