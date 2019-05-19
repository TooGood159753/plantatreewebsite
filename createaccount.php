<!DOCTYPE html>

<?php

	session_start();
	$message = ;

?>
<html>
<body>
<p>create account</p>

<!--Enter 'submitaccount.php' in action when its ready -->
<form method="post" action="">
		<p>	<label for="uname">Enter a User Name: </label>
			<input type="text" name="uname" id="uname" /></p>
		<p>	<label for="pword">Enter a Password: </label>
			<input type="text" name="pword" id="pword" /></p>
		<p> <label for="email">Enter an Email</label>
			<input type="text" name="email" id="email" /></p>
        <p>	<input type="submit" value="Submit" /></p>
</form>
<a href = "index.php">Login</a>
</body>
</html>
