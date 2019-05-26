<!DOCTYPE html>
<html>

<?php
	session_start();
?>

<body bgcolor="#E6E6FA">


  <a href = "profile.php">Profile</a>
  <a href = "logout.php">Logout</a>
  
  <h2>Welcome to Plant a Tree</h2>
  <?php
  echo "<p>PHP is working</p>";
  echo "<p> Welcome, ",$_SESSION["username"],"</p>";
  echo "<p>Choose a Store to begin shopping</p>";
  <a href = "shiplocation.php">Store Locations</a>
  ?>
</body>
</html>
