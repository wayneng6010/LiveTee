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
                <th>Order ID</th>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Size</th>
                <th>Quantity</th>';
          echo "<tr><td>#".$row['Order_ID']."</td><td>".$row['Order_ItemID']."</td><td>".$row['Item_Name']."</td><td>".$row['Order_ItemSize']."</td><td>".$row['Order_ItemQuan']."</td></tr>";
        } else {
          if ($row['Order_DateTime'] == $dateTime){
            echo "<tr><td>#".$row['Order_ID']."</td><td>".$row['Order_ItemID']."</td><td>".$row['Item_Name']."</td><td>".$row['Order_ItemSize']."</td><td>".$row['Order_ItemQuan']."</td></tr>";
          } else {
            echo '</table><hr><p><label><b>Order Date & Time</b></label>'.date("Y-m-d h:iA", strtotime($row['Order_DateTime'])).'</p>
                <table id="tableClothing">
                <th>Order ID</th>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Size</th>
                <th>Quantity</th>';
            echo "<tr><td>#".$row['Order_ID']."</td><td>".$row['Order_ItemID']."</td><td>".$row['Item_Name']."</td><td>".$row['Order_ItemSize']."</td><td>".$row['Order_ItemQuan']."</td></tr>";
          }
        }
          
          $dateTime = $row['Order_DateTime'];
          
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
      </p>
      
    </form>
	</div>
  <script type="text/javascript">

  // $('#selectCat').on('change', function(e) {
  //     document.sorting.submit();

  //     function refresh_div() {

  //       jQuery.ajax({
  //           url:'adminClothingEdit.php',
  //           type:'POST',
  //           success:function(msg) {
  //             alert("yes");

  //             $( "#tableClothing" ).load(document.URL + "#tableClothing" );
              
  //               // jQuery(".result1").html(results);
  //               // $('#content_container').fadeOut(800, function(){

  //               //             $('#content_container').html(msg).fadeIn().delay(2000);

  //               //         });
  //           }
  //       });
  //   }
  //   // var t = setInterval(refresh_div,1000);
    
  //     })
</script>

<?php include_once 'headers/adminHeaders.html';  include 'verficationAdminRole.php';?>

</body>
</html>