<html>
<?php
	$buycodetree = $_POST["buyingtree"];
	$buycodegarden = $_POST["buyinggarden"];
	
	echo "<p>",$buycodetree,"</p>";
	echo "<p>",$buycodegarden,"</p>";
	
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
				while($row = mysqli_fetch_assoc($resulttrees)) 
				{
					if($buycodetree === $row["treename"])
					{
						echo "<img src='",$row["treeimglnk"],"' alt='",$row["treename"],"' height='300' width='300'>";
						echo "<h2>",$row["treename"],"</h2>";
						echo "<p>",$row["treedesc"],"</p>";
						
						echo "<a href='main.php'>Home</a>";
						echo "<p>-------</p>";
						echo "<a href='store.php'>Store</a>";
					}
				}
				
			}
			if(mysqli_num_rows($resultgarden) > 0)
			{
				while($row = mysqli_fetch_assoc($resultgarden)) 
				{
					if($buycodegarden === $row["productname"])
					{
						echo "<img src='",$row["prodimglnk"],"' alt='",$row["productname"],"' height='300' width='300'>";
						echo "<h2>",$row["productname"],"</h2>";
						echo "<p>",$row["productdesc"],"</p>";
						
						echo "<a href='main.php'>Home</a>";
						echo "<p>-------</p>";
						echo "<a href='store.php'>Store</a>";
					}
				}
			}
			echo "<a href='addtocart.php'>Add To Cart</a>";
		}
	}
?>
<body bgcolor="#E6E6FA">
</body>
</html>