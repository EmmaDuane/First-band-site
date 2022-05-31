<?php include('header.php') ?>
<!doctype html>
<html lang="en">	
	<head>	
		<meta charset="UTF-8">
		<title>Music Forum</title>
	</head>

	<body>
	<div id="mainPiece">
		<div class="welcome"><strong>Music Forum</strong></div>
		
		<div class="intro">
			You've found the music forum! Check out what's been shared by other music lovers across the globe...
		</div>
		<?php 
			if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
				?>
					<script type="text/javascript">$('#uploadMusicContainer').hide()</script>
				<?php
			} 
		?>

		<div class="uploadMusicContainer">
			<div style="margin-bottom:20px;margin-top:-40px;">If you would like to upload a music file to our forum, please sign in then submit your 
				WAV, MP3, AAC, or AIFF file below.
			</div>
			<div class="uploadMusic">
				
				<form name="uploadForm" id="uploadForm" action="musicForumUpload.php" 
					method="post" enctype="multipart/form-data">
					<label class="formLabel">Choose File:
							<input type="file" name="File" id="File" class="formInput" required>
						</label><span id="checkType"></span>
						<br>
						<label class="formLabel">Title:
							<input type="textbox" name="Title" id="Title" class="formInput" required>
						</label><br>
						<label class="formLabel">Artist:
							<input type="text" name="Artist" id="Artist" class="formInput" required>
						</label><br>
						<label class="formLabel">Genre:
							<input type="textbox" name="Genre" id="Genre" class="formInput">
						</label><br>
						<input type="submit" name="Submit" value="Upload" style="margin-left:10px">
						<br>
					</form>
			</div>
		</div>
	
		<div id="forum" class="forum">
			<table>
			<tr>
				<th>Title</th>
				<th>Artist</th>
				<th>Audio File</th>
				<th>Genre</th>
			</tr>
			<?php 
				//connect to db
				$dbLocalhost = mysqli_connect('localhost','root','makaLoki2','tent8cle_t_webpage');
				if($dbLocalhost->connect_error)
    				die("Connection failed: " . $dbLocalhost->connect_error);
				mysqli_select_db($dbLocalhost, 'tent8cle_t_webpage')
    				or die("Could not find database: " . $dbLocalhost->error);
				$q = "SELECT * FROM audiouploads";
				$results = mysqli_query($dbLocalhost,$q);
				while($row = mysqli_fetch_array($results)){
					echo '<tr>
						<td>'.$row['title'].'</td>
						<td>'.$row['artist'].'</td>
						<td>'.$row['audioFile'].'</td>
						<td>'.$row['genre'].'</td>
						</tr>';
				}
				mysqli_close($dbLocalhost); 
			?>
			</table>
		</div>
			
	</div>
	</body>
</html>