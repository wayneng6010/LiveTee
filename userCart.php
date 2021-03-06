<?php 
	session_start();
?>
<?php include 'php/userCartQuery.php'; ?>

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
		// var doubleClick = false;
		$(document).ready(function () {
			$('.citem').each(function(i, obj){
			$.ajax({
	            url: "php/userProductQuery1.php",
	            type: "post",
	            data: {isize: $('.pdSelectSize').eq(i).find("option:selected").val(), itemID: $('.itemID').eq(i).val()},
	            success: function(data){
	                //adds the echoed response to our container
	                $stockAvailable = data;
	                if ($stockAvailable < 0) {
						$stockAvailable = 0;
					}
	                $("#stockNo").html($stockAvailable + " piece available");
	                var quanInput = document.getElementsByClassName('pdQuanInput')[i];
					quanInput.max = $stockAvailable;
	                var stockAvailable1 = document.getElementsByClassName('cartStockAvailable')[i];
					stockAvailable1.innerHTML = "Stock: " + $stockAvailable;
	                // alert($stockAvailable);

	                if (parseFloat(quanInput.value) >  parseFloat($stockAvailable)) {
						if ($stockAvailable == 0){
							$('.citem').eq(i).prop('checked', false);
							$('.citem').eq(i).attr("disabled", true);
							$('.pdQuanInput').eq(i).attr("disabled", true);
							$('.citem').eq(i).parent().parent().css({ 'border-left' : '2px solid darkred' });
							quanInput.value = 1;
						} else {
							quanInput.value = $stockAvailable;
						}
					} else {
						$('.citem').eq(i).removeAttr("disabled");
						$('.pdQuanInput').eq(i).removeAttr("disabled");
						$('.citem').eq(i).parent().parent().css({ 'border-left' : 'none' });
					}
	            }
	        });
		    $('.pdSelectSize').eq(i).change(function(){
		    	// $('.citem').eq(i).click();
		    	$.ajax({
	            url: "php/userProductQuery1.php",
	            type: "post",
	            data: {isize: $('.pdSelectSize').eq(i).find("option:selected").val(), itemID: $('.itemID').eq(i).val()},
	            success: function(data){
	                //adds the echoed response to our container
	                $stockAvailable = data;
	                if ($stockAvailable < 0) {
						$stockAvailable = 0;
					}
	                $("#stockNo").html($stockAvailable + " piece available");
	                var quanInput = document.getElementsByClassName('pdQuanInput')[i];
					quanInput.max = $stockAvailable;
	                var stockAvailable1 = document.getElementsByClassName('cartStockAvailable')[i];
					stockAvailable1.innerHTML = "Stock: " + $stockAvailable;
						// alert($stockAvailable);
					if (parseFloat(quanInput.value) >  parseFloat($stockAvailable)) {
						if ($stockAvailable == 0){
							$('.citem').eq(i).prop('checked', false);
							$('.citem').eq(i).attr("disabled", true);
							$('.pdQuanInput').eq(i).attr("disabled", true);
							$('.citem').eq(i).parent().parent().css({ 'border-left' : '2px solid darkred' });
							quanInput.value = 1;
						} else {
							quanInput.value = $stockAvailable;
						}
					} else {
						$('.citem').eq(i).removeAttr("disabled");
						$('.pdQuanInput').eq(i).removeAttr("disabled");
						$('.citem').eq(i).parent().parent().css({ 'border-left' : 'none' });
					}
	                // alert($stockAvailable);
	            }
	        	});
		        $.ajax({
		            url: "php/userCartQuery1.php",
		            type: "post",
		            data: {isize: $(this).find("option:selected").val(), cartID: $('.citem').eq(i).val(), iquan: $('.pdQuanInput').eq(i).val()},
		            success: function(data){
			            // var e = document.getElementById('popUpMsg');
			            // e.style.display = 'flex';
			            $("#popUpMsg").css("display", "flex");
			            $("#popUpMsg").css("visibility", "visible");
			            $("#popUpMsg").css("opacity", "1");
			            setTimeout(function(){
					      	var msg = document.getElementById('popUpMsg');
					      	msg.style.opacity = "0";
					      	msg.style.visibility = "hidden";
					    }, 1000);
			            $('.iprice > .ipricein').eq(i).html('RM'+data);
			            // alert(e.innerHTML);
		            }

		        });
		    });

		    $('.pdQuanInput').eq(i).bind('input', function(){
		    	// $('.citem').eq(i).click();
			  	$.ajax({
		            url: "php/userCartQuery1.php",
		            type: "post",
		            data: {isize: $('.pdSelectSize').eq(i).find("option:selected").val(), cartID: $('.citem').eq(i).val(), iquan: $(this).val()},
		            success: function(data){
	              //   	var e = document.getElementById('popUpMsg');
			            // e.style.display = 'flex';
			            // doubleClick = false;
			            $("#popUpMsg").css("display", "flex");
			            $("#popUpMsg").css("visibility", "visible");
			            $("#popUpMsg").css("opacity", "1");
			            setTimeout(function(){
					      	var msg = document.getElementById('popUpMsg');
					      	msg.style.opacity = "0";
					      	msg.style.visibility = "hidden";
					    }, 1000);
			            $('.iprice > .ipricein').eq(i).html('RM'+data);
			            if ($('.citem').is(':checked')) {
			            	$('.citem').eq(i).click();
			            	$('.citem').eq(i).click();
			            	// $('.pdQuanInput').eq(i).html();
			    //         	$currentTtl = $('.bold.total').eq(0).html();
							// $currentTtl = $currentTtl.substr($currentTtl.indexOf('M')+1);
			    //         	$perUnit = $('.unitPrice').eq(i).html();
							// $perUnit = $perUnit.substr($perUnit.indexOf('M')+1);
			    //         	$newTtl = $currentTtl - $perUnit;
			    //         	alert($newTtl);
			    //         	$('.bold.total').eq(0).html("RM"+$newTtl);
			            	// doubleClick = true;
			            }
		        		// totalup();
			            	// alert('up'+doubleClick);
		            }
		        });
			});

			});

		});
		
	</script>
