<?php
include("functions.php");
if(isset($_GET['action']) == "loginSignup"){
    $error = "";
    
   
   if($_POST['loginActive'] == "0"){
       
       if (!$_POST['email']){
        $error = "An Email Address is required";
    }else if (!$_POST['username']){
        $error = "An Useraname is required";
    }
    else if (!$_POST['password']){
        $error = "A password is required";
    }
      if($error != ""){
        echo $error;
        $error = "";
        exit();
    }
       
    $query =   "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
    
    $result = mysqli_query($link,$query);
    
    $query = "SELECT * FROM users WHERE username = '".mysqli_real_escape_string($link,$_POST['username'])."' LIMIT 1";
    $result1 = mysqli_query($link, $query);
 
    if(mysqli_num_rows($result) > 0){
        echo mysqli_connect_error();
        $error = "That Email Is Already Taken";
        
    }else if(mysqli_num_rows($result1) > 0){
        
            echo "That Username is already taken";
    }else {
        
          $query = "INSERT INTO users (`email`, `password`,`username`) VALUES ('". mysqli_real_escape_string($link, $_POST['email'])."', '". mysqli_real_escape_string($link, $_POST['password'])."','". mysqli_real_escape_string($link, $_POST['username'])."')";
          

          
        if (mysqli_query($link,$query)){
            
             $_SESSION['id'] = mysqli_insert_id($link);
            
            $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
            mysqli_query($link,$query);
            
            $query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            echo mysqli_error($link);
            $row = mysqli_fetch_assoc($result);
            
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email']; 
            
            
            echo 1;
           
            
            
        } else {
          
            $error = "Couldn't Create User - Please Try Again Later";
        }
        
    }
     
   } else {
       
       
       $emailusername = mysqli_real_escape_string($link,$_POST['email']);
            
        $loginpassword = mysqli_real_escape_string($link,$_POST['username']);
            
       
        $query = "SELECT * FROM users WHERE email = '$emailusername' OR username = '$emailusername' " ;
        
            $result = mysqli_query($link,$query);
            $row = mysqli_fetch_assoc($result);
            

                if ($row['password'] == md5(md5($row['id']).$_POST['password'])){
                    
                    echo 1;
                    
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    
                } else {
                    
                    $error = "Could not find that username and password combination";
                    
                }
       
   }
    if($error != ""){
        echo $error;
        exit();
    }
     
}

if(isset($_GET['action']) == "toggleFollow"){
  
     $query =   "SELECT * FROM isFollowing WHERE follower = ".mysqli_real_escape_string($link,$_SESSION['id'])." AND isFollowing = ".mysqli_real_escape_string($link,$_POST['userId'])."  LIMIT 1";
    
    $result = mysqli_query($link,$query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        
        mysqli_query($link,"DELETE FROM isFollowing WHERE id= ".mysqli_real_escape_string($link,$row['id'])." LIMIT 1");
        echo "1";
 }  else {
      mysqli_query($link,"INSERT INTO isFollowing (follower, isFollowing) VALUES (".mysqli_real_escape_string($link,$_SESSION['id']).",".mysqli_real_escape_string($link,$_POST['userId']).")");
      echo "2";
 }
}

if(isset($_GET['action']) == "editProfile"){
    
    $susscess = "";
    if($_POST['email']){
        $query = "UPDATE users SET email = '".$_POST['email']."' WHERE id = ".$_SESSION['id']." LIMIT 1";
        mysqli_query($link,$query);
        $susscess = 1;
    }
    if($_POST['username']){
        $query = "UPDATE users SET username = '".$_POST['username']."' WHERE id = ".$_SESSION['id']." LIMIT 1";
        mysqli_query($link,$query);
        $susscess = 1;
    }
    if($_POST['password']){
        $query = "UPDATE users SET password = '". md5(md5($_SESSION['id']).$_POST['password']) ."' WHERE id = ".$_SESSION['id']." LIMIT 1";
        mysqli_query($link,$query);
        $susscess = 1;
    }
    if($susscess == 1)
    {
        echo 1;
    }else{
        echo 2;
    }
    
}
if (isset($_POST['query'])) {
    
    $inpText = $_POST['query'];
    
    $sql = "SELECT username FROM users WHERE username LIKE '%{$inpText}%' ";
    $result = mysqli_query($link,$sql);
    $row = $result->fetch_assoc();
    if ($result) {
      foreach ($result as $row) {
        echo  $row['username']."," ;
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }




?>