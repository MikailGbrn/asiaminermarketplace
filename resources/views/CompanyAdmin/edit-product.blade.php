@extends('CompanyAdmin.layout')
@section('content')
<div class="site-section bg-light">
  <div class="container mt-3">
    <div class="row mb-3">
      <div class="col-md-6">
        <a href="{{url('/')}}/company-profile/product"><span class="icon-arrow-left mr-3"></span>Go Back to Dashboard</a>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-12">
        <h2><b>Edit Product</b></h2>
        <h6 class="mb-3">Edit your existing Product of your company</h6>
        <div class="card">
          <div class="card-header">
            <h2 class="text-center h4">Product Information</h2>
          </div> 
          <div class="card-body">
            @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('error')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{$error}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endforeach
            @endif
            @if($product->status == 0)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>This content has been taken down by the admin due to inappropriate content, Please contact for more detail</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif            
            <form action="{{ url('/company-profile/product')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <input type="hidden" name="id" value="{{$product->id}}">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="title" class="text-black"><span class="icon-minus mr-3 ml-1"></span>Product Name</label>
                  <input type="text" name="name" id="title" class="form-control" placeholder="Add Product Name" value="{{old('name') ? old('name') : $product->name}}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="tags" class="text-black"><span class="icon-minus mr-3 ml-1"></span>Product Description</label>
                  <textarea name="description" class="form-control">{{old('description') ? old('description') : $product->description}}</textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                  <label for="photo" class="text-black"><span class="icon-play-circle mr-3 ml-1"></span>Embed Video</label>
                  <input type="text" name="video" id="video" class="form-control" value="{{$product->embedvid}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="tags" class="text-black"><span class="icon-minus mr-3 ml-1"></span>Product Categories</label>
                  <select name="catagory[]" class="selectpicker form-control" data-live-search="true" multiple>
                    @foreach ($catagory as $c)
                    <option value="{{$c->id}}" @if(in_array($c->id, $product->category->pluck('id')->toArray())) selected @endif>{{$c->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-row">
                <label class="ml-2 text-black"><span class="icon-image mr-3 ml-1"></span>Product Page Cover</label>
                <div class="form-group col-md-12 mb-3">   
                  <input type="file" name="foto" id="mediapic" class="form-control" accept="image/*" onchange="editPdct();">
                  <div id="resource-container" class="mt-3">
                    <img id="image-preview" alt="image-preview"/>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                </div>
                <div class="form-group col-md-6" >
                  <button type="submit" class="btn btn-primary ml-3 first" style="float: right;">Save Change</button>
                  <a href="dashboardproduct.html" type="button" class="btn btn-secondary" style="float: right;">Cancel</a>
                </div>
              </div>
            </form>            
          </div>
        </div>

        <script type="text/javascript">

          document.querySelector(".first").addEventListener('click', function(){
            swal("Our First Alert");
          });

          // $('#submitedit').on('click',function(e){
          //     e.preventDefault();
          //     var form = $(this).parents('form');
          //     swal({
          //         title: "Are you sure?",
          //         text: "You will not be able to recover this imaginary file!",
          //         type: "warning",
          //         showCancelButton: true,
          //         confirmButtonColor: "#DD6B55",
          //         confirmButtonText: "Yes, delete it!",
          //         closeOnConfirm: false
          //     }, function(isConfirm){
          //         if (isConfirm) form.submit();
          //     });
          // });

        </script>

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2 class="text-center h4">Product Image(s)</h2>
          </div>
          <div class="card-body">
            <h6 class="text-black"><span class="icon-minus mr-3 ml-1"></span>Existing Product Image</h6>
            <form method="POST" action="{{ url('/company-profile/product/delpic')}}">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                @if($picture)
                <div id="image_preview">
                @foreach($picture as $p)
                  <span>
                    <input type="hidden" name="id" value="{{$p->id}}">
                    <button style="border:0px; color:red" type="submit" ><span class="icon-trash" style="color: red;"></span></button>
                    <img src="{{url('public/'.Storage::url($p->photo))}}">
                  </span>
                @endforeach
                </div>
                @endif
                </div>
              </div>
            </form>
            <form method="post" action="{{ url('/company-profile/product/addpic')}}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$product->id}}">
              <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                  <label for="photo" class="text-black"><span class="icon-image mr-3 ml-1"></span>Product Image Upload (multiple files allowed)</label>
                  <input type="file" name="photo[]" id="photo" class="form-control" accept="image/*" onchange="preview_image();" multiple>
                <div id="image_preview"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                </div>
                <div class="form-group col-md-6" >
                  <button type="submit" class="btn btn-primary ml-3 first" style="float: right;">Save Change</button>
                  <a href="dashboardproduct.html" type="button" class="btn btn-secondary" style="float: right;">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('jsplus')

<script>
    function preview_image() 
    {
     var total_file=document.getElementById("photo").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append("<span><img src='"+URL.createObjectURL(event.target.files[i])+"'></span>");
     }
    }
</script>

<script>
$(document).ready(function(){
  $("form").submit(function(){
swal({
      title: "Product Data Updated",
      text: "You have successfully update your existing product data",
      icon: "success",
      button: "ok", });
  });
});
</script>
@endsection
