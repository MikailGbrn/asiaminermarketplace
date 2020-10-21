// Croppie Profile Picture
$(document).ready(function(){

 $image_crop = $('#profile_image').croppie({
    enableExif: true,
    viewport: {
      width:800,
      height:300,
      type:'square' //circle
    },
    boundary:{
      width:900,
      height:900
    }
  });
  // document.getElementById('#editprofile')style.overflowY = "scroll";

  $('#upload_profile_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#editprofile').modal('hide');
    $('#uploadprofileimageModal').modal('show');
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
          $('#uploadprofileimageModal').modal('hide');
          $('#editprofile').modal('show');
          $('#uploaded_image').html(data);

        }
      });
    })
  });

});  
// END OF Croppie Profile Picture

// Croppie Profile header
// $(document).ready(function(){

//  $image_crop = $('#header_image').croppie({
//     enableExif: true,
//     viewport: {
//       width:800,
//       height:640,
//       type:'square' //circle
//     },
//     boundary:{
//       width:1000,
//       height:720
//     }
//   });

//   $('#upload_header_image').on('change', function(){
//     var reader = new FileReader();
//     reader.onload = function (event) {
//       $image_crop.croppie('bind', {
//         url: event.target.result
//       }).then(function(){
//         console.log('jQuery bind complete');
//       });
//     }
//     reader.readAsDataURL(this.files[0]);
//     $('#uploadheaderimageModal').modal('show');
//   });

//   $('.crop_image').click(function(event){
//     $image_crop.croppie('result', {
//       type: 'canvas',
//       size: 'viewport'
//     }).then(function(response){
//       $.ajax({
//         url:"",
//         type: "POST",
//         data:{"image": response},
//         success:function(data)
//         {
//           $('#uploadheaderimageModal').modal('hide');
//           $('#uploaded_image').html(data);
//         }
//       });
//     })
//   });

// });  
// END OF Croppie Profile Picture