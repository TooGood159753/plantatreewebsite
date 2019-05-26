<!DOCTYPE html>
<html>

<?php
	session_start();
?>

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
				echo "<h2>Purchases</h2>";
				echo "<table border='1'>";
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo "<tr><td>",$row[storename]"</td></tr>";
				}
				echo "</table>";
				
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
