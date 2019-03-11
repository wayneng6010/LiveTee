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
	<?php include 'php/userAccountQuery.php'; ?>
	
	<div id="myAccNav">
		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/myAccount.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userAccount.php" id="selected">My Account</a>
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
				<a href="userPurchase.php">My Purchase</a>
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
	<div id="regOuter" style="height: 570px; width: 77%; margin-left: 18%;">
		<p id="regLabel">My Account</p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="regHalf" id="regLeft" style="width: 100%">
				<p>
	              	<span class="inputLbl"><b>Full Name</b></span>
	              	<input class="contentInput profile" type="text" name="fname" value="<?php echo $row['User_Name']; ?>" required>
	            </p>
	            <p>
	              	<span class="inputLbl"><b>Email</b></span>
	              	<input class="contentInput profile" type="email" name="email" value="<?php echo $row['User_Email']; ?>" required>
	            </p>
	            <p>
	              	<span class="inputLbl"><b>Phone Number</b></span>
	              	<select class="contentInput phone1" style="width: 70px;" type="text" name="phone1" required>
	              		<option <?php if ($phone1 == '010') echo ' selected="selected"';?>>010</option>
	              		<option <?php if ($phone1 == '011') echo ' selected="selected"';?>>011</option>
	              		<option <?php if ($phone1 == '012') echo ' selected="selected"';?>>012</option>
	              		<option <?php if ($phone1 == '013') echo ' selected="selected"';?>>013</option>
	              		<option <?php if ($phone1 == '014') echo ' selected="selected"';?>>014</option>
	              		<option <?php if ($phone1 == '016') echo ' selected="selected"';?>>016</option>
	              		<option <?php if ($phone1 == '017') echo ' selected="selected"';?>>017</option>
	              		<option <?php if ($phone1 == '018') echo ' selected="selected"';?>>018</option>
	              		<option <?php if ($phone1 == '019') echo ' selected="selected"';?>>019</option>
	              	</select> 
	              	<input class="contentInput phone2" style="width: 275px;" id="phoneNo" type="text" name="phone2" pattern="[0-9]{7,8}" placeholder="e.g. 12345678" onkeyup="limitChar()" value="<?php echo $phone2; ?>" required>
	            </p>
	            <p id="passWarn" style="margin-bottom: -20px; margin-top: 5px;"><img src="Asset/Image/warn.svg" width="17" height="auto">&nbspInvalid Email or Password</p>
				<hr>
				<p id="addressField">
	              	<span class="inputLbl"><b>Address</b></span>
	              	<textarea class="contentInput address1" type="text" name="address" title="Home Address" cols="30" rows="5" required><?php echo $row['User_Address']; ?></textarea>
	            </p>
				<p>
	              	<span class="inputLbl"><b>Postal Code</b></span>
	              	<input class="contentInput profile" type="text" name="postal" placeholder="e.g. 11600" value="<?php echo $row['User_Postal']; ?>" required>
	            </p>
	             <p>
	              	<span class="inputLbl"><b>State</b></span>
	              	<select class="contentInput profile" type="text" name="state" required>
	              		<option disabled>State</option>
	              		<option <?php if ($row['User_State'] == 'Johor') echo ' selected="selected"';?>>Johor</option>
	              		<option <?php if ($row['User_State'] == 'Kedah') echo ' selected="selected"';?>>Kedah</option>
	              		<option <?php if ($row['User_State'] == 'Kelantan') echo ' selected="selected"';?>>Kelantan</option>
	              		<option <?php if ($row['User_State'] == 'Malacca') echo ' selected="selected"';?>>Malacca</option>
	              		<option <?php if ($row['User_State'] == 'Negeri Sembilan') echo ' selected="selected"';?>>Negeri Sembilan</option>
	              		<option <?php if ($row['User_State'] == 'Pahang') echo ' selected="selected"';?>>Pahang</option>
	              		<option <?php if ($row['User_State'] == 'Penang') echo ' selected="selected"';?>>Penang</option>
	              		<option <?php if ($row['User_State'] == 'Perak') echo ' selected="selected"';?>>Perak</option>
	              		<option <?php if ($row['User_State'] == 'Perlis') echo ' selected="selected"';?>>Perlis</option>
	              		<option <?php if ($row['User_State'] == 'Sabah') echo ' selected="selected"';?>>Sabah</option>
	              		<option <?php if ($row['User_State'] == 'Sarawak') echo ' selected="selected"';?>>Sarawak</option>
	              		<option <?php if ($row['User_State'] == 'Selangor') echo ' selected="selected"';?>>Selangor</option>
	              		<option <?php if ($row['User_State'] == 'Terengganu') echo ' selected="selected"';?>>Terengganu</option>
	              	</select> 
	            </p>
            <p style="vertical-align: middle;">
            	<input class="contentSubmit login" type="submit" value="Save" name="update">
            </p>
    	</form>
	</div>

	<script type="text/javascript">
		function limitChar(){
			var max_chars = 8;
			if(event.target.value.length >= max_chars) { 
			    event.target.value = event.target.value.substr(0, max_chars);
			}
			event.target.value = event.target.value.replace(/\D/g,'');
		}

	</script>
	
</body>
</html>