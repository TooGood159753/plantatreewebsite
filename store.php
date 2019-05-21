    
<!DOCTYPE html>
<html>

<?php
	session_start();
	
	$_SESSION["item1"] = "";
	$_SESSION["item2"] = "";
	$_SESSION["item3"] = "";
	$_SESSION["item4"] = "";
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
?>
<head>
  <title>Tree store</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<h1>Plant a Tree </h1>
 
<a href="cart.php" class="fixed">Cart</a><br>



<a href="profile.php" class="button">Account</a><br>

<?php
	$querytree = "SELECT * FROM trees";
	$querygarden = "SELECT * FROM gardening";
	
	if(!$conn)
	{
		echo "<p>Could Not Retrieve Store Database</p>";
		exit;
	}
	else
	{
	
	$resulttrees = mysqli_query($conn, $querytree);
	$resultgarden = mysqli_query($conn, $querygarden);

	if(!$resulttrees || !$resultgarden)
		{
			echo "Could Not Retrieve Store Information";
		}
	else
		{
			if(mysqli_num_rows($resulttrees) > 0)
			{
				echo "<h2>Trees</h2>";
				echo "<table border='1'>";
				while($row = mysqli_fetch_assoc($resulttrees)) 
				{
					echo "<tr><td>",$row["treename"],"</td><td>",$row["treetype"],"</td><td>",$row["treedesc"],"</td><td><a href='item.php'>Buy</a></td></tr>";
				}
				echo "</table>";
				
			}
			if(mysqli_num_rows($resultgarden) > 0)
			{
				echo "<h2>Gardening Supplies</h2>";
				echo "<table border='1'>";
				while($row = mysqli_fetch_assoc($resultgarden)) 
				{
					echo "<tr><td>",$row["productname"],"</td><td>",$row["productdesc"],"</td><td><form action='item.php' method='post'><input type='submit' value='",$row["productname"],", id='buying''></form></td></tr>";
				}
				echo "</table>";
			}
		}
	}
?>

</body>
</html>
