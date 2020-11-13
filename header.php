<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cleviboy0718.000webhostapp.com/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <title>Urban Gallery </title>
     <link rel="icon" href="https://vignette.wikia.nocookie.net/naruto/images/5/55/Mangeky%C5%8D_Sharingan_Sasuke.svg/revision/latest/top-crop/width/220/height/220?cb=20171226184019" type="image/gif" sizes="16x16">
  </head>
  <body>
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="https://heisenbergg.000webhostapp.com/">
    <img src="https://vignette.wikia.nocookie.net/naruto/images/5/55/Mangeky%C5%8D_Sharingan_Sasuke.svg/revision/latest/top-crop/width/220/height/220?cb=20171226184019" width="30" height="30" class="d-inline-block align-top" alt="">
    Urban Gallery
  </a>
 
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-angle-down" aria-hidden="true"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="https://heisenbergg.000webhostapp.com/" >Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Explore</a>
      </li>
     
        
      
      
    </ul>
     
            
            
            <?php 
            if(isset($_SESSION['id'])){
            
            ?>
             <ul class="navbar-nav">
        <li class="nav-item dropdown">
       <a class="nav-link " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php
              $query = "SELECT * FROM profilePic WHERE userid=".$_SESSION['id']." ORDER BY id DESC LIMIT 1";
              $result = mysqli_query($link,$query);
              $data = $result->fetch_assoc();
              if($data['image_path']!=""){
              echo  '<img src="profilePic/'.$data['image_path'].'" width="40" height="40" class="rounded-circle">';}
              else{
                  echo  '<img src="data:image/jpeg;base64,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" width="40" height="40" class="rounded-circle">';}
              
              ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="?page=homer"><i class="fa fa-user mr-2" aria-hidden="true"></i>My Profile</a>
             <div role="separator" class="dropdown-divider"></div>
          <a class="dropdown-item" href="?pager=settings"><i class="fa fa-cog mr-2" aria-hidden="true"></i>Settings</a>
             <div role="separator" class="dropdown-divider"></div>
          <a class="dropdown-item" href="?function=logout"><i class="fa fa-sign-out mr-2" aria-hidden="true"></i></i>Log Out</a>
        </div>
        </li> 
        <li class="nav-item">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/nolan/50/appointment-reminders.png" width="40" height="40" class="rounded-circle"/></a>
      </li>
 
 
    </ul>
    <form class="form-inline my-2 my-lg-0" method="get">
            <div class="input-group">
                <input class="form-control border-secondary py-2 mySearch" type="search" id="search" placeholder="Search Anything" name="user">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    
            <?php } else { ?>
      <button class="btn btn-outline-success my-2 my-sm-0 mr-2" data-toggle="modal" data-target="#exampleModal">LogIn/SignUp</button>
      
      <?php }?>
        
    
         
  </div>
</nav>