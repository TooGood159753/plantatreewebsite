
<?php
	session_start();
	
	
	echo "<h2>Your Current Receipt:</h2>";
	
	echo "<p>",$_SESSION["chosenstore"],"</p>";
	echo "<p>",$_SESSION["username"],"</p>";
	//echo "<p>",$_SESSION["userid"],"</p>";
	echo "<p>",$_SESSION["item1"],"</p>";
	echo "<p>",$_SESSION["item2"],"</p>";
	echo "<p>",$_SESSION["item3"],"</p>";
	echo "<p>",$_SESSION["item4"],"</p>";
	
?>
<html>
<form method="post" action="cartlogic.php">
			<label for="share">How Would You Rate Your Experence?                       </label>
			<input type="radio" name="rate" id="one" value="1" checked="public"/>Bad
			<input type="radio" name="rate" id="two" value="2"/>Meh
			<input type="radio" name="rate" id="three" value="3"/>Decent
			<input type="radio" name="rate" id="four" value="4"/>Good
			<input type="radio" name="rate" id="five" value="5"/>Amazing
        <p>	<input type="submit" value="Submit" /></p>
</form>

	<?php
		echo "<p>Or Click Here To Clear Your Cart:</p>";
		echo "<a href='emptycart.php'>Empty Cart</a>";
		
		echo "<p>",$_SESSION["messagealt"],"</p>";
	?>

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
