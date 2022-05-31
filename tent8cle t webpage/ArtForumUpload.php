<?php
    if(isset($_POST['Submit'])){
        $uploadDirectory = "/tent8cle t webpage/artUploads";
        if(!($_FILES["File"]["error"]== UPLOAD_ERR_OK))
            die("Error uploading file.");
        $dbLocalhost = mysqli_connect('localhost','root','makaLoki2','tent8cle_t_webpage');
        if($dbLocalhost->connect_error)
            die("Connection failed: " . $dbLocalhost->connect_error);
        mysqli_select_db($dbLocalhost, 'tent8cle_t_webpage')
            or die("Could not find database: " . $dbLocalhost->error);
        
            //get temporary file name
        $tmp_name = $_FILES["File"]["tmp_name"];
           
        // Ignore any path information in the filename
        $fileName = basename($_FILES["File"]["name"]);

        //set new path
        $uploadDirectory = 'artUploads/'.$fileName;

        // Move temp file and give it a new name
        move_uploaded_file($tmp_name, $uploadDirectory);
               
         //upload submission to database
        $title = mysqli_real_escape_string($dbLocalhost, $_POST["Title"]);
        $artist = mysqli_real_escape_string($dbLocalhost, $_POST["Artist"]);
        //add submission to database
        $addSubmission = "INSERT INTO artuploads (imageFile,title,artist) 
            VALUES('$fileName','$title','$artist')";
        //$results = mysqli_query($dbLocalhost, $addSubmission);
        $dbLocalhost->query($addSubmission);
        mysqli_close($dbLocalhost); 
        echo "<script>
                alert('File successfully submitted!'); 
                window.history.go(-1);
              </script>";   
    }
?>