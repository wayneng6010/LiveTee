<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Review | LiveTee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<!-- star font -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<?php include 'php/userReviewQuery.php'; ?>

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
				<a href="userPurchase.php">My Purchase</a>
			</div>
		</div>

		<div class="disFlex">
			<div class="disFlex">
				<img src="Asset/Image/review.svg" width="auto" height="20">
			</div>
			<div class="disFlex">
				<a href="userReview.php" id="selected">My Reviews</a>
			</div>
		</div>
			
	</div>
	<br>
	<div id="regOuter" style="height: auto; width: 77%; margin-left: 18%; border: none;">
		<p id="regLabel" style="margin-bottom: 10px;">My Review</p>
	<table id="reviewView">
	<tr>
		<th style="text-align: center;">Rating</th>
		<th>Review</th>
		<th>Item Name</th>
		<th>Submitted Date Time</th>
	</tr>
	<?php
		$counter = 0;
		while ($rowRv = mysqli_fetch_assoc($result4)){

		echo '<tr>
					<td>
						<table class="rateTable rvRate" style="margin: 0 auto;">
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
					</td>
					<td>'.nl2br($rowRv['Rv_Txt']).'</td>
					<td><a target="_blank" href="userProduct.php?item='.$rowRv['Item_ID'].'" class="reviewItem">'.$rowRv['Item_Name'].'</a></td>
					<td>'.date("Y-m-d h:iA", strtotime($rowRv['Rv_DateTime'])).'</td>
				</tr>';
				$counter += 1;
		}
		
		?>

	</div>
    </table>

    <?php
    	if ($counter == 0) {
			echo "<p style='font-size: 16px; padding-left: 3%;'>No review yet.</p>";
		}
    ?>
	
	<div id="paging">
      <ul class="pagination">
        <!-- link to first page -->
            <li>
              <!-- <a href="?pageno=1"> -->
              <?php echo "<a href='?pageno=1'>1</a>"; ?>

            </li>

        <!-- previous icon -->
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
              <?php 
                if ($pageno <= 1) {
                  echo "<a href='".$_SERVER['REQUEST_URI']."'>";
                } else {
                    echo "<a href='?pageno=".($pageno - 1)."'>";
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
                    echo "<a href='?pageno=".($pageno + 1)."'>";
                }
              ?>
                  <img src="Asset/Image/next.svg" width="15">
                </a>
            </li>

        <!-- link to last page -->
            <li>
              <?php echo "<a href='?pageno=$totalPages'>"; ?>
              	<?php if ($totalPages > 1) echo $totalPages; ?></a>
            </li>
        </ul>
    </div> 


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
	</script>
	
</body>
</html>