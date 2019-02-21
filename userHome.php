<?php
// include 'verficationAdmin.php';
	session_start();
	require_once 'conn.php';

	$sql1 = "SELECT * FROM item";
	
	if(isset($_GET['sort'])) {
		$sort = $_GET['sort'];
		if ($sort == "Highest Price"){
			$sql1 = "SELECT * FROM item ORDER BY `Item_Price` DESC";
		}
	}


	$result1 = mysqli_query($link,$sql1);


	// require_once 'html/userHome.html';

	

	?>