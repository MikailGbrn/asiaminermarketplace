<html>  
    <head>  
        <title>Make Price Range Slider using JQuery with PHP Ajax</title>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
          <script src="js/jquery-3.3.1.min.js"></script>  
          <script src="js/bootstrap.min.js"></script>
          <script src="croppie/croppie.js"></script>
          <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
          <link rel="stylesheet" href="croppie/croppie.css" />
          <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>  
    <body>  
        <div class="container">
            <h3 align="center">Image Crop & Upload using JQuery with PHP Ajax</h3>
            <div class="panel panel-default">
                <div class="panel-heading">Select Profile Image</div>
                <div class="panel-body" align="center">
                    <form>
<!--                     <div class="col-md-4" class="custom-file" style="width: 300px; height: 300px;">
                        <input class="text-white custom-file-input" type="file" name="upload_image" id="upload_image" accept="image/*" />
                        <div id="uploaded_image"></div> -->
                        <div class="custom-files mb-3">
                          <input class="custom-file-inputs" type="file"  id="upload_image" name="upload_image" accept="image/*">
                          <!-- <label class="custom-file-label text-left" for="customFile">Choose file</label> -->
                          <div id="uploaded_image"></div>
                        </div>
                      </form>
                    </div>
                    
                </div>
            </div>
    </body>  
</html>

<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header" >
            <h4 class="modal-title">Upload & Crop Image</h4>
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <div class="modal-body" style="padding: 70px;">
          <div class="row">
       <div class="col-md-12 text-center">
        <div id="image_demo"></div>
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

<script>  
$(document).ready(function(){

 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:300,
      height:300,
      type:'circle' //circle
    },
    boundary:{
      width:400,
      height:400
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
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>