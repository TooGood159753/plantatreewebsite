<!DOCTYPE html>


<html>
	<?php
	session_start();
	$message = "";
	?>
	
<head>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body bgcolor="#E6E6FA">
<p><u>Create Account</u></p>

<!--Enter 'submitaccount.php' in action when its ready -->
<form action="submitaccount.php" method="post">
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
