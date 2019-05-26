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
			echo "item added to cart";
		}
	
	
	else
	{
		$item_array = array(
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
		
		echo "item added to cart";
	}
}
?>

<head>
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
						
						?> <form method="post" action="item.php">
						<input type="text" name="quantity" value="1" />
						<input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>">
						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
						<input type="submit" name="add_to_cart" value="Add to Cart" />

					
</form>
<?php

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
						
					?>
					 <form method="post" action="item.php">
					<input type="text" name="quantity" value="1" />
					<input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>">
					<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
					<input type="submit" name="add_to_cart" value="Add to Cart" />
					
					
</form>
						<?php
					}
				}
			}
			
		}
	}
?>

<a href="cart.php" class="fixed">Cart</a><br>

<a href="profile.php" class="button">Account</a><br>



<a href='main.php'>Home</a>
<a href='store.php'>Store</a>
</body>
</html>