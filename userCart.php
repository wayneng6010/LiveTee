<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart | LiveTee</title>
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
	<?php include "headers/userHeaders.php" ?>
	<?php include 'php/userCartQuery.php'; ?>

	<br>
	<div id="regOuter" style="height: 810px; width: 95%; border: none;">
		<p id="regLabel">Cart</p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<div class="regHalf" id="regLeft" style="width: 100%;">
	            <div class="cartHeader">
	            	<table class="cartHeaderTable">
	            		<th style="width: 2%;"></th>
	            		<th style="width: 20%;"></th>
	            		<th style="width: 30%;">Item</th>
	            		<th style="width: 12%;">Size</th>
	            		<th style="width: 12%;">Price (Each)</th>
	            		<th style="width: 12%;">Quantity</th>
	            		<th style="width: 12%;">Total</th>
	            </div>
	            
	            <div class="cartItem">
	            		<?php
	            		while ($row = mysqli_fetch_assoc($result)){
		            		echo '<tr>
			            	<td style="width: 2%;">
			            		<input type="checkbox" class="citem" name="citem" value="" style="">
			            	</td>
							<td style="width: 20%;">
								<!-- <div style="display: flex; align-items: center; justify-content: center; border: 1px solid; width: 100%;"> -->
								<img src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" width="100%" alt="">
								<!-- </div> -->
							</td>
							<td style="width: 30%;">'.$row['Item_Name'].'</td>
		            		<td style="width: 12%;">'.$row['Cart_ItemSize'].'</td>
		            		<td style="width: 12%;">RM'.$row['Item_Price'].'</td>
		            		<td style="width: 12%;">'.$row['Cart_ItemQuan'].'</td>
		            		<td class="iprice" style="width: 12%;">RM'.$row['Item_Price']*$row['Cart_ItemQuan'].'</td>
		            		</tr>
		              		';
		              	}
	              		?>
					</table>
	            </div>
			</div>

			<div id="checkOutDiv">
            	<table id="checkOutDivTable">
					<tr>
						<td style="width: 25%;"><div style="margin-left: 20px;" class="checkoutTxt">Subtotal ( <span class="bold num">1</span> items ): <span class="bold">RM16</span></div></td>
						<td style="width: 25%;"><div class="checkoutTxt">Shipping Fee: <span class="bold">RM1</span></div></td>
						<td style="width: 25%; text-align: right"><div class="checkoutTxt ttl">Total: <span class="bold total">RM17</span></div></td>
            			<td style="width: 25%;"><input class="contentSubmit checkout" type="submit" value="CHECKOUT" name="checkout"></td>
            		</tr>
            	</table>
        	</div>
    	</form>

    	<script type="text/javascript">
    		var itemChecked = 0;
    		var shippingFee = 0;
    		var total = 0;
    		var citem = document.getElementsByClassName('citem');
    		for (let i = 0; i < citem.length; i++) {
				citem[i].onclick = function() {
					if (citem[i].checked) {
						itemChecked += 1;
						var parentofChecked = citem[i].parentNode.parentNode;
						var children = parentofChecked.childNodes;
						// alert(parentofChecked.outerHTML);
						for (var x = 0; x < children.length; x++) {
							// alert(children[x].classList);
						    if (children[x].classList == "iprice") {
						    	var iprice = parseInt(children[x].innerHTML.split('RM')[1]);
						        total += iprice;
								alert(total);

						        break;
						    }
						}
					} else {
						itemChecked -= 1;
					}
					alert(itemChecked);
				}
			}
    	</script>
	
</body>
</html>