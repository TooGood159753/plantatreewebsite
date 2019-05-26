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
  echo "<p>Welcome, ";
  echo "",$_SESSION["username"],"</p>";
  echo "<p>Choose a Shopping Location to begin </p>";
  ?>
  
  <a href = "shiplocation.php">Shop Location</a>
</body>
</html>
