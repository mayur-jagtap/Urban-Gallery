<?php 
    
$conn = mysqli_connect("localhost","root","","Urban Gallery");
 if(isset($_GET['usernameup'])){
    $userquery = "SELECT * FROM users WHERE username ='".$_GET['usernameup']."' ";
     
 }
    if(isset($_GET['user'])){
         $userquery = "SELECT * FROM users WHERE username ='".$_GET['user']."' ";
    }
    $userresult= mysqli_query($conn,$userquery);
       $userdata = $userresult->fetch_assoc();
 $sql = "SELECT * FROM images WHERE userid='".mysqli_real_escape_string($conn,$userdata['id'])."' ORDER BY id DESC";
        $result= mysqli_query($conn,$sql);
   $data = '';
  
   while($row = $result->fetch_assoc()){
   $data .= '<div class="item">

   <a > 
    <img  src="'.$row['image_path'].'" data-toggle="modal" data-target="#myModal">

 </a>

   </div>
   
  ';
   
   
   
   }
   echo '<div class="masonry">'.$data.'</div>';
?>
        

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog .modal-dialog-centered">
    <div class="modal-content">
  
        
  
      <div class="modal-body">
         <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <img src="" class="img-fluid" id="changed" style="width: 100%;">
       <div class="container ">
        <i class="fa fa-thumbs-up mr-1" aria-hidden="true"> Like</i>
        <i class="fa fa-thumbs-down mr-1 " aria-hidden="true"> Dislike</i>
        <i class="fa fa-comment"> Comment</i>
       </div>
      </div>
    </div>
  </div>
</div>

<script>
   
   
$('.item img').click(function(){
    var sc=    $(this).attr('src');
    $("#changed").attr('src',sc);
})
  function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
  }

  $('.modal').on('show.bs.modal', centerModal);
  $(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
  });
</script>