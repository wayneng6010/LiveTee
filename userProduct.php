<!DOCTYPE html>
<html>
<head>
	<title>Home | LiveTee</title>
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
		function tabChange(tabName) {
			var tab = document.getElementsByClassName("tab");
			var tabBtn = document.getElementsByClassName("tabBtn");
		  	for (i = 0; i < tab.length; i++) {
		    	tab[i].style.display = "none";
		  	}
		  	for (x = 0; x < tabBtn.length; x++) {
		    	tabBtn[x].style.color = "grey";
		    	tabBtn[x].style.borderBottom = "none";
		  	}
		  	document.getElementById(tabName).style.display = "block";
		  	event.target.style.color = "black";
		    event.target.style.borderBottom = "3px solid black";
		  	
	  	}
	</script>
</head>

<body id="userBody">
	<?php include 'php/userProductQuery.php'; ?>
	<?php include "html/userHeaders.html" ?>
	<?php
		if($row = mysqli_fetch_assoc($result1)){
		$itemSize = explode(',', $row['Item_Size']);
		echo '<div id="pdOutermost">
			<div id="pdImgOuter"><img id="pdImg" src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" width="400" height="auto" alt=""></div>
				<div id="pdDetailsOuter">
					<p id="pdName">'.$row['Item_Name'].'</p>
					<p id="pdPrice">RM '.$row['Item_Price'].'</p>
					<p id="pdSize"><label id="pdSizeTxt">Size</label><select id="pdSelectSize">';

			foreach($itemSize as $i) {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
					
				echo '</select></p>
					<p id="pdQuan"><label id="pdQuanTxt">Quantity</label><input type="number" id="pdQuanInput" name="pdquan" min="0" value="1" title="Item Quantity" required></p>
					<p id="pdSubmit"><input class="contentSubmit user" type="submit" name="buy" value="BUY NOW">
					<input class="contentSubmit user" type="submit" name="cart" value="ADD TO CART"></p>
					</div>
					</div>';

			}
	?>

	<div id="tabOuter">
		<div id="tabBar">
			<button class="tabBtn" id="details" onclick="tabChange('detTab')">Details</button>
			<button class="tabBtn" id="reviews" onclick="tabChange('RevTab')">Reviews</button>
		</div>
		<div class="tab" id="detTab">
			<?php
				if($row = mysqli_fetch_assoc($result2)){
					echo nl2br($row['Item_Desp']);
				}
			?>
		</div>
		<div class="tab" id="RevTab">Reviews</div>
		<div id="underTabBar"></div>
	</div>


	
</body>
</html>