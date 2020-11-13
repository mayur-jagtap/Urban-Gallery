 <style> 



		.preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.modal-lg{
  			max-width: 1000px !important;
		}
		.modal-lg img{
		    
		    	display: block;
		    
		  	max-width: 100%;
		}
  body {
  margin: 0;
  "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.header {
  min-height: 60vh;
  background: #009FFF;
background: url("https://img.wallpapersafari.com/desktop/1920/1080/62/63/e0tk1U.jpg");

background-size: cover;
  color: white;
  clip-path: ellipse(100vw 60vh at 50% 50%);
  display: flex;
  align-items: center;
  justify-content: center;
}

.details {
  text-align: center;
}

.profile-pic {
  height: 8rem;
  width: 8rem;
  object-fit: center;
  border-radius: 50%;
  border: 2px solid #fff;
}


.stats {
  display: flex;
}

.stats .col-4 {
  width: 7rem;
  text-align: center;
}

.heading {
  font-weight: bold;
  font-size: 1.3rem;
  margin: 1rem 0;
}
.textmsg{
    font-weight: 200;
  font-size: 1.3rem;
  margin: 1rem 0;
}
    .masonry { /* Masonry container */
    -webkit-column-count: 4;
  -moz-column-count:4;
  column-count: 4;
  -webkit-column-gap: 1em;
  -moz-column-gap: 1em;
  column-gap: 1em;
   margin: 1.5em;
    padding: 0;
    -moz-column-gap: 1.5em;
    -webkit-column-gap: 1.5em;
    column-gap: 1.5em;
    font-size: .85em;
}
.image_area {
            position: relative;
        }

    
.item {
    display: inline-block;
    background: #fff;
    padding: 0.5em;
    margin: 0 0 1em;
    width: 100%;
    -webkit-transition:1s ease all;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-shadow: 2px 2px 4px 0 #ccc;
}
.item img{width:100%;}


@media only screen and (max-width: 320px) {
    .masonry {
        -moz-column-count: 1;
        -webkit-column-count: 1;
        column-count: 1;
    }
}

@media only screen and (min-width: 321px) and (max-width: 768px){
    .masonry {
        -moz-column-count: 2;
        -webkit-column-count: 2;
        column-count: 2;
    }
}
@media only screen and (min-width: 769px) and (max-width: 1200px){
    .masonry {
        -moz-column-count: 3;
        -webkit-column-count: 3;
        column-count: 3;
    }
}
@media only screen and (min-width: 1201px) {
    .masonry {
        -moz-column-count: 4;
        -webkit-column-count: 4;
        column-count: 4;
    }
}



  </style>
      <section class="profile">
  <header class="header">
    <div class="details">
       
 <div class="image_area">
                 <?php if(isset($_GET['usernamefs'])){
                     $_GET['user'] = $_GET['usernamefs'];
                 }
                 if (isset($_GET['usernamefg'])){
                     $_GET['user'] = $_GET['usernamefg'];
                 }
                 if(isset($_GET['usernameup']))
                 {
                      $_GET['user'] = $_GET['usernameup'];
                 }
                 ?>
                               <?php
                               $userquery = "SELECT * FROM users WHERE username ='".$_GET['user']."' ";
                               $userresult= mysqli_query($link,$userquery);
                               $userdata = $userresult->fetch_assoc();
              $query = "SELECT * FROM profilePic  WHERE userid=".$userdata['id']." ORDER BY id DESC LIMIT 1";
              $result = mysqli_query($link,$query);
              $data = $result->fetch_assoc();
              if($data['image_path']!=""){
              echo  '<img src="profilePic/'.$data['image_path'].'" id="uploaded_image" style ="height: 120px; width: 120px;"class="profile-pic" />';}
              else{
                  echo  '<img src="download.jpg" id="uploaded_image" style ="height: 120px; width: 120px;"class="profile-pic" />';}
                               
              
              ?>
               </div>
                            <h1 class="heading">
          <?php
              echo $_GET['user'];
          ?>
          </h1>  
             <h1 class="textmsg">
                <?php
         $query = "SELECT email FROM users WHERE username='".$_GET['user']."' ";
              $result = mysqli_query($link,$query);
             $data= $result->fetch_assoc();
              echo $data['email'];
          ?>
          </h1>
       <h1 class="textmsg">Always Protecting from Shadows.</h1>
    
           <div class="stats">
        <div class="col-4">
          <h4 id="posts">
                  <?php
                   $userquery = "SELECT * FROM users WHERE username ='".$_GET['user']."' ";
                               $userresult= mysqli_query($link,$userquery);
                               $userdata = $userresult->fetch_assoc();
              $query = "SELECT id FROM images WHERE userid=".$userdata['id']."";
              $result = mysqli_query($link,$query);
              $data = mysqli_num_rows($result);
              echo $data;
              ?>
              
          </h4>
          <?php 
            echo '<a href="?usernameup='.$_GET['user'].'" style="text-decoration: none; color:white">';
             ?>   
               Posts
               
               </a>
        </div>
        <div class="col-4">
          <h4 id="followers">
                 <?php
                   $userquery = "SELECT * FROM users WHERE username ='".$_GET['user']."' ";
                               $userresult= mysqli_query($link,$userquery);
                               $userdata = $userresult->fetch_assoc();
              $query = "SELECT follower FROM isFollowing WHERE isFollowing=".$userdata['id']."";
              $result = mysqli_query($link,$query);
              $data = mysqli_num_rows($result);
              echo $data;
              ?>
              
          </h4>
       <?php   
       echo '<a href="?usernamefs='.$_GET['user'].'" style="text-decoration: none; color:white"> Followers</a>'; 
       ?>
       </div>
        <div class="col-4">
          <h4 id="followings">
              
                <?php
                  $userquery = "SELECT * FROM users WHERE username ='".$_GET['user']."' ";
                               $userresult= mysqli_query($link,$userquery);
                               $userdata = $userresult->fetch_assoc();
              $query = "SELECT isFollowing FROM isFollowing WHERE follower=".$userdata['id']."";
              $result = mysqli_query($link,$query);
              $data = mysqli_num_rows($result);
              echo $data;
              ?>
              
          </h4>
           <?php   
       echo '<a href="?usernamefg='.$_GET['user'].'" style="text-decoration: none; color:white"> Followings</a>'; 
       ?>
        </div>
      </div>  
                            
               
      
     </div>
  </header>
</section>