<?php
    session_start();
   $conn = new mysqli("localhost","root","","Urban Gallery");
    

        foreach($_FILES['images']['name'] as $i => $value){
            $image_name = $_FILES['images']['tmp_name'][$i];
            $folder="images/";
            $image_path = $folder.$_FILES['images']['name'][$i];
            move_uploaded_file($image_name,$image_path);
            
            $sql = "INSERT INTO images (image_path,userid) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si",$image_path,$_SESSION['id']);
            $stmt->execute();
            echo mysqli_error($conn);
        }
        echo "Image Uploaded Successfully!";

?>