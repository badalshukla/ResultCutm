<?php
echo "ashish this site is working";
?>
<?php
	session_start();
    include 'config.php';
	$sqlcommand="SELECT  `NAME OF THE STUDENT`,`SUB.CODE`, `SUBJECT NAME`, `Grade` FROM `sheet1` WHERE `REGD. NO`={$_SESSION['reg']};";
    $res=mysqli_query($db,$sqlcommand);
    $dataPoints=array();
    $simple_array=array();
    if(isset($_SESSION['reg']))
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
    	
    	echo $_SESSION['reg'];
    
    }
    ?>
    <?php
echo "ashish this site is working";
?>