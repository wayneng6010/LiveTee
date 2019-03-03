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

	$id = $_GET['iid'];
	// $sql = "SELECT * FROM stock,item WHERE stock.Item_ID=item.Item_ID AND item.Item_ID='$id'";
	$sql = "SELECT * FROM item WHERE Item_ID='$id'";
	$item = mysqli_query($link,$sql);
	$item = mysqli_fetch_assoc($item);
	$itemSize = explode(',', $item['Item_Size']);

	if(isset($_POST['add'])){
		$iquan = $_POST['iquan'];
		$iid = $_POST['iid'];
		$isize = $_POST['isize'];
		$sql2 = "UPDATE stock SET `Stock_Quan`=`Stock_Quan`+'$iquan' WHERE Item_ID = '$iid' AND Item_Size = '$isize'";

		if($queryResult = mysqli_query($link, $sql2)){
			echo "<script>alert('Stock up successful');</script>";
			header("location: adminStockAdd_Add.php?iid=".$iid."&success=true");
		}
		else{
			echo "<script>alert('Failed');</script>";
		}
	}

	?>