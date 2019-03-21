<!DOCTYPE html>
<html>
<head>
	<title>Manage Order | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="icon" href="Asset/Image/icon.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>

  <script type="text/javascript">
      // setTimeout(function(){

      // $('#selectCat').on('change', function() {
        // $('#content_container').load('adminClothingEdit.php');
      // })

      // $('#selectStatus').on('change', function() {
      //   $('#content_container').load('adminClothingEdit.php');
      // })
      // },5000);



    // var t = setInterval(refresh_div,1000);
  </script>

</head>
<body>
  <?php
    require 'php/adminOrderManage_ManageQuery.php';
  ?>
	<div id="header">
		<div id="flexLeft"><a href="html/adminHome.html"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Order - Manage</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">Order - Manage</h1>

  <div id="content_container" class="container_below" style="margin-top: -140px; padding: 10px 40px;">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" id="editForm">
      <p>
        <input class="contentInput" type="text" name="uid" title="Item Name" style="display:none;" required value="<?php echo $uid ?>">
      </p>
      <p>
        <input class="contentInput" type="text" name="oid" title="Item Name" style="display:none;" required value="<?php echo $oid ?>">
      </p>
      <!-- <p>
        <input class="contentInput" type="text" name="orderID" title="Item Name" style="display:none;" required 
        value="<?php 
        $i = 0;
        $len = count($orderIDArr);
        foreach ($orderIDArr as $dt) { 
          if ($i != $len - 1) {
            echo $dt.',';
          } else {
            echo $dt;
          }
          $i++; 
        }
        ?>">
      </p> -->
      
      <p>
        <label><b>Order ID</b></label>
        <?php echo '#'.$_GET['oid']; ?>
      </p>

      <p>
        <label><b>Username</b></label>
        <?php echo $row['User_Name']; ?>
      </p>
      
      <p>
        <label><b>Email</b></label>
        <?php echo $row['User_Email']; ?>
      </p>

      <p>
        <label><b>Address</b></label>
        <?php echo $row['User_Address'].', '.$row['User_Postal'].' '.$row['User_State']; ?>
      </p>
      
      <?php 
        $counter = 0;
        while($row = mysqli_fetch_assoc($result)){
        if ($counter == 0){
          echo '<hr><p><label><b>Order Date & Time</b></label>'.date("Y-m-d h:iA", strtotime($row['Order_DateTime'])).'</p>
                <table id="tableClothing">
                <th>Item ID</th>
                <th>Stock Available</th>
                <th>Item Name</th>
                <th>Size</th>
                <th>Quantity</th>';
          } 
          echo "<tr><td>".$row['Order_ItemID']."</td><td class='stock'>".$row['Stock_Quan']."</td><td>".$row['Item_Name']."</td><td>".$row['Order_ItemSize']."</td><td class='order'>".$row['Order_ItemQuan']."</td></tr>";

          
          $counter+=1;
          }
          if($counter==0){
            echo "<tr><td colspan='3' style='background-color: #f2f2f2;'>No order at the moment</td></tr>";
          }

            ?>
    </table>
      <hr>
      <p>
        <label><b>Tracking Number</b></label>
        <input class="contentInput" type="text" name="trackNo" required>
      </p>
      <p>
        <input class="contentSubmit" type="submit" value="Confirm Order" name="con">
        <div id="successMsg" style="line-height: 1.5; color: darkred; display: none;">Insufficient stock</div>
      </p>
      
    </form>
	</div>

  <?php
    if(isset($_GET['failed'])){
      echo "<script>
        var e = document.getElementById('successMsg');
        e.style.display = 'block';
      </script>";
    }
  ?>

<script type="text/javascript">
  var table = document.getElementById("tableClothing");
  var stock = table.getElementsByClassName("stock");
  var order = table.getElementsByClassName("order");
  for (i = 0; i < stock.length; i++) {
    if (stock[i].innerHTML < order[i].innerHTML) {
      stock[i].style.color = "darkred";
      stock[i].innerHTML += " (Insufficient)";
    }
  }

</script>

<?php include_once 'headers/adminHeaders.html';  include 'verficationAdminRole.php';?>

</body>
</html>