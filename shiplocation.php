<!DOCTYPE html>
<html>

<?php
	session_start();
	
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

<body>
<p>select shipping location</p>
<a href = "store.php">Store</a>
<a href = "main.php">Main</a>

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
