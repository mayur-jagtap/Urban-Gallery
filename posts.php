<div class="container-fluid " style="background-color: #4158D0;
background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
;
">
       <div class="row justify-content-center">
        <div class="col-sm-3 bg-light mt-4 px-4 p-2 rounded">

            <form method='post' action="" enctype="multipart/form-data" id="image_upload">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="images[]" class="custom-file-input" id="imagesad" multiple>
                        <label class="custom-file-label" for="imagesad">Choose File</label>
                    </div>
                </div>
               
                 <div class="form-group">
                <input type="submit" class="btn  btn-block" name="submit" value="Upload" style="background-color: #0093E9;
background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
">
                </div>
             
                <h5 class="text-center text-success" id="result"></h5>
            </form>
        </div>
    </div>


         <div class="row justify-content-center">
            <div class="col-lg-10 mt-4">
                <div class="row p-2">
                    <div class="masonry " id="image_preview"></div>
                </div>
            </div>
        </div>
      
      

</div>
        <!-- Modal -->

    

<script> 


  
     $("#imagesad").on('change',function(){
          var filename = $(this).val();
          $(".custom-file-label").html(filename);
          
      });
      
      
      
     $("#image_upload").submit(function(e){
          var filename = $("#imagesad").val()
          
          if(filename == ""){
              alert("Select a file");
              
          } else {
         
         
          e.preventDefault();
          $.ajax({
             url: 'insert.php',
             method: 'post',
             processData: false,
             contentType: false,
             cache: false,
             data: new FormData(this),
             success: function(response){
               
                 $("#result").html(response);
                 
                  load_images();
                    
             }
          });
          }
      });
 
       
      load_images();
  
      function load_images(){
      $.ajax({
      url: 'load.php',
      method: 'get',
      success: function(data){
      $("#image_preview").html(data);
      
      }
      
      
      });
      }
          
  
  
	



    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" integrity="sha512-C1zvdb9R55RAkl6xCLTPt+Wmcz6s+ccOvcr6G57lbm8M2fbgn2SUjUJbQ13fEyjuLViwe97uJvwa1EUf4F1Akw==" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      </body>
</html>
 