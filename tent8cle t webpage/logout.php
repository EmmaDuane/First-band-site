<?php
    SESSION_START();
    $_SESSION = array();
    session_destroy();
    include('header.php');
?>
<script> alert("You have successfully logged out. ");</script>

<!doctype html>
<html lang="en">	
	<head>	
		<meta charset="UTF-8">
		<title>Music Forum</title>
	</head>

	<body>
	<div id="mainPiece">
		<div class="welcome"><strong>Music Forum</strong></div>
		
		<div class="intro">We hope to see you again soon!</div>
    </div>
    </body>
</html>

