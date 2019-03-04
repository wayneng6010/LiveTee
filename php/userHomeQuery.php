<?php
	// include 'verficationAdmin.php';
	// session_start();
	require_once 'conn.php';
	

	$sql1 = "SELECT * FROM item";
	
	if(isset($_GET['sort'])) {
		$sort = $_GET['sort'];
		if ($sort == "Relevance"){
			$sql1 = "SELECT * FROM item";
		}
		else if ($sort == "Popularity"){
			$sql1 = "SELECT * FROM item ORDER BY `Item_Price` DESC";
		}
		else if ($sort == "Lowest Price"){
			$sql1 = "SELECT * FROM item ORDER BY `Item_Price` ASC";
		}
		else if ($sort == "Highest Price"){
			$sql1 = "SELECT * FROM item ORDER BY `Item_Price` DESC";
		}
		else if ($sort == "Latest Arrival"){
			$sql1 = "SELECT * FROM item ORDER BY `Item_Price` DESC";
		}

		// echo "<script>
		// 	var e = document.getElementById('sortSelect');
		// 	e.value = 'highPri';
		// </script>";
		
	// header('Location: '.$_SERVER['REQUEST_URI'].'?sort=Relevance');

	}


	$result1 = mysqli_query($link,$sql1);


	// require_once 'html/userHome.html';

	

	?>