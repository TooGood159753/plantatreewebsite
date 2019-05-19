<!DOCTYPE html>
<?php
 session_start(); 
 $loginuname = ;
 $message = ;
 
?>

<html>
<body>
<p>login</p>
<a href = "main.php">Main</a>
<a href = "createaccount.html">Create Account</a>

<!-- add 'login.php' to action when its ready to do the check -->
<form method="post" action="">
		<p>	<label for="uname">Enter User Name: </label>
			<input type="text" name="uname" id="uname" /></p>
		<p>	<label for="pword">Enter Password: </label>
			<input type="text" name="pword" id="pword" /></p>
        <p>	<input type="submit" value="Submit" /></p>
</form>

	
</body>
</html>
