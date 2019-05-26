<!DOCTYPE html>
<html>

<?php
	session_start();
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
<a href = "main.php">Main</a>
<a href = "index.php">Logout</a>
<p>Profile</p>

<?php
	echo "<h1>Hello, ",$_SESSION["username"],"</h1>";
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	$query = "SELECT * FROM purchase WHERE username ='$_SESSION[username]'";
	
	if(!$conn)
	{
		echo "<p>Could Not Retrieve Database</p>";
		
	}
	else
	{
	
	
	$result = mysqli_query($conn, $query);

	if(!$result)
		{
			echo "Could Not Retrieve Information";
		}
	else
		{
			if(mysqli_num_rows($result) > 0)
			{
				 echo "<table>";
				echo "<tr>";
                echo "<th>Date</th>";
                echo "<th>Username</th>";
                echo "<th>Price</th>";
                echo "<th>Address</th>";
				echo "<th>Payment</th>";
				echo "</tr>";
				while($row = mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>" . $row['date'] . "</td>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['price'] . "</td>";
					echo "<td>" . $row['address'] . "</td>";
					echo "<td>" . $row['payment'] . "</td>";
					echo "</tr>";
				}
				
			}
			else
			{
				echo "<p>No Purchases As Of Yet</p>";
			}
		}
	}
	
?>

</body>
</html>
