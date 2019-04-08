<?php 
	session_start();
?>
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
		// function loadlink(){
		// 	$('.itemOuter').load(document.URL +  ' .itemOuter');
		// 	
		// }
		// loadlink();
		// setInterval(function(){
  //   		loadlink();
		// }, 1000);
	</script>
	
</head>
<?php include 'php/userHomeQuery.php'; ?>
<body id="userBody">

	<?php include "headers/userHeaders.php" ?>
	<div id="userSidebar">

		<!-- <div id="genderSidebar">
			<p>Gender</p>
			<div id="genderFlex">
				<div id="gender1"><a href="#">Women</a></div>
				<div id="gender2"><a href="#">Men</a><br></div>
			</div>
		</div> -->
		<hr>

		<div id="collSidebar">
			<p>Collection</p>
			<a href="?col=Sales">Sales</a><br>
			<a href="?col=New">New</a><br>
		</div>
		<hr>

		<div id="clothSidebar">
			<p>Clothing</p>
			<a href="?cat=Dresses">Dresses</a><br>
			<a href="?cat=Tops">Tops</a><br>
			<a href="?cat=T-Shirts">T-Shirts</a><br>
			<a href="?cat=Pants">Pants</a><br>
			<a href="?cat=Shorts">Shorts</a><br>
			<a href="?cat=Jeans">Jeans</a><br>
		</div>
		<hr>
	</div>
	
	<div id="sorting">
		<p>Sort By</p>
		<select id="sortSelect">
			<?php $sort = $_GET['sort']; ?>
			<option value="Relevance" <?php if ($sort=="Relevance") echo 'selected' ?>>Relevance</option>
			<!-- <option value="Popularity" <?php if ($sort=="Popularity") echo 'selected' ?>>Popularity</option> -->
			<option value="Lowest Price" <?php if ($sort=="Lowest Price") echo 'selected' ?>>Lowest Price</option>
			<option value="Highest Price" <?php if ($sort=="Highest Price") echo 'selected' ?>>Highest Price</option>
			<!-- <option value="Latest Arrival" <?php if ($sort=="Latest Arrival") echo 'selected' ?>>Latest Arrival</option> -->
		</select>
	</div>
	
	<div id="clothing">
		<div class="itemOuter">
			<?php
				

			while($row = mysqli_fetch_assoc($result1)){
			echo '<div class="itemMiddle">
				<div class="itemInner">
				<a href="'."userProduct.php?item=".$row['Item_ID'].'">
					<div class="itemInnest">
						<div class="slideUpOuter">
							<img class="image" src="data:image/jpeg;base64,'.base64_encode( $row['Item_Image'] ).'" width="100%" alt="">
							<div class="slideUpInner">
								<p>VIEW</p>
							</div>
						</div>	
						<p class="desp">'.$row['Item_Name'].'</p>
						<p class="price">RM '.$row['Item_Price'].'</p>
						<p class="sizes">'.$row['Item_Size'].'</p>
						</div>
				</a>
				</div>
			</div>';

			}
			?>
			
		</div>
		<div id="paging">
			<ul class="pagination">
		        
				<!-- link to first page -->
		        <li>
		        	<a href="<?php echo "?sort=".$sort."&searchTxt=".$searchTxt."&col=".$col."&cat=".$cat."&pageno=1"; ?>">1</a>
		        	<!-- <a href="?pageno=1">1</a> -->
		        </li>

				<!-- previous icon -->
		        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
		        	<?php 
		        		if ($pageno <= 1) {
		        			echo "<a href='".$_SERVER['REQUEST_URI']."'>";
		        		} else {
							echo "<a href='?sort=".$sort."&searchTxt=".$searchTxt."&col=".$col."&cat=".$cat."&pageno=".($pageno - 1)."'>";
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
		        			echo "<a href='?sort=".$sort."&searchTxt=".$searchTxt."&col=".$col."&cat=".$cat."&pageno=".($pageno + 1)."'>";
		        		}
		        	?>
		            	<img src="Asset/Image/next.svg" width="15">
		            </a>
		        </li>

				<!-- link to last page -->
		        <li>
		        	<a href="<?php echo "?sort=".$sort."&searchTxt=".$searchTxt."&col=".$col."&cat=".$cat."&pageno=".$totalPages; ?>"><?php if ($totalPages > 1) echo $totalPages; ?></a>
		        </li>
	    	</ul>
	    	<br>
		</div>	
	</div>
	

	

	<script type="text/javascript">
		var e = document.getElementById('sortSelect');
		$('#sortSelect').on('change', function() {
        	var sort = $("#sortSelect option:selected").text();
        	var new_url = document.URL.substring(0, document.URL.indexOf('?'));
        	$(location).attr('href', new_url + '?sort=' + sort);
        	counter++;
        });

	</script>
	
</body>
</html>