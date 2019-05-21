<?php
	session_start();
	
	$rating = $_POST["rate"];
	
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
		$_SESSION["message"] = "Error Connecting To The Order Database."; //Error cnnecting to DB
	}
	else
	{
	$query = "INSERT INTO purchases(storename,username,userid,item1,item2,item3,item4) VALUES ('",$_SESSION["chosenstore"],"','",$_SESSION["username"],"','",$_SESSION["userid"],"','",$_SESSION["item1"],"','",$_SESSION["item2"],"','",$_SESSION["item3"],"','",$_SESSION["item4"],"')";
	
	$result = mysqli_query($conn, $query);

	if(!$result)
		{
			$_SESSION["message"]"Failed To Place Your Order, Please Try Again Later"; //Failed To Input Order
		}
	else
		{
			$_SESSION["message"] = "Your Order Had Been Placed, Go To Your Account Page To See Your Order History"; //Order Made/Added To Database
			$_SESSION["movementstore"] = "<a href='store.php'>Click Here To Return To The Store</a>";
			$_SESSION["movementhome"] = "<a href='main.php'>Click Here To Return To The Main Page</a>";
		}
	}
?>