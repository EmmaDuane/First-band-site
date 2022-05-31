<?php include('header.php') ?>
<!doctype html>
<html lang="en">
	<head>
		<title>Art Forumn</title>
		<meta charset="UTF-8">
	</head>

	<body>	
	<div id="mainPiece">
		<div class="welcome"><strong>Art Forum</strong></div>
		
		<div id="intro" class="intro">
			<p>Welcome to our art forum! Check out what's been shared by other music lovers 
				across the globe...</p>
		</div>
		
		<div id="uploadArtContainer" class="uploadArtContainer">
			<p>If you would like to upload artwork, please sign in then fill out the form below!</p>
			<div class="uploadArt">
				<form name="uploadForm" id="uploadForm" enctype="multipart/form-data" 
                    method="POST" action="artForumUpload.php">
					<label>Choose File:
						<input type="file" name="File" id="File" required>
					</label><br>
					<label>Title:
						<input type="textbox" name="Title" id="Title" required>
					</label><br>
					<label>Artist or Source:
						<input type="text" name="Artist" id="Artist" required>
					</label><br>
					<input type="submit" name="Submit" value="Upload" id="Submit">
					<br>
				</form>
			</div>
		</div>

		<div id="forum" class="forum">
			<table>
			<tr><th style="border:none;"></th>
				<th>Title</th>
				<th>Artist</th>	
			</tr>
			<?php 
				//connect to db
				$dbLocalhost = mysqli_connect('localhost','root','makaLoki2','tent8cle_t_webpage');
				if($dbLocalhost->connect_error)
    				die("Connection failed: " . $dbLocalhost->connect_error);
				mysqli_select_db($dbLocalhost, 'tent8cle_t_webpage')
    				or die("Could not find database: " . $dbLocalhost->error);
				$q = "SELECT * FROM artuploads";
				$results = mysqli_query($dbLocalhost,$q);
				//$row['imageFile']
				//echo 
				while($row = mysqli_fetch_array($results)){
					$imagePath = $row['imageFile'];
					$image = '<img src="imgs/'.$imagePath.'" height="200" width="200">';
					echo '<tr>
						<td>'.$image.'</td>
						<td>'.$row['title'].'</td>
						<td>'.$row['artist'].'</td>
						</tr>';
				}
				mysqli_close($dbLocalhost); 
			?>
			</table>
		</div>
	</div>
	
	</body>
</html>
<script>
	$(document).ready(function(){
		$("#Submit").click(function(){
			alert("File successfully submitted!");
		});
		
	});
</script>	

