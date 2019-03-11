<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Account | LiveTee</title>
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
        $counter = 0;
		while($row = mysqli_fetch_assoc($result)){
			switch ($row['Order_Status']){
              	case '01':
                	$status = "Processing";
                	break;
              	case '02':
                	$status = "Delivering";
                	break;
              	case '03':
                	$status = "Received";
                	break;  
              	default:
                	$status = "Unknown";
                	break;
           }

           	if ($row['Order_Review']){
           		$review = '<a href="userViewReview.php?dateTime=$row[Order_ConDateTime]">View Review</a>';
           	} else {
           		$review = '<a href="userWriteReview.php?dateTime=$row[Order_ConDateTime]">Write Review</a>';
           	}

       	 	if ($counter == 0){
				echo '<div class="perOrder">
						<div class="orderHeader">
							<p>Order #'.$row['Order_ID'].'</p>
							<p>Confirmed on '.date("Y-m-d h:iA", strtotime($row['Order_ConDateTime'])).'</p>
						</div>
						<table class="tableOrder">';
			}

			else {
          	if ($row['Order_ConDateTime'] == $dateTime){
				echo '
						<tr>
							<td><img src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" height="100" width="auto"></td>
							<td>'.$row['Item_Name'].'</td>
							<td>Qty: '.$row['Order_ItemQuan'].'</td>
							<td><span>'.$status.'</span></td>
							<td>'.$review.'</td>
						</tr>
						
					';
			} else {
				echo '</table></div><hr>
						<div class="perOrder">
							<div class="orderHeader">
								<p>Order #'.$row['Order_ID'].'</p>
								<p>Confirmed on '.date("Y-m-d h:iA", strtotime($row['Order_DateTime'])).'</p>
							</div>
								<table class="tableOrder">
									<tr>
										<td><img src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" height="100" width="auto"></td>
										<td>'.$row['Item_Name'].'</td>
										<td>Qty: '.$row['Order_ItemQuan'].'</td>
										<td><span>'.$status.'</span></td>
										<td>'.$review.'</td>
									</tr>';
			}
			}
			$dateTime = $row['Order_ConDateTime'];
            $counter+=1;
		} 
		echo "</table></div><hr>";
	?>
	</div>

	<script type="text/javascript">

	</script>
	
</body>
</html>