
<?php
	//this function checks if username is already taken 
	function checkUsername(&$dbLocalhost,&$username){
		$username = trim($username); //delete extra spaces
		$usernameQ = "SELECT * FROM users WHERE username='$username'";   //create query
		//use query to check database for matching usernames 
		$checkUsername = mysqli_query($dbLocalhost, $usernameQ);	
		if(mysqli_num_rows($checkUsername) > 0)	
			return true; 
		else
			return false;
	}
	
	//connect to database
	$dbLocalhost = mysqli_connect('localhost', 'root', 'makaLoki2', 'tent8cle_t_webpage');
	if($dbLocalhost->connect_error)
		die("Connection failed: " . $dbLocalhost->connect_error);
	mysqli_select_db($dbLocalhost, 'tent8cle_t_webpage')
		or die("Could not find database: " . $dbLocalhost->error);

	$username = mysqli_real_escape_string($dbLocalhost, $_POST["Username"]);

	//validate user data

	if(checkUsername($dbLocalhost,$username))
        die('Sorry, that username is already taken!');
	
	mysqli_close($dbLocalhost);
?>