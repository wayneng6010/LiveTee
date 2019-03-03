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
	$sql = "SELECT *, SUM(Stock_Quan) AS ttlStock FROM stock,item WHERE stock.Item_ID=item.Item_ID GROUP BY stock.Item_ID";
	$result1 = mysqli_query($link,$sql);

	$sql2 = "SELECT * FROM item WHERE Item_ID NOT IN(SELECT Item_ID FROM stock)";
	$result2 = mysqli_query($link,$sql2);
	?>