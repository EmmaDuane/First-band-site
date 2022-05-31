<?php
    //connect to database
	$dbLocalhost = mysqli_connect('localhost', 'root', 'makaLoki2', 'tent8cle_t_webpage');
	if($dbLocalhost->connect_error)
		die("Connection failed: " . $dbLocalhost->connect_error);
	mysqli_select_db($dbLocalhost, 'tent8cle_t_webpage')
		or die("Could not find database: " . $dbLocalhost->error);

	$username = mysqli_real_escape_string($dbLocalhost, $_POST["Username"]);
	$password = $_POST["UserPassword"];
	$email = $_POST["Email"];
						
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        die('Invalid email format');

    $username = trim($username);
    $password = trim($password);
    $email = trim($email);
    $addUserQ = "INSERT users (username, userPassword, email) 
        VALUES ('$username','$password','$email')";
    if($dbLocalhost->query($addUserQ)===true)
    {
        $_SESSION["user"] = $username;
        header('location: account.php');
    }

    mysqli_close($dbLocalhost);
?>