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
    require 'php/adminOrderManageQuery.php';
  ?>
  <div id="popUpMsg" style=""><img src="Asset/Image/tick.png" width="auto" height="15" style="margin-right: 10px;">Order Confirmed</div>
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
	<div id="content_container">
    <form method="post" id="sorting" name="sorting" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="margin-top: -15px;">
        <input class="contentSubmit filter_btn" type="submit" name="add" value="Search">
        <input class="contentInput filter_txt" type="text" name="isearch" required>
      </p>
    </form>
  </div>
  
  <div id="content_container" class="container_below" style="margin-top: -70px;">
    <table id="tableClothing">
      <th>Username</th>
      <th>Email</th>
      <th>Date & Time</th>
      <th>Item Quantity</th>
      <th>Action</th>
      <?php 
                $counter=0;
                while($row = mysqli_fetch_assoc($result1)){
                echo "<tr><td>".$row['User_Name']."</td><td>".$row['User_Email']."</td><td>".$row['Order_DateTime']."</td><td>".$row['SUM(Order_ItemQuan)']."</td><td>
                <a href='adminOrderManage_Manage.php?uid=$row[User_ID]' title='Manage Order' style='color: darkred;'>Manage Order</a>
                </td></tr>";
                 $counter+=1;
                }
              if($counter==0){
                echo "<tr><td colspan='5' style='background-color: #f2f2f2;'>No order at the moment</td></tr>";
              }

            ?>
    </table>
      <?php
        if(isset($_GET['success'])){
          echo "<script>
            var e = document.getElementById('popUpMsg');
            e.style.display = 'flex';
          </script>";
        }
      ?>
	</div>
  <script type="text/javascript">
    setInterval(function(){
      var msg = document.getElementById('popUpMsg');
      msg.style.opacity = "0";
      msg.style.visibility = "hidden";
    }, 1000);

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