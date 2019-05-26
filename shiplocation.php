<!DOCTYPE html>
<html>

<?php
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	$username = $_POST["uname"];
	$password = $_POST["pword"];
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
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


<a href = "main.php">Home Page</a>

<?php
	$query = "SELECT * FROM stores";
	
	if(!$conn)
	{
		
		echo "<p>Failed To Retrieve List Of Stores</p>";
		
	}
	else
	{
	
	$result = mysqli_query($conn, $query);

	if(!$result)
		{
			echo "<p>Ne Results</p>";
		}
	else
		{
			if(mysqli_num_rows($result) > 0)
			{
				echo "<h2>Stores</h2>";
				echo "<table border='1'>";
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo "<tr><td>",$row["storename"],"</td><td>",$row["storelocation"],"</td><td><form action='store.php' method='post'><input type='hidden' value='",$row["storename"],"', name='storepass' ><button>Choose Store</button></form></td></tr>";
				}
				echo "</table>";
			}
		}
	}
?>

</body>
</html>
