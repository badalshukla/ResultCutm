<!DOCTYPE html>
<html>
<head>
	<title>Forget Password! </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
    <center>
<div class="container">
<h1 class="text-center">Forget Password !</h1>
<hr>
	<div class="row">
	<div class="col-md-9 col-md-offset-2">
		<?php
			if(isset($_POST['sendopt'])) 
            {
				$sotp = rand(10000, 99999);
                $url='localhost';
                $username='id5751893_kali';
                $password='123456789';
                $conn=mysqli_connect($url,$username,$password,"tester");
                $regno=mysqli_real_escape_string($conn,$_POST['reg']);
                $email="{$regno}@cutm.ac.in";
                $header="From: otpverify@techrain.ml";
                $subject="[Important!] Otp Verification !";
				$message = "Dear Student !,\n" . $regno. " \n This is your OTP: " . $sotp."\n Thank you!";
				if(mail($email,$subject,$message,$header))
				{
				    echo "OTP successfully send..";
                    echo "<br><h3>Please Check your inbox .If not found Please check Your <b>Spam box</b>.</h3>";
				}
			}

			if(isset($_POST['verifyotp'])) { 
				$otp = $_POST['otp'];
				if($otp== $otp) {
					echo "Congratulation, You are verified !";
					echo " this the otp {$otp}";
				} 
				else {
				    echo "Please enter correct otp.";
					echo " this the otp {$otp}";
				}
			}
		?>
	</div>
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Email/Username</label>
                    <input type="text" class="form-control" id="reg" name="reg" value=""  placeholder=" Enter email/Username" required  style="text-align:center;">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendopt" class="btn btn-lg btn-success btn-block">Send OTP</button>
                </div>
            </div>
            </form>
            <form method="POST" action="">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" maxlength="5" required style="text-align:center;">
                </div>
            </div>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="verifyotp" class="btn btn-lg btn-info btn-block">Verify Your Otp!</button>
                </div>
            </div>
        </form>
	</div>
</div>
</center>
</body>
</html>