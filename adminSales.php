<!DOCTYPE html>
<html>
<head>
	<title>Sales Report | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="icon" href="Asset/Image/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	
</head>
<body>
	<?php 
		require 'php/adminHomeQuery.php'; 
		if (isset($_GET['graphType'])) {
			$_SESSION['graphType'] = $_GET['graphType'];
			// echo "<script>alert('asd');</script>";
		} else {
			$_SESSION['graphType'] = "bar";
		}
	?>


	<div id="header">
		<div id="flexLeft"><a href="adminHome.php"><img src="Asset/Image/logo.jpg" width="auto" height="50"></a></div>
		<div id="flexMiddle"><span>Sales Report</span></div>
		<div id="flexRight">
			<img src="Asset/Image/noti.svg" width="30" height="auto">
			<img src="Asset/Image/chat.svg" style="display: none;" width="30" height="auto">
			<img src="Asset/Image/profile.svg" width="30" height="auto">
		</div>
	</div>
	
	<?php
		if (isset($_GET['graphType'])) {
			echo '<input type="text" name="graphType" value="'.$_GET['graphType'].'" id="graphType" style="display: none;">';
		} else {
			echo '<input type="text" name="graphType" value="bar" id="graphType" style="display: none;">';
		}
		if (isset($_GET['duration'])) {
			echo '<input type="text" name="duration" value="'.$_GET['duration'].'" id="duration" style="display: none;">';
		} else {
			echo '<input type="text" name="duration" value="this month" id="duration" style="display: none;">';
		}
	?>

  	<div id="content_container" class="container_below" style="margin-top: -160px;">
	  	<div id="durationDiv" style="margin-left: 10px; margin-top: 10px;">
			<span style="width: 100px; display: inline-block;">Period</span>
			<select id="durationSelect" style="width: 120px;">
				<?php $sort = $_GET['duration']; ?>
				<option value="bar" <?php if ($sort=="this month") echo 'selected' ?>>This Month</option>
				<option value="line" <?php if ($sort=="last month") echo 'selected' ?>>Last Month</option>
				<option value="pie" <?php if ($sort=="this year") echo 'selected' ?>>This Year</option>
			</select>
		</div>
	  	<div id="graphTypeDiv" style="margin-top: 10px;margin-left: 10px; margin-bottom: 10px;">
			<span style="width: 100px; display: inline-block;">Graph Type</span>
			<select id="graphTypeSelect" style="width: 120px;">
				<?php $gtype = $_GET['graphType']; ?>
				<option value="bar" <?php if ($gtype=="bar") echo 'selected' ?>>Bar</option>
				<option value="line" <?php if ($gtype=="line") echo 'selected' ?>>Line</option>
				<option value="pie" <?php if ($gtype=="pie") echo 'selected' ?>>Pie</option>
			</select>
			<br><br><a id='link' download='salesReport.png' style="color: white; background-color: #515151; padding: 10px 15px; cursor: pointer;">Save as Image</a>

		</div>
  		<div id="chart-container" style="width: 97%; background-color: white;">
			<canvas id="mycanvas" style="background-color: white;"></canvas>
			<script type="text/javascript" src="jquery.min.js"></script>
		    <script type="text/javascript" src="Chart.min.js"></script>
		    <script type="text/javascript" src="app.js"></script>
		    <script type="text/javascript" src="FileSaver.min.js"></script>
		    <!-- <script type="text/javascript" src="canvas-toBlob.js"></script> -->
		</div>
	</div>

	<script type="text/javascript">
		// var url_base64 = document.getElementById('mycanvas').toDataURL('image/png');
		// var link = document.getElementById('link');
		// link.href = url_base64;

		$("#link").click(function() {
 	    $("#mycanvas").get(0).toBlob(function(blob) {
    		saveAs(blob, "Sales Report.jpg");
			});
		});

		var gtype = "default";
		var durate = "default";
		$('#graphTypeSelect').on('change', function() {
        	gtype = $("#graphTypeSelect option:selected").text().toLowerCase();
        	var new_url = document.URL.substring(0, document.URL.indexOf('?'));
        	var duration = $('#duration').val();
        	if (duration == "undefined") {
        		duration = durate;
        	}
        	$(location).attr('href', new_url + '?graphType=' + gtype + '&duration=' + duration);
        	counter++;
        });

		$('#durationSelect').on('change', function() {
        	var duration = $("#durationSelect option:selected").text().toLowerCase();
        	var new_url = document.URL.substring(0, document.URL.indexOf('?'));
        	var graphType = $('#graphType').val();
        	if (graphType == "undefined") {
        		graphType = gtype;
        	}
        	$(location).attr('href', new_url + '?graphType=' + graphType + '&duration=' + duration);
        	counter++;
        });
	</script>

	<?php include_once 'headers/adminHeaders.php';  include 'verficationAdminRole.php';?>
	

</body>
</html>