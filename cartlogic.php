<?php
	session_start();
	
	$rating = $_POST["rate"];
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$user = "b74160f7bd6416";
	$pswd = "3ce40478";
	$dbnm = "heroku_26350cbea1b7381";
	
	if(isset($_SESSION["messagealt"]))
	{
		$_SESSION["messagealt"] = "  ";
	}
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	
	if(!$conn)
	{
		$_SESSION["messagealt"] = "Error Connecting To The Order Database."; //Error cnnecting to DB
		header('location:cart.php');
		exit;
	}
	else
	{
		
		
		$query = "INSERT INTO purchase(storename,username,userid,item1,item2,item3,item4,rating) VALUES ('$_SESSION[chosenstore]','$_SESSION[username]','$_SESSION[userid]','$_SESSION[item1]','$_SESSION[item2]','$_SESSION[item3]','$_SESSION[item4]','$_SESSION[rate]')";
		//$query = "INSERT INTO purchase(storename,username,userid,item1,item2,item3,item4,rating) VALUES('test1','test1','1','q1','w1','e1','r1','3')";
		
		$result = mysqli_query($conn, $query);
		
		
		if(!$result)
		{
			$_SESSION["messagealt"]"Failed To Place Your Order, Please Try Again Later"; //Failed To Input Order
			header('location:cart.php');
			exit;
		}
		else
		{
			$_SESSION["messagealt"] = "Your Order Had Been Placed, Go To Your Account Page To See Your Order History"; //Order Made/Added To Database
			header('location:cart.php');
			exit;
		}
		
		
	}
?>