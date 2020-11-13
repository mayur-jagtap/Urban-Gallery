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
background: url("iceland.jpg");

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
  margin: 0.2rem 0;
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

<?php 
  
 error_reporting(0);
  $conn = mysqli_connect("localhost","root","","Urban Gallery");
 if($_SESSION['id']){
      $sql = "SELECT DISTINCT id,image_path,userid FROM images WHERE userid!=".$_SESSION['id']." ORDER BY id DESC";
    $sad = 'sad';
 }
  else {
     $sql = "SELECT DISTINCT userid,id,image_path FROM images ORDER BY id DESC";
      $sad = 'sda';
  }
        $result= mysqli_query($conn,$sql);
    echo mysqli_error($conn);
   $data = '';
   while($row = $result->fetch_assoc()){
       $userquery = "SELECT * FROM users WHERE id=".mysqli_real_escape_string($conn,$row['userid'])." LIMIT 1";
       $userqueryresult=mysqli_query($link,$userquery);
       $user = mysqli_fetch_assoc($userqueryresult); 
       
       
       $followquery = "SELECT * FROM isFollowing WHERE follower = ".mysqli_real_escape_string($link,$_SESSION['id'])." AND isFollowing = ".mysqli_real_escape_string($link,$row['userid'])."  LIMIT 1";
       $followqueryre = mysqli_query($link,$followquery);
       if(mysqli_num_rows($followqueryre) > 0){
           if ($sad == 'sad'){
       $a = "<a class='toggleFollow btn-sm mb-2 btn-outline-primary float-right' data-userId='".$row['userid']."'><span><i class='mr-1 fa fa-hand-peace-o'></i></span>Unfollow</a>";
       }} else {
            if ($sad == 'sad'){
             $a = "<a class='toggleFollow btn-sm btn-outline-primary mb-2 float-right ' data-userId='".$row['userid']."'><span><i class='mr-1 fa fa-hand-scissors-o'></i></span>Follow</a>";
      } }
    if($_SESSION['id']){
         $wsd =  '<a href="?user='.$user['username'].'"> '.$user['username'].' </a>';
          $ldc=' 
            <i class="fa fa-thumbs-up mr-1" aria-hidden="true"> Like</i>
            <i class="fa fa-thumbs-down mr-1 " aria-hidden="true"> Dislike</i>
            <i class="fa fa-comment"> Comment</i>
           ';
         
         
      } else {
            $wsd =  '<a > '.$user['username'].' </a>';
            $ldc='';
            
      }
   $data .= '<div class="item 
   ">
  <div class="heading"> '.$wsd.'  '.$a.'</div>
 
   <a href="'.$row['image_path'].'"> 
   
    <img  src="'.$row['image_path'].'">
 </a>
   <div class="container ">'.$ldc.'</div>
   </div>
  ';
   
   }
    echo "<div class='masonry'>$data</div>"; 
 

  
 
?>
