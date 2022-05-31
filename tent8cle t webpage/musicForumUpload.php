<?php
    //connect to db
    $dbLocalhost = mysqli_connect('localhost','root','makaLoki2','tent8cle_t_webpage');
    if($dbLocalhost->connect_error)
        die("Connection failed: " . $dbLocalhost->connect_error);
    mysqli_select_db($dbLocalhost, 'tent8cle_t_webpage')
        or die("Could not find database: " . $dbLocalhost->error);
    
  
    if($_FILES["File"]["error"]== UPLOAD_ERR_OK){
        //get temporary file name
        $tmp_name = $_FILES["File"]["tmp_name"];
           
        // Ignore any path information in the filename
        $fileName = basename($_FILES["File"]["name"]);

        //set new path
        $uploadDirectory = 'musicUploads/'.$fileName;

        // Move temp file and give it a new name
        move_uploaded_file($tmp_name, $uploadDirectory);
                
         //upload submission to database
        $title = mysqli_real_escape_string($dbLocalhost, $_POST["Title"]);
        $artist = mysqli_real_escape_string($dbLocalhost, $_POST["Artist"]);
        if(isset($_POST["Genre"]))
            $genre = mysqli_real_escape_string($dbLocalhost, $_POST["Genre"]);
        else
           $genre = "";
                
        //check for correct audio formats (REGEX DOES NOT WORK IN THIS VERSION)
        /* $fileFormats = new Regex("(\.wav|\.mp3|\.aac|\.aiff)$","i");
        if(!$fileName.test(fileFormats))
            die("uploads of type WAV/MP3/AAC/AIFF allowed"); */
                
        //add submission to database
        $addSubmission = "INSERT INTO audiouploads (audioFile,title,artist,genre) 
            VALUES('$fileName','$title','$artist','$genre')";
        //$results = mysqli_query($dbLocalhost, $addSubmission);
        $dbLocalhost->query($addSubmission);
        mysqli_close($dbLocalhost); 
        echo "<script>
                alert('File successfully submitted!'); 
                window.history.go(-1);
              </script>";
    }
    else die("Error uploading the file.");
    
       
?>