<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="croppie.js"></script>
    <link rel="stylesheet" href="croppie.css" />

   
    <title>Hello, world!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />

  
  </head>
 
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

.location p {
  display: inline-block;
  text-decoration: none;
}

.location svg {
  vertical-align: middle;
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
  <body>
    <section class="profile">
  <header class="header">
    <div class="details">
    
   <div class="image_area">
                    <form action="upload.php" method="post" enctype="multipart/form-data"  >
                        <label for="upload_image">
                           
                            <?php
                            $conn = mysqli_connect("localhost","root","","Urban Gallery");
                            $sql = "SELECT * FROM profilePic WHERE userid ='". mysqli_real_escape_string($conn,$_SESSION['id'])."' ORDER BY id DESC";
                            $result= mysqli_query($conn,$sql);
                            $row = $result->fetch_assoc();
                             if($row['image_path']!=""){
                                  echo' <img src="profilePic/'.$row['image_path'].'"  class="profile-pic" >';
                             }
                             else{
                                  echo' <img src="data:image/jpeg;base64,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"  class="profile-pic" >';
                             }
                           
                            
                            ?>
                             
                            <input type="file" name="file" id="upload_image" style="display:none" >
                        </label>
                    </form>
                </div>
      
      
      <h1 class="heading">
          <?php
              $query = "SELECT * FROM users WHERE id =".$_SESSION['id']."";
              $result = mysqli_query($link,$query);
              $row = $result->fetch_assoc();
              echo $row['username'] ;
              
          ?>
          
          
          
          </h1>
          
       <h1 class="textmsg">Always Protecting from Shadows.</h1>
      
      <div class="stats">
        <div class="col-4">
          <h4><?php
              $query = "SELECT id FROM images WHERE userid=".$_SESSION['id']."";
              $result = mysqli_query($link,$query);
              $data = mysqli_num_rows($result);
              echo $data;
              ?></h4>
          <a href="?paged=post" style="text-decoration: none; color:white"> Posts</a>
        </div>
        <div class="col-4">
          <h4><?php
              $query = "SELECT follower FROM isFollowing WHERE isFollowing=".$_SESSION['id']."";
              $result = mysqli_query($link,$query);
              $data = mysqli_num_rows($result);
              echo $data;
              ?></h4>
          <a href="?pagef=followers" style="text-decoration: none; color:white"> Followers</a>
        </div>
        <div class="col-4">
          <h4><?php
              $query = "SELECT isFollowing FROM isFollowing WHERE follower=".$_SESSION['id']."";
              $result = mysqli_query($link,$query);
              $data = mysqli_num_rows($result);
              echo $data;
              ?></h4>
          <a href="?pagefo=followings" style="text-decoration: none; color:white">  Followings
          </a>
        </div>
      </div>
    </div>
  </header>
</section>


<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>









   

