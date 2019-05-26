
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


<form method="post" action="orderconfirmation.php">
			<br><br><br> Name:<br>
			<input type="text" name="name" required>
		
			<br>Address:<br>
			<input type="text" name="address" required>
			<br>Payment Method<br>
			<input type="text" name="payment" required>
			<br>
			<input type = "hidden" name="price" value="<?php echo $total; ?>">
        <p>	<input type="submit" value="Submit" /></p>
</form>


	<?php
		
		
		echo "<p>",$_SESSION["messagealt"],"</p>";
	?>
</body>
</html>	