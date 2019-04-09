<?php 
	session_start();
?>
<?php include 'php/userProductQuery.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Product | LiveTee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  	<!-- star font -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="icon" href="Asset/Image/icon1.png">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		$(document).ready(function () {
		    $('#pdSelectSize').change(function(){
		        $.ajax({
		            url: "php/userProductQuery1.php",
		            type: "post",
		            data: {isize: $(this).find("option:selected").val(), itemID: $('#itemID').val()},
		            success: function(data){
		                //adds the echoed response to our container
		                $stockAvailable = data;
		                if ($stockAvailable < 0) {
							$stockAvailable = 0;
						}
	                	$("#stockNo").html($stockAvailable + " piece available");
		                var quanInput = document.getElementById('pdQuanInput');
						quanInput.max = $stockAvailable;
						if ($stockAvailable == 0) {
							$("#oos").css("display", "block");
							$("#pdQuanInput").attr("disabled", true);
							$(".contentSubmit.user").eq(0).attr("disabled", true);
							$(".contentSubmit.user").eq(0).css("background-color", "lightgrey");
							$(".contentSubmit.user").eq(1).attr("disabled", true);
							$(".contentSubmit.user").eq(1).css("background-color", "lightgrey");
						} else {
							$("#oos").css("display", "none");
							$("#pdQuanInput").attr("disabled", false);
							$(".contentSubmit.user").eq(0).attr("disabled", false);
							$(".contentSubmit.user").eq(0).css("background-color", "grey");
							$(".contentSubmit.user").eq(1).attr("disabled", false);
							$(".contentSubmit.user").eq(1).css("background-color", "#303132");
						}
						
	                	// alert($stockAvailable);
		            }
		        });
		    });

	    	$.ajax({
	            url: "php/userProductQuery1.php",
	            type: "post",
	            data: {isize: $(this).find("option:selected").val(), itemID: $('#itemID').val()},
	            success: function(data){
	                //adds the echoed response to our container
	                $stockAvailable = data;
	                if ($stockAvailable < 0) {
						$stockAvailable = 0;
					}
	                $("#stockNo").html($stockAvailable + " piece available");
	                var quanInput = document.getElementById('pdQuanInput');
					quanInput.max = $stockAvailable;
					if ($stockAvailable == 0) {
						$("#oos").css("display", "block");
						$(".contentSubmit.user").eq(0).attr("disabled", true);
						$(".contentSubmit.user").eq(0).css("background-color", "lightgrey");
						$(".contentSubmit.user").eq(1).attr("disabled", true);
						$(".contentSubmit.user").eq(1).css("background-color", "lightgrey");
					} else {
							$("#oos").css("display", "none");
							$("#pdQuanInput").attr("disabled", false);
							$(".contentSubmit.user").eq(0).attr("disabled", false);
							$(".contentSubmit.user").eq(0).css("background-color", "grey");
							$(".contentSubmit.user").eq(1).attr("disabled", false);
							$(".contentSubmit.user").eq(1).css("background-color", "#303132");
						}
	                // alert($stockAvailable);
	            }
	        });
		});

		function tabChange(tabName, index) {
			// alert(tabName);
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
		  	tabBtn[index].style.color = "black";
		    tabBtn[index].style.borderBottom = "3px solid black";
	  	}

	</script>
</head>

