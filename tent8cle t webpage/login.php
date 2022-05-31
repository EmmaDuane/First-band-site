<?php 
	include('header.php')
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Log In</title>	
	</head>
	
	<body style="width=75%">	

	<div id="mainPiece">
			<div class="welcome"><strong>Welcome!</strong></div>
		<div class="intro">
			<p>If you do not already have an account, and would like to make one, please click 
			<a href="signup.php" class="signupLink">here</a></p>
			<p>Otherwise, please fill out the form below to log into your account.</p>
			
			<form name="loginForm" method="post" action="validateLogin.php" style="position:relative;top:-20px;
				text-align:center;">			
				<span id="loginStatus"></span><br>
				<label>Username
					<input type="text" id="Username" name="Username" required>
				</label>
				<br>
				<label>Password
					<input type="text" id="Password" name="Password" required>
				</label>
				<br>
				<button type="submit" value="Login" name="Login" id="Login">Login</button>
			</form> 

		</div>		
	</div>		
	</body>	
</html>


<script>
	document.getElementById("#Login").addEventListener("click", function(){
		$.ajax({
			url: "validateLogin.php",
			method: "POST",
			data: { Username: $("#Username").val(),Password: $("#Password").val()},
			dataType:"text",
			success:function(html){
				$('#loginStatus').html(html);
			}
		})
	});
</script>
