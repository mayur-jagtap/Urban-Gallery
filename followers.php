<style>
    @media only screen and (max-width: 320px) {
   .list-group-item img{
       height:40px;
       width: 40px;
   }
}

@media only screen and (min-width: 321px) and (max-width: 768px){
       .list-group-item img{
       height: 50px;
       width: 50px;
   }
}
@media only screen and (min-width: 769px) and (max-width: 1200px){
        .list-group-item img{
       height: 100px;
       width: 100px;
   }
}
@media only screen and (min-width: 1201px) {
      .list-group-item img{
       height:100px;
       width: 100px;
   }
}
    
    
</style>
<?php 
error_reporting(0);
  $conn = mysqli_connect("localhost","root","","Urban Gallery");
  if($_GET['usernamefs']){
     $userquery = "SELECT * FROM users WHERE username ='".$_GET['usernamefs']."' ";
    $userresult= mysqli_query($conn,$userquery);
       $userdata = $userresult->fetch_assoc();
        $sql = "SELECT * FROM isFollowing WHERE isFollowing=".$userdata['id']."";
} else {
     $sql = "SELECT * FROM isFollowing WHERE isFollowing=".$_SESSION['id']."";
}



   
 $result= mysqli_query($conn,$sql);
    echo mysqli_error($conn);
   $data = '';
   while($row = $result->fetch_assoc()){
      
      $query = "SELECT * FROM users WHERE id =".$row['follower']."";
      $resultsar = mysqli_query($conn,$query);
      $rowuser = $resultsar->fetch_assoc();
       if($_GET['usernamefs']){
            $usernamequery = "SELECT * FROM isFollowing WHERE isFollowing=".$_SESSION['id']."";
             $usernameresult= mysqli_query($conn,$usernamequery);
             $usernamerow = $usernameresult->fetch_assoc();
       $followquery = "SELECT * FROM isFollowing WHERE follower = ".$_SESSION['id']." AND isFollowing = ".mysqli_real_escape_string($link,$usernamerow['follower'])."  LIMIT 1";           
       } else {
                  $followquery = "SELECT * FROM isFollowing WHERE follower = ".mysqli_real_escape_string($link,$_SESSION['id'])." AND isFollowing = ".mysqli_real_escape_string($link,$row['follower'])."  LIMIT 1";
       }
      
      
       $followqueryre = mysqli_query($link,$followquery);
       
       
      
              $profquery = "SELECT * FROM profilePic WHERE userid=".$rowuser['id']." ORDER BY id DESC LIMIT 1";
              $resultprof = mysqli_query($conn,$profquery);
              $dataprof = $resultprof->fetch_assoc();
            
              
             
       
      if($row['follower'] == $_SESSION['id']){
           $a ="";
       }   
       
       else if(mysqli_num_rows($followqueryre) > 0){
       
       $a = "<a class='toggleFollow btn btn-outline-primary btn-sm float-right' data-userId='".$rowuser['id']."'><span><i class='mr-1 fa fa-hand-peace-o'></i></span>Unfollow</a>";
       }  else {
    
             $a = "<a class='toggleFollow btn btn-outline-primary btn-sm float-right' data-userId='".$rowuser['id']."'><span><i class='mr-1 fa fa-hand-scissors-o'></i></span>Follow</a>";
       }
       if($dataprof['image_path']!=""){
            $sad=  '<img class="media-object rounded-circle mr-3 " style="height: 100px; width: 100px;" src="profilePic/'.$dataprof['image_path'].'">';}
            else{
                  $sad=  '<img class="media-object rounded-circle mr-3 " style="height: 100px; width: 100px;" src="download.jpg">';}
            
   $data.='
      <li class="list-group-item">
            <div class="media w-100">
               '.$sad.'
                <div class="media-body align-self-center">
                    '.$a.'
                    <strong>'.strtoupper($rowuser['username']).'</strong>
                    
                </div>
            </div>
        </li>
    
   
  
 ';
   
  
  
       
    
   }

  echo "<div class='container'><ul class='media-list media-list-users list-group' id='followers'>$data</ul></div>";

?>
