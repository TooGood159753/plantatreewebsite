    
<!DOCTYPE html>
<html>

<?php
	session_start();
	if(isset($_SESSION["chosenstore"])){
		echo "Is set";
	}else{

	$_SESSION["chosenstore"] = $_POST["storepass"];
	}
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
<body bgcolor="#E6E6FA">

<h1>Plant a Tree </h1>
<h3>Chosen Store: <?php echo $_SESSION["chosenstore"]; ?></h3>
 
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
					echo "<tr><td>",$row["treename"],"</td><td>",$row["treetype"],"</td><td>",$row["treedesc"],"</td><td><form action='item.php' method='post'><input type='hidden' value='",$row["treename"],"', name='buyingtree' ><button>Buy</button></form></td></tr>";
				}
				echo "</table>";
				
			}
			if(mysqli_num_rows($resultgarden) > 0)
			{
				echo "<h2>Gardening Supplies</h2>";
				echo "<table border='1'>";
				while($row = mysqli_fetch_assoc($resultgarden)) 
				{
					echo "<tr><td>",$row["productname"],"</td><td>",$row["productdesc"],"</td><td><form action='item.php' method='post'><input type='hidden' value='",$row["productname"],"', name='buyinggarden' ><button>Buy</button></form></td></tr>";
				}
				echo "</table>";
			}
		}
	}
?>

</body>
</html>
