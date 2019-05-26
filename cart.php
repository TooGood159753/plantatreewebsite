
<?php
	session_start();
	
	
	echo "<h2>Your Current Order:</h2>";

	
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#E6E6FA">

<a href="profile.php" class="button">Account</a><br>


<a href='main.php'>Home</a>
<a href='store.php'>Store</a>
<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>


<?php echo $total ?>
<form method="post" action="cart.php">
			<First name:<br>
			<input type="text" name="firstname">
			<br>
			Last name:<br>
			<input type="text" name="lastname">
			Address:<br>
			<input type="text" name="address">
			<input type = "hidden" name="price" value="<?php $total" ?> ">
        <p>	<input type="submit" value="Submit" /></p>
</form>

	<?php
		echo "<p>Or Click Here To Clear Your Cart:</p>";
		echo "<a href='emptycart.php'>Empty Cart</a>";
		
		echo "<p>",$_SESSION["messagealt"],"</p>";
	?>
</body>
</html>	
	<!--
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	
	if(!$conn)
	{
		echo "<p>Error Connecting To The Order Database.</p>"; //Error cnnecting to DB
	}
	else
	{
	$query = "INSERT INTO purchases(storename,username,userid,item1,item2,item3,item4) VALUES ('",$_SESSION["chosenstore"],"','",$_SESSION["username"],"','",$_SESSION["userid"],"','",$_SESSION["item1"],"','",$_SESSION["item2"],"','",$_SESSION["item3"],"','",$_SESSION["item4"],"')";
	
	$result = mysqli_query($conn, $query);

	if(!$result)
		{
			echo "<p>Failed To Place Your Order, Please Try Again Later</p>"; //Failed To Input Order
		}
	else
		{
			echo "<p>Your Order Had Been Placed, Go To Your Account Page To See Your Order History</p>"; //Order Made/Added To Database
		}
	}
	-->
