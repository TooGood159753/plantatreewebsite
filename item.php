<html>
<?php
	session_start();
	
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
			print_r($_SESSION["shopping_cart"]);
		}
	
	
	else
	{
		$item_array = array(
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
		print_r($_SESSION["shopping_cart"]);
		echo "item added to cart";
	}
}
?>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#E6E6FA">
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
					if($buycodetree === $row["name"])
					{
						echo "<img src='",$row["treeimglnk"],"' alt='",$row["name"],"' height='300' width='300'>";
						echo "<h2>",$row["name"],"</h2>";
						echo "<h3>$",$row["price"],"</h3>";
						echo "<p>",$row["treedesc"],"</p>";
						
						

					}
				}
				
			}
			if(mysqli_num_rows($resultgarden) > 0)
			{
				while($row = mysqli_fetch_assoc($resultgarden)) 
				{
					if($buycodegarden === $row["name"])
					{
						echo "<img src='",$row["prodimglnk"],"' alt='",$row["name"],"' height='300' width='300'>";
						echo "<h2>",$row["name"],"</h2>";
						echo "<h3>$",$row["price"],"</h3>";
						echo "<p>",$row["productdesc"],"</p>";
						
					
						
						
					}
				}
			}
			
		}
	}
?>

<a href="cart.php" class="fixed">Cart</a><br>


<?php  echo $host;?>
<a href="profile.php" class="button">Account</a><br>
<form method="post" action="item.php">
<input type="text" name="quantity" value="1" />
<input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>">
<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
<input type="submit" name="add_to_cart" value="Add to Cart" />

					
</form>

<?php ?>
<a href='main.php'>Home</a>
<a href='store.php'>Store</a>
</body>
</html>