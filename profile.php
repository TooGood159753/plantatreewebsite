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
