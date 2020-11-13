<link rel="stylesheet" href="croppie.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Footer -->
<footer class="footer bg-light">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Grid row-->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 py-5">
        <div class="mb-5 flex-center text-center">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fa fa-facebook-f fa-lg  mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fa fa-twitter fa-lg  mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fa fa-google-plus fa-lg mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fa fa-linkedin-square fa-lg mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fa fa-instagram fa-lg text-center  mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic  text-center">
            <i class="fa fa-pinterest fa-lg  fa-2x"> </i>
          </a>
        </div>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="shinobi.com/"> Itachi.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->







<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    
    
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltitle">Log In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger" id="loginAlert" ></div>
      <form>
          <input type="hidden" name= "loginActive" value="1" id="loginActive">
  <div class="form-group">
     
     
     
     <label  for="exampleEmail">Email Address</label>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text bg-dark text-white">@</div>
    </div>
    <input type="email" class="form-control" id="email" placeholder="Email Address">
  </div>
     
  </div>
   <div class="form-group" id="usernameForm" style="display:none" >
    <label  for="username">Username</label>
    <input  type="text" class="form-control" id="username" placeholder="Username">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
 
  
</form>
      </div>
      <div class="modal-footer ">
        <button id="toggleLogin" type="button" class="btn btn-outline-info mr-2 pr-2">SignUp</button>
       
        <button type="button" class="btn btn-outline-danger" id="togglebutton">Log In</button>
      </div>
    </div>
  </div>
</div>
<script src="croppie.js"></script>
<script>
    $("#toggleLogin").click(function(){
       
       if($("#loginActive").val() == 1) {
           $("#loginActive").val("0");
           $("#modaltitle").html("Sign Up");
           $("#togglebutton").html("Sign Up");
           $("#toggleLogin").html("Login");
           $("#usernameForm").css("display","block");
         
       } else {
            $("#loginActive").val("1");
           $("#modaltitle").html("Login");
           $("#togglebutton").html("Login");
           $("#toggleLogin").html("SignUp");
           $("#usernameForm").css("display","none");
           
       }
       
        
    });
    
    $("#togglebutton").click(function(){
    
        $.ajax({
            type: "POST",
            url: "actions.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" +$("#password").val() +  "&username=" +$("#username").val() + "&loginActive=" + $("#loginActive").val(),
            success: function(result){
               if(result == "1"){
                   window.location.assign("//");//address for home page;
               } else {
                   $("#loginAlert").html(result).show();
               }
            }
            
        });
        
       
    });
    
    $(".toggleFollow").click(function(){
            var id = $(this).attr("data-userId")
           $.ajax({
            type: "POST",
            url: "actions.php?action=toggleFollow",
            data: "userId=" + id ,
            success: function(result){
            if(result == "1"){
                $("a[data-userId='" + id + "']").html("Follow");
            } else if (result == "2")
              $("a[data-userId='" + id + "']").html("Unfollow");
            }
            
        });
        
    });
    
    $("#editProfile").click(function(){
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=editProfile",
            data: "email=" + $("#editEmail").val() + "&password=" +$("#editPassword").val() +  "&username=" +$("#editUsername").val() ,
            success: function(result){
                 if(result == "1"){
                    alert("Changes applied Successfully👍!");
                 }else{
                      alert("Something Went Wrong!");
                 }
            }
            
        });
        
       
    });
    
 

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          location.reload();
          

        }
      });
    })
  });
 
  $(".toggleProfile").click(function(){
            var id = $(this).attr("data-username")
           $.ajax({
            type: "POST",
            url: "profile.php?action=toggleProfile",
            data: "username=" + id ,
            success: function(result){
            
            }
        });
        
    });


 
$("#search").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "actions.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
            console.log(response);
            var arra=[];
            var pusher = response.split(",");
               if(pusher.length>1){
               for(var i=0;i<pusher.length;i++){
                    arra.push(pusher[i]);
               }
               }else {
                   arra.push(pusher[0]);
               }
            $( "#search" ).autocomplete({
               source: arra
            });
        },
      });
    } else {
      $("#show-list").html("");
    }
  });

        
    
      
  
    
</script>

    

 </body>
</html>