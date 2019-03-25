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
    require 'php/adminStaffViewQuery.php';
  ?>
	<div id="header">
		<div id="flexLeft"><a href="html/adminHome.html"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Staff - View</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	<div id="includedContent"></div>
	<h1 id="content_header">Staff - View</h1>

  <div id="content_container" class="container_below" style="margin-top: -140px;">
    <table id="tableClothing">
      <th>Staff ID</th>
      <th>Staff Name</th>
      <th>Staff Email</th>
      <th>Staff Role</th>
      <th>Created DateTime</th>
      <th>Action</th>
      <?php 
                $counter=0;
                while($row = mysqli_fetch_assoc($result1)){
                (($row['Staff_Role'])? $srole="Admin":$srole="Staff");
                (($row['Staff_Role'])? $srole1="Staff":$srole1="Admin");
                (($row['Staff_Role'])? $srole2="0":$srole2="1");
                echo "<tr><td>".$row['Staff_ID']."</td><td>".$row['Staff_Name']."</td><td>".$row['Staff_Email']."</td><td>".$srole."</td><td>".date("Y-m-d h:iA", strtotime($row['Staff_Created']))."</td><td>
                <a onclick='return confirm(".'"Are you sure you want to change the role of '.$row['Staff_Name'].' to '.$srole1.'?"'.")' href='adminStaffView.php?cid=$row[Staff_ID]&crole=$srole2' title='Change Role'><img class='icon' src='./Asset/Image/switch.svg'></a>
                <a onclick='return confirm(".'"Are you sure you want to delete '.$row['Staff_Name'].' from staff list?"'.")' href='adminStaffView.php?sid=$row[Staff_ID]' title='Delete'><img class='icon' src='./Asset/Image/delete.svg'></a>
                </td></tr>";
                 $counter+=1;
                }
              if($counter==0){
                echo "<tr><td colspan='6' style='background-color: #f2f2f2;'>No item found</td></tr>";
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
  
  <?php include_once 'headers/adminHeaders.html';  include 'verficationAdminRole.php';?>

</body>
</html>