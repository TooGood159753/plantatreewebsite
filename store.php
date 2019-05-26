    
<!DOCTYPE html>
<html>

<?php
	session_start();
	if(isset($_SESSION["chosenstore"])){
		
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
					echo "<tr><td>",$row["name"],"</td><td>",$row["treetype"],"</td><td>",$row["treedesc"],"</td><td><form action='item.php' method='post'><input type='hidden' value='",$row["name"],"', name='buyingtree' ><button>Buy</button></form></td></tr>";
				}
				echo "</table>";
				
			}
			if(mysqli_num_rows($resultgarden) > 0)
			{
				echo "<h2>Gardening Supplies</h2>";
				echo "<table border='1'>";
				while($row = mysqli_fetch_assoc($resultgarden)) 
				{
					echo "<tr><td>",$row["name"],"</td><td>",$row["productdesc"],"</td><td><form action='item.php' method='post'><input type='hidden' value='",$row["name"],"', name='buyinggarden' ><button>Buy</button></form></td></tr>";
				}
				echo "</table>";
			}
		}
	}
?>
<a href = "main.php">Home Page</a>
</body>
</html>
