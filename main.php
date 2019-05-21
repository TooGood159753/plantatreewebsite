<!DOCTYPE html>
<html>

<?php
	session_start();
?>

<body>
	<p>index</p>
  <a href = "shiplocation.php">Ship Location</a>
  <a href = "profile.php">Profile</a>
  <a href = "index.php">Logout</a>
  
  <?php
  echo "<p>PHP is working</p>";
  echo "<p>"+$_SESSION["username"]+"</p>";
  echo "<p>"+$_SESSION["password"]+"</p>";
  ?>
</body>
</html>
