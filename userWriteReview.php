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
  	<!-- star font -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<?php include 'php/userWriteReviewQuery.php'; ?>

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
		<p id="regLabel">Write Review</p>
	<?php
		if($row = mysqli_fetch_assoc($result)){

  		echo '<div class="perOrder" id="'.$row['perOrder_ID'].'">
							<div class="orderHeader">
								<p>Order #'.$row['perOrder_ID'].'</p>';
								echo '<p><span>Placed on</span>'.date("Y-m-d h:iA", strtotime($row['Order_DateTime'])).'</p>';
								echo '<p><span>Confirmed on</span>'.date("Y-m-d h:iA", strtotime($row['perOrder_ConDateTime'])).'</p>';
		echo				'</div>
								<table class="tableOrder">
									<tr>
										<td><img src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" height="100" width="auto"></td>
										<td>'.$row['Item_Name'].'</td>
										<td>Qty: '.$row['Order_ItemQuan'].'</td>
										<td>Qty: '.$row['Order_ItemSize'].'</td>
										<td><span>RM'.$row['Item_Price'] * $row['Order_ItemQuan'].'</span></td>
									</tr></table>';
		}
	?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="reviewForm">
    	<input class="contentInput" type="text" name="oid" title="Item Name" required value="<?php echo $_GET['oid']; ?>" style="display: none;">
		<input class="contentInput" type="text" name="poid" title="Item Name" required value="<?php echo $_GET['poid']; ?>" style="display: none;">

    	<p>
    		<label>Review</label>
        	<textarea class="contentInput" type="text" name="review" title="Item Description" cols="38" rows="5" required></textarea>
    	</p>

		<p style="display: inline-block;">
    		<label style="margin-top: -30px;">Rating</label>
    		<div id="rateDiv">
	    		<table id="rateTable">
	    			<tr>
	    				<td>
	    					<input type="radio" name="rate" value="1" class="rateInput" required>
	    					<span class="fa fa-star"></span>
	    				</td>
	    				<td>
	    					<input type="radio" name="rate" value="2" class="rateInput">
	    					<span class="fa fa-star"></span>
	    				</td>
	    				<td>
	    					<input type="radio" name="rate" value="3" class="rateInput">
	    					<span class="fa fa-star"></span>
	    				</td>
	    				<td>
	    					<input type="radio" name="rate" value="4" class="rateInput">
	    					<span class="fa fa-star"></span>
	    				</td>
	    				<td>
	    					<input type="radio" name="rate" value="5" class="rateInput">
	    					<span class="fa fa-star"></span>
	    				</td>
	    			</tr>
	    		</table>
    		</div>
		</p>

		<p>
            <input class="contentSubmit" style="margin-top: -15px;" type="submit" name="add">
			<a href="userPurchase.php?oid=<?php echo $_GET['poid']?>" class="backLink">Back</a>
        </p>

    </form>

	</div>

	<script type="text/javascript">
		var star = document.getElementsByClassName('fa fa-star');
		var input = document.getElementsByClassName('rateInput');
		function clearAllChecked() {
			for (var x = 0; x < 5; x++) {
				star[x].classList.remove("checked");
			}
		}

		star[0].onclick = function(){
			clearAllChecked();
			input[0].checked = true;
			star[0].classList.add("checked");
		}

		star[1].onclick = function(){
			clearAllChecked();
			input[1].checked = true;
			star[0].classList.add("checked");
			star[1].classList.add("checked");
		}

		star[2].onclick = function(){
			clearAllChecked();
			input[2].checked = true;
			star[0].classList.add("checked");
			star[1].classList.add("checked");
			star[2].classList.add("checked");
		}

		star[3].onclick = function(){
			clearAllChecked();
			input[3].checked = true;
			star[0].classList.add("checked");
			star[1].classList.add("checked");
			star[2].classList.add("checked");
			star[3].classList.add("checked");
		}

		star[4].onclick = function(){
			clearAllChecked();
			input[4].checked = true;
			star[0].classList.add("checked");
			star[1].classList.add("checked");
			star[2].classList.add("checked");
			star[3].classList.add("checked");
			star[4].classList.add("checked");
		}


	</script>
	
</body>
</html>