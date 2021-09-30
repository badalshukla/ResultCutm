<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<center><h1>Login</h1>
	<?php
	session_start();
	echo "<b>login as </b> ";
	echo "<b>".$_SESSION["reg"]."</b>";
	if(isset($_POST['c']))
	{
		session_unset();
		session_destroy();
		header("location: index.php");
	}
	?>
	<form method="POST" action="welcome.php">
		<input type="submit" name="c" value="logout">
	</form>
</center>
</body>
</html>