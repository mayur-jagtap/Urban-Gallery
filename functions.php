<?php
session_start();

    $link = mysqli_connect("localhost","root","","Urban Gallery");

    if(mysqli_connect_errno()){
    
        print_r(mysqli_connect_error());
        exit();
    } 
    if(isset($_GET['function'])){
        if($_GET['function'] == "logout"){
        session_unset();
        }
    }



?>