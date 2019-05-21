<!DOCTYPE html>
<html>

<?php
	session_start();
?>

<body>
<a href = "main.php">Main</a>
<a href = "index.php">Logout</a>
<p>Profile</p>

<?php
	echo $_SESSION["username"];
?>

</body>
</html>