<body id="userBody">
<?php include "headers/userHeaders.php"; ?>
	<div id="popUpMsg" style=""><img src="Asset/Image/tick.png" width="auto" height="15" style="margin-right: 10px;">Added to Cart</div>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	
	<?php
		if($row = mysqli_fetch_assoc($result1)){
		$itemSize = explode(',', $row['Item_Size']);

		
		echo '<div id="pdOutermost">
				<div id="pdImgOuter"><img id="pdImg" src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" width="400" height="auto" alt=""></div>
				<div id="pdDetailsOuter">
					<input style="display: none;" type="text" id="itemID" name="iid" value="'.$row['Item_ID'].'"></p>
					<p id="pdName">'.$row['Item_Name'].'</p>
					<p id="pdPrice">RM '.$row['Item_Price'].'</p>
					<p id="pdSize"><label id="pdSizeTxt">Size</label><select name="isize" id="pdSelectSize">';

			foreach($itemSize as $i) {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
					
				echo '</select></p>
					<p id="pdQuan">
						<label id="pdQuanTxt">Quantity</label>
						<input type="number" oninput="limitQuan()" id="pdQuanInput" name="pdquan" min="1" value="1" title="Item Quantity" required>
						<span id="stockNo">';
				// echo $sizeArr['S'];
				echo '</span>
					<span id="oos" style="display: none; font-size: 14px; color: darkred; margin-top: 15px; margin-bottom: -15px; font-weight: bold;">Sorry, this size is temporary out of stock.</span>
					</p>
					<p id="pdSubmit"><input style="display: none;" class="contentSubmit user" type="submit" name="buy" value="BUY NOW">
					<input class="contentSubmit user" type="submit" name="cart" value="ADD TO CART"></p>
					</div>
					</div>
					</form>';
			}
	?>

	<br>

	<div id="tabOuter">
		<div id="tabBar">
			<button class="tabBtn" id="details" onclick="tabChange('detTab', 0)">Details</button>
			<button class="tabBtn" id="reviews" onclick="tabChange('RevTab', 1)">Reviews</button>
		</div>
		<div class="tab" id="detTab">
			<?php
				if($row = mysqli_fetch_assoc($result2)){
					echo nl2br($row['Item_Desp']);
				}
			?>
		</div>
		<div class="tab" id="RevTab">
		<?php
		while ($rowRv = mysqli_fetch_assoc($result4)){
			echo '<div class="eachRv">
				<div class="profileRv">
					<img src="Asset/Image/Profile1.svg" width="30" height="auto">
				</div>
				<div class="leftDiv">
					<div class="userRv">'
						.$rowRv['User_Name'].
						'<table class="rateTable rvRate">
			    			<tr>
			    				<td>
			    					<span class="';
			    					if ($rowRv['Rv_Rating'] == 1) echo 'fa fa-star checked'; else echo 'fa fa-star';
			    					echo '"></span>
			    				</td>
			    				<td>
			    					<span class="';
			    					if ($rowRv['Rv_Rating'] == 2) echo 'fa fa-star checked'; else echo 'fa fa-star';
			    					echo '"></span>
			    				</td>
			    				<td>
			    					<span class="';
			    					if ($rowRv['Rv_Rating'] == 3) echo 'fa fa-star checked'; else echo 'fa fa-star';
			    					echo '"></span>
			    				</td>
			    				<td>
			    					<span class="';
			    					if ($rowRv['Rv_Rating'] == 4) echo 'fa fa-star checked'; else echo 'fa fa-star';
			    					echo '"></span>
			    				</td>
			    				<td>
			    					<span class="';
			    					if ($rowRv['Rv_Rating'] == 5) echo 'fa fa-star checked'; else echo 'fa fa-star';
			    					echo '"></span>
			    				</td>
			    			</tr>
			    		</table>
					</div>
					<div class="txtRv">'.
						nl2br($rowRv['Rv_Txt']).'
					</div>
					<div class="DateTimeRv">'.
						date("Y-m-d h:iA", strtotime($rowRv['Rv_DateTime'])).'
					</div>
				</div>
			</div>
			<hr>';
		}
		?>
		<div id="paging">
      <ul class="pagination">
        <!-- link to first page -->
            <li>
              <!-- <a href="?pageno=1"> -->
              <?php echo "<a href='?item=".$itemID."&pageno=1'>1</a>"; ?>

            </li>

        <!-- previous icon -->
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <?php 
                if ($pageno <= 1) {
                  echo "<a href='".$_SERVER['REQUEST_URI']."'>";
                } else {
                    echo "<a href='?item=".$itemID."&pageno=".($pageno - 1)."'>";
                }
              ?>
                  <img src="Asset/Image/prev.svg" width="15">
                </a>
            </li>
        
        <!-- current page number -->
            <li>
              <span id="currentPg">
            <?php echo $pageno; ?>
              </span>
            </li>

        <!-- next icon -->
            <li class="<?php if($pageno >= $totalPages){ echo 'disabled'; } ?>">
              <?php 
                if ($pageno >= $totalPages) {
                  echo "<a href='".$_SERVER['REQUEST_URI']."'>";
                } else {
                    echo "<a href='?item=".$itemID."&pageno=".($pageno + 1)."'>";
                }
              ?>
                  <img src="Asset/Image/next.svg" width="15">
                </a>
            </li>

        <!-- link to last page -->
            <li>
              <?php echo "<a href='?item=".$itemID."&pageno=$totalPages'>"; ?>
              	<?php if ($totalPages > 1) echo $totalPages; ?></a>
            </li>
        </ul>
    </div> 
		</div>
		<div id="underTabBar"></div>
	</div>
	
	<?php 
		if(isset($_GET['success'])){
          echo "<script>
            var e = document.getElementById('popUpMsg');
            e.style.display = 'flex';
          </script>";
        }
	?>
	
	<script type="text/javascript">
		var table = document.getElementsByClassName('rateTable');
		
		for (var i = 0; i < table.length; ++i) {
			var star = table[i].getElementsByTagName('span');

			for (var x = 0; x < 5; x++) {
				if (star[x].classList.contains("checked")){
					switch (x) {
						case 1:
							star[0].classList.add("checked");
							break;
						case 2:
							star[0].classList.add("checked");
							star[1].classList.add("checked");
							break;
						case 3:
							star[0].classList.add("checked");
							star[1].classList.add("checked");
							star[2].classList.add("checked");
							break;
						case 4:
							star[0].classList.add("checked");
							star[1].classList.add("checked");
							star[2].classList.add("checked");
							star[3].classList.add("checked");
							break;
						default:
							break;
					}
				}
			}
		}


		function limitQuan(){
			$max_quan = $stockAvailable;
			// alert(event.target.value);
			// alert($max_quan);
			// alert(Number(event.target.value) > Number($max_quan));
			if(Number(event.target.value) > Number($max_quan)) { 
				// alert($stockAvailable);
			    event.target.value = $max_quan;
			}
			event.target.value = event.target.value.replace('e','');
		}

		setInterval(function(){
	      	var msg = document.getElementById('popUpMsg');
	      	msg.style.opacity = "0";
	      	msg.style.visibility = "hidden";
	    }, 1000);

	</script>
	<?php
	if (isset($_GET['pageno'])){
		echo "<script>$('#reviews').click();</script>";
		echo "<script>
        $(document).ready(function () {
		  	$('html, body').animate({
		    	scrollTop: $('#reviews').offset().top
		  	}, 10)
		});
      	</script>";
	}

	?>
</body>
</html>