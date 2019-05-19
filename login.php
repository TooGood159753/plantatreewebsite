<?php
	$host = "cmslamp14.aut.ac.nz";
	$user = "kyg8185";
	$pswd = "catface1one1";
	$dbnm = "kyg8185";
	
	$uname = ;
	$pword = ;
	
	$conn = @mysqli_connect($host,
		$user,
		$pswd,
		$dbnm
	);
	
	//Write query get user database to begin check/
	$query = "SELECT * FROM user WHERE username = " + + " AND password = " + + ";";
	
	if(!$conn)
	{
			//Return to index.php due to error 
	}
	else
	{
	

	$result = mysqli_query($conn, $query);

	if(!result)
		{
			//Return to index.php due to error 
		}
	else
		{
			//Login autodirect here
		}
	}

?>