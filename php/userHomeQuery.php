<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';

	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
       	$pageno = 1;
    }

    $recordPerPage = 2;
    $offset = ($pageno-1) * $recordPerPage;

    $ttlPagesSql = "SELECT * FROM item WHERE `Item_Status` = 1;";
    $result = mysqli_query($link, $ttlPagesSql);
    $totalRows = mysqli_num_rows($result);
    $totalPages = ceil($totalRows / $recordPerPage);

    $sql1 = "SELECT * FROM item WHERE `Item_Status` = 1 LIMIT $offset, $recordPerPage";

	// require_once 'html/userHome.html';

	if(isset($_GET['sort'])) {
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

	$result1 = mysqli_query($link,$sql1);


	?>