</head>

<body id="userBody">
	<?php include "headers/userHeaders.php" ?>

	<br>
	<div id="popUpMsg" style=""><img src="Asset/Image/tick.png" width="auto" height="15" style="margin-right: 10px;">Changes Saved</div>
	<div id="regOuter" style="height: 810px; width: 95%; border: none;">
		<p id="regLabel">Cart</p>
		<form method="post" action="vendor/checkout.php">
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
	            		$rowcount = mysqli_num_rows($result);
	            		while ($row = mysqli_fetch_assoc($result)){
		            		echo '
		            		<tr>
			            	<td style="width: 2%;">
			            		<input type="checkbox" class="citem" id="cartID" name="cartID[]" value="'.$row['Cart_ID'].'" style="">
			            		<input type="text" id="itemID" class="itemID" name="itemID" value="'.$row['Item_ID'].'" style="display: none;">
			            	</td>
							<td style="width: 20%;">
								<!-- <div style="display: flex; align-items: center; justify-content: center; border: 1px solid; width: 100%;"> -->
								<img src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" width="100%" alt="">
								<!-- </div> -->
							</td>
							<td style="width: 30%;">'.$row['Item_Name'].'</td>
		            		<td style="width: 12%;"><select name="isize" class="pdSelectSize" id="pdSelectSize" style="width: 80px; min-width: 80px;">';

							$itemSize = explode(',', $row['Item_Size']);
		            		foreach($itemSize as $i) {
		            			if ($i != $row['Cart_ItemSize']){
									echo '<option value="'.$i.'">'.$i.'</option>';
								} else {
									echo '<option value="'.$i.'" selected>'.$i.'</option>';
								}
							}

		            		echo '</select></td>
		            		<td style="width: 12%;" class="unitPrice">RM'.$row['Item_Price'].'</td>
		            		<td style="width: 12%;">
		            		<input type="number" class="pdQuanInput" id="pdQuanInput" name="pdquan" min="1" value="'.$row['Cart_ItemQuan'].'" title="Item Quantity" style="width: 60px;" required>
		            		<br><span class="cartStockAvailable"></span>
		            		</td>

		            		<td class="iprice" style="width: 12%; position: relative;">
		            		<span class="ipricein">RM'.number_format(($row['Item_Price']*$row['Cart_ItemQuan']), 2).'</span>
		            		<a onclick="return confirm('."'Are you sure you want to delete?'".')" href="?did='.$row['Cart_ID'].'"><img src="Asset/Image/cross.svg" width="10" height="auto" class="delCart"></a>
		            		</td>
		            		</tr>
		              		';
		              	} 
		              	if ($rowcount == 0) {
		              		echo "<tr style='height: 100px;'><td colspan='7'>CART IS EMPTY</td></tr>";
		              	}
	              		?>
					</table>
	            </div>
			</div>

			<div id="checkOutDiv">
            	<table id="checkOutDivTable">
					<tr>
						<td style="width: 15%;"><input type="checkbox" onClick="selectAll(this)"><span style="font-size: 14px;">Select All</span></td>
						<td style="width: 25%;"><div style="margin-left: 20px;" class="checkoutTxt">Subtotal ( <span class="bold num">0</span> items ): <span class="bold sub">RM0</span></div></td>
						<!-- <td style="width: 25%;"><div class="checkoutTxt">Shipping Fee: <span class="bold fee">RM0</span></div></td> -->
						<td style="width: 25%; text-align: right"><div class="checkoutTxt ttl">Total: <span class="bold total">RM0</span></div></td>
            			<td style="width: 25%;"><input class="contentSubmit checkout" type="submit" value="CHECKOUT" name="checkout"></td>
            		</tr>
            	</table>
        	</div>
    	</form>

    	<script type="text/javascript">
    		

    	function totalup() {
    		var itemChecked = 0;
    		var shippingFee = 0;
    		var total = 0;
    		var citem = document.getElementsByClassName('citem');
    		var subtotal = document.getElementsByClassName('bold sub')[0];
    		var itemNum = document.getElementsByClassName('bold num')[0];
    		var totalCheckout = document.getElementsByClassName('bold total')[0];
    		for (let i = 0; i < citem.length; i++) {
				if (citem[i].checked) {
					itemChecked += 1;
					var parentofChecked = citem[i].parentNode.parentNode;
					var children = parentofChecked.childNodes;
					for (var x = 0; x < children.length; x++) {
					    if (children[x].classList == "iprice") {
					    	var iprice = parseFloat(children[x].innerHTML.split('RM')[1]);
					        total += iprice;
					    }
					}
					
				} 
    		}
    		itemNum.innerHTML = itemChecked;
		    subtotal.innerHTML = "RM" + total.toFixed(2);
			totalCheckout.innerHTML = "RM" + (total + shippingFee).toFixed(2);
    	}

    	setInterval(function() {
    		totalup();
		}, 200);

   //  	function totalup1() {
    		
   //  		var citem = document.getElementsByClassName('citem');

   //  		var subtotal = document.getElementsByClassName('bold sub')[0];
   //  		var itemNum = document.getElementsByClassName('bold num')[0];
   //  		var totalCheckout = document.getElementsByClassName('bold total')[0];
   //  		for (let i = 0; i < citem.length; i++) {
			// 	citem[i].onclick = function() {
			// 		if (citem[i].checked) {
			// 			itemChecked += 1;
			// 			itemNum.innerHTML = itemChecked;
			// 			var parentofChecked = citem[i].parentNode.parentNode;
			// 			var children = parentofChecked.childNodes;
			// 			// alert(parentofChecked.outerHTML);
			// 			for (var x = 0; x < children.length; x++) {
			// 				// alert(children[x].classList);
			// 			    if (children[x].classList == "iprice") {
			// 			    	var iprice = parseFloat(children[x].innerHTML.split('RM')[1]);
			// 			        total += iprice;
			// 			// alert("."+total);

			// 			        subtotal.innerHTML = "RM" + total;
			// 			        totalCheckout.innerHTML = "RM" + (total + shippingFee);
 		// 						// alert(total);
			// 			        break;
			// 			    }
			// 			}
			// 		} else {
			// 			itemChecked -= 1;
			// 			itemNum.innerHTML = itemChecked;
			// 			var parentofChecked = citem[i].parentNode.parentNode;
			// 			var children = parentofChecked.childNodes;
			// 			for (var y = 0; y < children.length; y++) {
			// 				// alert(children[x].classList);
			// 			    if (children[y].classList == "iprice") {

			// 			    	var iprice = parseFloat(children[y].innerHTML.split('RM')[1]);
			// 			// alert(doubleClick);
			// 			        // if (doubleClick) {
			// 				 	// alert('12');
			// 			       		// total -= iprice * 2;
			// 			        // } else {
			// 			        	total -= iprice;
			// 			        // }
			// 			        // doubleClick = false;
			// 			// alert(total);

			// 			        if (total < 0) {
			// 			        	total = 0;
			// 			        }
			// 			        subtotal.innerHTML = "RM" + total;
			// 			        totalCheckout.innerHTML = "RM" + (total + shippingFee);
 		// 						// alert(total);
			// 			        break;
			// 			    }
			// 			}
			// 		}
			// 		// alert(itemChecked);
			// 	}

			// }
   //  	}
    	
    	

    	function selectAll(source) {
		  	checkboxes = document.getElementsByClassName('citem');
		    if (source.checked) {
			  	for(var i = 0; i < checkboxes.length; i++) {
			  		if (checkboxes[i].disabled == false) {
		    			// checkboxes[i].checked = true;
						if (checkboxes[i].checked) {
			           	 	$('.citem').eq(i).click();
			           	 	$('.citem').eq(i).click();
			           	} else {
			           	 	$('.citem').eq(i).click();
			           	}
		    		}
				}
			} else {
				for(var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i].checked) {
			            $('.citem').eq(i).click();
					}
		    		// checkboxes[i].checked = false;
				}
			}
		}

		// $('.citem').each(function(i, obj){
		//     $('.pdQuanInput').eq(i).bind('input', function(){
		//         totalup();
		//         alert('af');
		// 	});
		// });
		// $('.citem').each(function(i, obj){

		
		    // $('.pdSelectSize').eq(i).change(function(){

		    	// $('.citem').eq(0).click();

		    // });
		// });

    	</script>
	
</body>
</html>