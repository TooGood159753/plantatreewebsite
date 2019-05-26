<!DOCTYPE html>


<html>

<?php
	session_start();
	if (!isset ($_SESSION["message"])) 
	{ 
		$_SESSION["message"] = "  ";
	}

?>
<head>

</head>
<body bgcolor="#E6E6FA">
<a href = "createaccount.php">Create Account</a>
<h2><u>Login</u></h2>

<!-- add 'login.php' to action when its ready to do the check -->
<form method="post" action="login.php">
		<p>	<label for="uname">Enter User Name: </label><br><br>
			<input type="text" placeholder="Enter Username" name="uname" id="uname" /></p>
		<p>	<label for="pword">Enter Password: </label><br><br>
			<input type="password" placeholder="Enter Password" name="pword" id="pword" /></p>
		<div>
        <p>	<input type="submit" value="Submit" /></p>
		</div>
</form>

Default Username: tester
Default Password: 123

	
</body>
</html>
