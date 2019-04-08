<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Purchase | LiveTee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  	<link rel="icon" href="Asset/Image/icon1.png">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		// function validatePass(){
		// 	var pass = event.target.value;
		// 	var warn = document.getElementById("invalidWarn");
		// 	if (pass.length >= 8) {
		// 		warn.style.display = "none";
		// 	} else {
		// 		warn.style.display = "block";
		// 	}
		// }
	</script>
</head>

<body id="userBody">
	<?php 
		include "headers/userHeaders.php";
	?>
	<?php include 'php/userPurchaseQuery.php'; ?>

	<div id="popUpMsg" style=""><img src="Asset/Image/tick.png" width="auto" height="15" style="margin-right: 10px;">Review Submitted</div>

	<div id="myAccNav">
		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/myAccount.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userAccount.php">My Account</a>
			</div>
		</div>

		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/ps.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userChangePassword.php">Change Password</a>
			</div>
		</div>

		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/purchase.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userPurchase.php" id="selected">My Purchase</a>
			</div>
		</div>

		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/review.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userReview.php">My Reviews</a>
			</div>
		</div>
			
	</div>
	<br>
	<div id="regOuter" style="height: auto; width: 77%; margin-left: 18%;">
		<p id="regLabel">My Purchase</p>
	<?php
  //       $counter1 = 0;
		// while($row1 = mysqli_fetch_assoc($result1)){

  //      	 	if ($counter1 == 0){

		// 	echo '<div class="perOrder">
		// 				<div class="orderHeader">
		// 					<p>Placed On'.$row1['Order_DateTime'].'</p>';
		// 	}
		// 	echo		'</div>
		// 				<table class="tableOrder">
		// 				<tr>
		// 					<td><img src="data:image/jpeg;base64,'.base64_encode( $row1['Item_Image'] ).'" height="100" width="auto"></td>
		// 					<td>'.$row1['Item_Name'].'</td>
		// 					<td>Qty: '.$row1['Order_ItemQuan'].'</td>
		// 					<td><span>Processing</span></td>
		// 				</tr>';
  //           $counter1+=1;
  //       }
		// echo "</table></div>";

		


        $counter = 0;
		while($row = mysqli_fetch_assoc($result)){
			switch ($row['Order_Status']){
              	case '01':
                	$status = "Processing";
                	$review = "";
                	break;
              	case '02':
                	$status = "Delivering";
                	// $review = '<a class="conReceive" href="php/userConReceiveQuery.php?oid='.$row['perOrder_ID'].'">Confirm Receive</a>';
		           	$review = '<button class="conReceiveBtn" onclick="conReceive('.$row['perOrder_ID'].')">Confirm Receive</button>';
                	break;
              	case '03':
                	$status = "Received";
                	if ($row['Order_Review']){
		           		$review = '<a href="userViewReview.php?oid='.$row['Order_ID'].'&poid='.$row['perOrder_ID'].'">View Review</a>';
		           	} else {
		           		$review = '<a href="userWriteReview.php?oid='.$row['Order_ID'].'&poid='.$row['perOrder_ID'].'">Write Review</a>';
		           	}
                	break;  
              	default:
                	$status = "Unknown";
                	break;
           }

           	

       	 	if ($counter == 0){
				echo '<div class="perOrder" id="'.$row['perOrder_ID'].'">
						<div class="orderHeader">
							<p>Order #'.$row['perOrder_ID'].'</p>';
							// if ($row['Order_Status'] == '01') {
								echo '<p>Placed on '.date("Y-m-d h:iA", strtotime($row['Order_DateTime'])).'</p>';
							// } else {
								// echo '<p>Confirmed on '.date("Y-m-d h:iA", strtotime($row['perOrder_ConDateTime'])).'</p>';
							// }
				echo		'</div>
						<table class="tableOrder">
						<tr>
							<td><img src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" height="100" width="auto"></td>
							<td>'.$row['Item_Name'].'</td>
							<td>Qty: '.$row['Order_ItemQuan'].'</td>
							<td>RM'.$row['Item_Price'] * $row['Order_ItemQuan'].'</td>
							<td>'.$row['Order_ItemSize'].'</td>
							<td><span>'.$status.'</span></td>
							<td>'.$review.'</td>
						</tr>';
			}

			else {
          		if ($row['perOrder_ID'] == $dateTime){
				echo '
						<tr>
							<td><img src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" height="100" width="auto"></td>
							<td>'.$row['Item_Name'].'</td>
							<td>Qty: '.$row['Order_ItemQuan'].'</td>
							<td>RM'.$row['Item_Price'] * $row['Order_ItemQuan'].'</td>
							<td>'.$row['Order_ItemSize'].'</td>
							<td><span>'.$status.'</span></td>
							<td>'.$review.'</td>
						</tr></td></tr>';
				} else {
				echo '</table></div><hr>
						<div class="perOrder" id="'.$row['perOrder_ID'].'">
							<div class="orderHeader">
								<p>Order #'.$row['perOrder_ID'].'</p>';
							// if ($row['Order_Status'] == '01') {
								echo '<p>Placed on '.date("Y-m-d h:iA", strtotime($row['Order_DateTime'])).'</p>';
							// } else {
								// echo '<p>Confirmed on '.date("Y-m-d h:iA", strtotime($row['perOrder_ConDateTime'])).'</p>';
							// }	
				echo		'</div>
								<table class="tableOrder">
									<tr>
										<td><img src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" height="100" width="auto"></td>
										<td>'.$row['Item_Name'].'</td>
										<td>Qty: '.$row['Order_ItemQuan'].'</td>
										<td>RM'.$row['Item_Price'] * $row['Order_ItemQuan'].'</td>
										<td>'.$row['Order_ItemSize'].'</td>
										<td><span>'.$status.'</span></td>
										<td>'.$review.'</td>
									</tr>';
				}
			}
			$dateTime = $row['perOrder_ID'];
            $counter+=1;
		} 
		echo "</table></div>";
	?>
	</div>
	<?php
        if(isset($_GET['oid'])){
        	$oid = $_GET['oid'];
         	echo "<script>
            $(document).ready(function () {
			  	$('html, body').animate({
			    	scrollTop: $('#".$oid."').offset().top - 120
			  	}, 1000)
			});
          	</script>";
        }

        if(isset($_GET['rvSuccess'])){
          echo "<script>
            var e = document.getElementById('popUpMsg');
            e.style.display = 'flex';
          </script>";
        }
    ?>

	<script type="text/javascript">
		function conReceive(oid) {
			if (confirm('Confirm receive item?')) {
				window.location.replace("php/userConReceiveQuery.php?oid=" + oid);
			}
		}

		setInterval(function(){
	      	var msg = document.getElementById('popUpMsg');
	      	msg.style.opacity = "0";
	      	msg.style.visibility = "hidden";
	    }, 1000);
	</script>
	
</body>
</html>