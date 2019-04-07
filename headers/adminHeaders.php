	<div class="notiBox">
		<div class="title"><b>Notification</b></div>
		<a href="adminOrderManage.php">
		<?php 
			$sqlNoti = "SELECT * FROM perorder, orders WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.Order_Status = '01' GROUP BY perorder.perOrder_ID";
	    	$resultNoti = mysqli_query($link, $sqlNoti);
			// $itemNoti = mysqli_fetch_assoc($resultNoti);
			echo '<b>'.mysqli_num_rows($resultNoti).'</b>&nbsp;new orders'; 
			$sqlNotiAll = "SELECT * FROM orders, perorder, user WHERE orders.Order_perOrderID = perorder.perOrder_ID AND orders.User_ID = user.User_ID AND orders.Order_Status = '01' GROUP BY perorder.perOrder_ID ORDER BY orders.Order_DateTime DESC";
	    	$resultNotiAll = mysqli_query($link, $sqlNotiAll);
			while ($itemNotiAll = mysqli_fetch_assoc($resultNotiAll)) {
				echo '<a href="adminOrderManage_Manage.php?uid='.$itemNotiAll['User_ID'].'&oid='.$itemNotiAll['perOrder_ID'].'"><div><b>'.$itemNotiAll['User_Name'].'</b>&nbsp;placed an order.<br>'.date("Y-m-d h:iA", strtotime($itemNotiAll['Order_DateTime'])).'</div></a>';
			}

		?>
		</a>
		
		<!-- <a href="#"><div>1st notification</div></a>
		<a href="#"><div>1st notification</div></a>
		<a href="#"><div>1st notification</div></a> -->
	</div>

	<div class="accBox">
		<p><a href="adminAccount.php">My Account</a></p>
		<p><a href="adminLogout.php">Logout</a></p>
	</div>
	

	<div id="sideBar">
		<a href="adminHome.php">Dashboard</a>
		<button class="collapse-btn">Clothing<img class="colEx" src="Asset/Image/expand.svg" width="auto" height="10"></button>
			<div class="collapse-item">
				<a href="adminClothingAdd.php">Add</a>
				<a href="adminClothingEdit.php">Edit</a>
			</div>
		<button class="collapse-btn">Stock<img class="colEx" src="Asset/Image/expand.svg" width="auto" height="10"></button>
			<div class="collapse-item">
				<a href="adminStockAdd.php">Add</a>
				<a href="adminStockView.php">View</a>
			</div>
		<button class="collapse-btn">Order<img class="colEx" src="Asset/Image/expand.svg" width="auto" height="10"></button>
			<div class="collapse-item">
				<a href="adminOrderManage.php">Manage</a>
				<a href="adminOrderHistory.php">History</a>
			</div>
		<!-- <a href="#">Message</a>
		<a href="#">Reviews</a> -->
		<a href="adminSales.php">Sales Report</a>
		
		<div class="addStaffbtn" style="display:none;">
		<button class='collapse-btn'>Staff<img class='colEx' src='Asset/Image/expand.svg' width='auto' height='10'></button>
			<div class='collapse-item'>
				<a href='adminStaffAdd.php'>Add</a>
				<a href='adminStaffView.php'>Edit</a>
			</div>
		</div>

		<div id="logoutBtn">
			<a href="adminLogout.php">Logout</a>
		</div>
	</div>
	
	<script type="text/javascript">
		
		//top header
		var flexRight = document.getElementById("flexRight");
		var notiBox = document.getElementsByClassName("notiBox")[0];
		var notiIcon = flexRight.getElementsByTagName("IMG")[0];
		notiIcon.addEventListener("click", function() {
			if(accBox.style.display === "block"){
				accBox.style.display = "none";
				accIcon.style.filter = "none";
			}
			if(notiBox.style.display === "block"){
				notiBox.style.display = "none";
				notiIcon.style.filter = "none";
			}else{
				notiBox.style.display = "block";
				notiIcon.style.filter = "drop-shadow(0px 0px 5px rgba(255, 255, 255, .5)) brightness(1)";
			}
		});

		//top header
		var flexRight = document.getElementById("flexRight");
		var accBox = document.getElementsByClassName("accBox")[0];
		var accIcon = flexRight.getElementsByTagName("IMG")[2];
		accIcon.addEventListener("click", function() {
			if(notiBox.style.display === "block"){ 
				notiBox.style.display = "none";
				notiIcon.style.filter = "none";
			}
			if(accBox.style.display === "block"){
				accBox.style.display = "none";
				accIcon.style.filter = "none";
			}else{
				accBox.style.display = "block";
				accIcon.style.filter = "drop-shadow(0px 0px 5px rgba(255, 255, 255, .5)) brightness(1)";
			}
		});

		//side bar
		var collapseBtn = document.getElementsByClassName("collapse-btn");
		var collapseItemAll = document.getElementsByClassName("collapse-item");
		var x, i;

		for (x = 0; x < collapseBtn.length; x++) {
			collapseBtn[x].addEventListener("click", function() {
				this.classList.add("focusBar");
				for (i = 0; i < collapseBtn.length; i++) {
					if (collapseItemAll[i].style.display === "block" && collapseItemAll[i] != this.nextElementSibling) {
						collapseItemAll[i].style.display = "none";
						collapseBtn[i].childNodes[1].src = "Asset/Image/expand.svg";
						collapseBtn[i].classList.remove("focusBar");
					}
				}
				var collapseItem = this.nextElementSibling;
				var colExIcon = this.childNodes[1];
				if (collapseItem.style.display === "block") {
			  		collapseItem.style.display = "none";
			  		colExIcon.src = "Asset/Image/expand.svg";
			  		this.classList.remove("focusBar");
				} else {
			  		collapseItem.style.display = "block";
			  		colExIcon.src = "Asset/Image/collapse.svg";
			  		this.classList.add("focusBar");
				}
		  	});
		}
	</script>