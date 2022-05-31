
<?php 
//connect to db
$dbLocalhost = mysqli_connect('localhost','root','makaLoki2','tent8cle_t_webpage');
if($dbLocalhost->connect_error)
    die("Connection failed: " . $dbLocalhost->connect_error);
mysqli_select_db($dbLocalhost, 'tent8cle_t_webpage')
    or die("Could not find database: " . $dbLocalhost->error);

$username = $_POST["Username"] ?? "";
$password = $_POST["Password"] ?? "";

//validate user data
$q = "SELECT * FROM users WHERE username='$username'&& userPassword='$password'";
$result = mysqli_query($dbLocalhost, $q);
$rows = mysqli_num_rows($result);

if ($rows < 1) {
    mysqli_close($dbLocalhost);
    echo "<script>
            alert('Username or password is incorrect.'); 
            window.history.go(-1);
          </script>";  
}
	
$_SESSION["user"] = $username;
mysqli_close($dbLocalhost);
header('location: account.php');	
?>