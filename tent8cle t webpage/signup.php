<?php 
	include('header.php')
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign Up</title>	
	</head>

	<body style="width=75%">
	<div id="mainPiece">
			<div class="welcome"><strong>Welcome!</strong></div>
		<div class="intro">
			<p>Welcome to the family! <br>
			Fill out the form below to get started...</p>
			
			<form name="signupForm" method="post" action="createUser.php" style="text-align:center;">		
				<span id="availability"></span><br>
				<label>Username
					<input type="text" name="Username" id="Username" required>
				</label> 
				<br>
				<label>Password
					<input type="text" name="UserPassword" id="UserPassword" required>
				</label>
				<br>
				<label>Email
					<input type="text" name="Email" id="Email" required>
				</label>
				<br>
				<button type="submit" value="Submit" id="Submit">Create Account</button>
				<br>
			</form>
		</div>		
	</div>		
	</body>
</html>

<script>
	$('#Username').blur(function(){
		var Username = $(this).val();
		$.ajax({
			url: "checkUsername.php",
			method: "POST",
			data:{Username:Username},
			dataType:"text",
			success:function(html){
				$('#availability').html(html);
			}
		});
	});
</script> 