<?php

//upload.php

if(isset($_POST["image"]))
{
    session_start();
	$data = $_POST["image"];



	$image_array_1 = explode(";", $data);

	
	$image_array_2 = explode(",", $image_array_1[1]);

	
	$data = base64_decode($image_array_2[1]);

	$imageName = time() . '.png';

	
	        $conn = new mysqli("localhost","root","","Urban Gallery");
	        file_put_contents('profilePic/'.$imageName, $data);
	        $sql = "INSERT INTO profilePic (image_path,userid) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si",$imageName,$_SESSION['id']);
            $stmt->execute();
            

	
	

}

?>