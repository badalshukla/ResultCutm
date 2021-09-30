<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Cabin|Quicksand&display=swap" rel="stylesheet">
	<title>php test</title>
	<style>
		body
		{
			background-image: url('images/bg-01.jpg');
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			font-family: 'Cabin', sans-serif;
		}
		.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
  background: linear-gradient(to right, #2b5876, #4e4376);
}
		td
		{
			width:100px;
			height:50px;
			color:black;
		}
		.heading{
			font-size:100px;
		}
		.print{
			background: #EB3349; 
			background: -webkit-linear-gradient(to right, #F45C43, #EB3349);  
			background: linear-gradient(to right, #F45C43, #EB3349);
			width:200px;
			height:43px;
			border:block;
			border-width:2px;
			border-color:black;
		}
		.print:hover{
			background: #3CA55C;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #B5AC49, #3CA55C);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #B5AC49, #3CA55C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		}
		.label
		{
			font-size:34px;
		}
		.input
		{
			width:400px;
			height:43px;
			text-align:center;
			border:line;
			border-width:2px;
		}
		.sub{
			background: #3CA55C;  /* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #B5AC49, #3CA55C);  /* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #B5AC49, #3CA55C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			width:250px;
			height:53px;
			border:block;
			border-width:2px;
			border-color:black;
			color:white;
			font-size:16px;
		}
		.sub:hover{
			background: #e43a15;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #e65245, #e43a15);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #e65245, #e43a15); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
		table
		{
			width:500px;
		}
	</style>
	
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
	
	<center>
		<img src="pic.png" style="border:block;border-radius:60%;width:200px;height:200px;border-width:2px;border-color:black;">
		<h3>Centurion University!</h3>
		<h1 class="heading">Results!</h1>
		<br>
		<button class="btn btn-success btn-lg" onclick="window.location = './logout.php'">logout</button>
		<br>
	
	<?php
	//session_start();
    include 'config.php';
	$sqlcommand="SELECT  `NAME OF THE STUDENT`,`SUB.CODE`, `SUBJECT NAME`, `Grade` FROM `sheet1` WHERE `REGD. NO`={$_COOKIE["username"]};";
    $res=mysqli_query($db,$sqlcommand);
    $dataPoints=array();
    $simple_array=array();
    if(isset($_COOKIE["username"]))
    {
    	echo "<table class='table table-inverse table-hover table-bordered ' style='width:75%;'>";
    	echo "<tr style='background: linear-gradient(to right, #c21500, #ffc500);color:white;'><th>NAME OF THE STUDENT</th><th>SUB.CODE</th><th>SUBJECT NAME</th><th id=>Grade</th></tr>\n";
   	 	while($row=mysqli_fetch_assoc($res))
   	 	{
    	echo "<tr><td id='name'>{$row['NAME OF THE STUDENT']}</td><td id='subcode'>{$row['SUB.CODE']}</td><td id='subject'>{$row['SUBJECT NAME']}</td><td id='grade'>{$row['Grade']}</td></tr>\n";
    	if($row['Grade']=='O'||$row['Grade']=='10')
    	{
    		$row['Grade']="10";
    	}
    	elseif ($row['Grade']=='E'||$row['Grade']=='9') {
    		# code...
    		$row['Grade']="9";
    	}
    	elseif ($row['Grade']=='A'||$row['Grade']=='8') {
    		# code...
    		$row['Grade']="8";
    	}
    	elseif ($row['Grade']=='B'||$row['Grade']=='7') {
    		# code...
    		$row['Grade']="7";
    	}
    	elseif ($row['Grade']=='C'||$row['Grade']=='6') {
    		# code...
    		$row['Grade']="6";
    	}
    	elseif ($row['Grade']=='D'||$row['Grade']=='5') {
    		# code...
    		$row['Grade']="5";
    	}
    	elseif ($row['Grade']=='F'||$row['Grade']=='0') {
    		# code...
    		$row['Grade']="0";
    	}


    	array_push($dataPoints,array('y' =>$row['Grade'],"label"=>$row['SUBJECT NAME']));
    	array_push($simple_array,$row['Grade']);
    	}
    	$average = array_sum($simple_array)/count($simple_array);
    	echo "<marquee><tr><td colspan='4'style='text-align:center;font-size:36px;'><b>Average Grade : </b><span style='color:red;'>".number_format((float)$average, 2, '.', '')."</span></td></tr></marquee>";
    	echo "</table>";
    	
    	
    
    }
    
	?>
	<!-- testing code-->
	<script>
		window.onload = function () {
 
	var chart = new CanvasJS.Chart("chartContainer", {
		title: {
			text: "MARKS"
		},
		axisY: {
			title: "Grade/Points Secured"
		},
		data: [{
			type: "line",
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}] 
	});
	chart.render();
	 
	}
	</script>
	<div id="chartContainer" style="height: 350px; width: 60%;"></div>
	<!-- testing code-->
	<form><input type=button name=print value='Print your result' onClick='window.print()'class='print'></form>
	<p>
		<b>NOTE:</b>If Any of the Grades Shown Here Is <b>"F"</b> you need to prepare for <b>EOD</b>
		<br>
		And If you Are Getting <b>"W"</b> you Need to clear your dues From account section As your Result is in pending Section.
	</p>
	<div class="footer">
 	 <p style="color:white;"><b>Made With ❤️ By Ashish !</b></p>
	</div> 
	</center>
	
</body>
</html>