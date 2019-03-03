<?php
// include 'verficationAdmin.php';
	session_start();
	require_once 'conn.php';

	if($_SESSION['sRole']==1){
		echo "<script>
            var e = document.getElementsByClassName('addStaffbtn')[0];
            e.style.display = 'inline-block';
            </script>";
	}

	
	// $sql1 = "SELECT * FROM item";
	$iid = $_GET['iid'];
	$sql = "SELECT *, stock.Item_Size AS ssize FROM stock, item WHERE stock.Item_ID=item.Item_ID AND stock.Item_ID=$iid";
	$result1 = mysqli_query($link,$sql);
	$num_rows = $result1->num_rows;


	?>