<?php 
include("functions.php");

include("search.php");
include("header.php");
if(isset($_GET['page']) == "homer" && $_SESSION['id']){
    include("15.php");
    include("posts.php");
  
}else if(isset($_GET['paged']) == "posts"){
    include("15.php");
    include("posts.php");
  
}else if(isset($_GET['pagef']) == "followers"){
    include("15.php");
    include("followers.php");
  
} else if(isset($_GET['pagefo']) == "followings"){
    include("15.php");
    include("followings.php");
  
}else if(isset($_GET['pager']) == "settings"){
    include("settings.php");
  
}else if(isset($_GET['user'])){
      
      include("profile.php");
      include("userpost.php");
    
} else if(isset($_GET['usernamefs'])){
    include("profile.php");
      include("followers.php");
} else if(isset($_GET['usernamefg'])){
    include("profile.php");
      include("followings.php");
}else if(isset($_GET['usernameup'])){
    include("profile.php");
      include("userpost.php");
}else if(isset($_GET['searchUser'])){
      include("profile.php");
      include("userpost.php");
    
}else {

include("home.php");


}

include("footer.php");


?>