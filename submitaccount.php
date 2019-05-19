<?php
	session_start();

	$host = "cmslamp14.aut.ac.nz";
	$user = "kyg8185";
	$pswd = "catface1one1";
	$dbnm = "kyg8185";
	
	$uname = $_POST["uname"];
	$pword = $_POST["pword"];
	$email = $_POST["email"];
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	//Write query to insert into user database/
	$query = "INSERT INTO users(username, password, email) VALUES ('$uname','$pword','$email');";
	
	if(!$conn)
	{
			//redirect back to createaccount.php update text to error alert
			$_SESSION["message"] = "User Database Connection Failure.";
			header("location:createaccount.php");
	}
	else
	{
	

	$result = mysqli_query($conn, $query);

	if(!result)
		{
			//redirect back to createaccount.php update text with error alert
			$_SESSION{"message"] = "Account Creation Was A Failure Due To Unknown Reasons";
			header("location:createaccount.php");
		}
	else
		{
			//redirect to index.php update text with confirmation alert
			$_SESSION{"message"] = "Account Creation Was Successful";
			header("location:index.php");
		}
	}

?>