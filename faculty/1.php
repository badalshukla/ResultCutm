<?php
                        ob_start();
                        session_start();

					   include("config.php");
					   
					   
					   
					   if($_SERVER["REQUEST_METHOD"] == "POST") {
					      // username and password sent from form 
					      
					      $myusername = mysqli_real_escape_string($db,$_POST['text']);
					      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
					      
					      
					      $sql="SELECT `name`,`username` FROM `teacher` WHERE `username`='$myusername' AND `pwd`='$mypassword'";
					      $result = mysqli_query($db,$sql);
					      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					      
					      $count = mysqli_num_rows($result);
					      
					      // If result matched $myusername and $mypassword, table row must be 1 row
							
					      if($count >= 1) {
					      	//$_SESSION["log"] = "success";
					      	setcookie("log","success", time() + (60), "/");
					        header("location: 2.php");
					      }else {
					         //$error = "Your Login Name or Password is invalid";
					         //echo "<br>";
					         //echo "<center><p style='color:red;font-size:36px;'><b>".$error."</p></b>";
					         //echo "<a href='./index.html'>GO BACK</a></center>";
					         header("Location: ./index.php?sign=err");
					         exit();
					      }
					   }
					?>