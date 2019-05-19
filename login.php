<?php
	//session_start();

	$host = "cmslamp14.aut.ac.nz";
	$user = "kyg8185";
	$pswd = "catface1one1";
	$dbnm = "kyg8185";
	
	$username = $_POST["uname"];
	$password = $_POST["pword"];
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	//Write query get user database to begin check/
	$query = "SELECT * FROM user;";
	
	if(!$conn)
	{
			echo "<p>Error Connecting to The User Database, Follow The Link Below To Return To The Login Page</p>";
			echo "<a href = 'index.php'>Login</a>";
	}
	else
	{
	

	$result = mysqli_query($conn, $query);

	if(!result)
		{
			//auto redirects back to login page (index.php) update text for fail condition
			header("location:index.php");
		}
	else
		{
			//check username and password against results
			if()
			{
			//fail conditions goes here and auto redirects back to login page (index.php) update text for fail condition
			header("location:index.php");
			}
			else
			{
			//redirect to main page (main.php)
			header("location:main.php");
			}
		}
	}

?>