<!DOCTYPE html>
<html>
<head>
	<title>Add Staff | Admin</title>
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
    require 'php/adminStockView_ViewQuery.php';
  ?>
	<div id="header">
		<div id="flexLeft"><a href="html/adminHome.html"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Stock - View</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">Stock - View</h1>

  <div id="content_container" class="container_below" style="margin-top: -135px;">
    <table id="tableClothing">
      <th>Clothing Name</th>
      <th>Size</th>
      <th>Quantity</th>
      <?php 

        $counter=0;
        while($row = mysqli_fetch_assoc($result1)){
          if ($counter==0){
            echo "<tr><td rowspan=".$num_rows.">".$row['Item_Name']."</td>";
          }
          echo "<td>".$row['ssize']."</td><td>".$row['Stock_Quan']."</td></tr>";
          $counter+=1;
        }
        // 
        // while($row = mysqli_fetch_assoc($result2)){
        //   (($row['Item_Status'])? $sStatus="Available":$sStatus="Unavailable");
        //   echo "<tr><td>".$row['Item_Name']."</td><td>".$row['Item_Cat']."</td><td>".$row['Item_Size']."</td><td>".$sStatus."</td><td colspan='2'>No stock added</td>";
        //   $counter+=1;
        // }
        if($counter==0){
          echo "<tr><td colspan='3' style='background-color: #f2f2f2;'>No item found</td></tr>";
        }

      ?>
    </table>
          
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
  <?php include_once 'html/adminHeaders.html';  include 'verficationAdminRole.php';?>

</body>
</html>