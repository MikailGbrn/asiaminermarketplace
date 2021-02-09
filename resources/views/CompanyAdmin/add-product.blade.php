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
        <h2><b>Add Product</b></h2>
        <h6 class="mb-3">Add Product of your company to company page</h6>
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Product Information</h4>
          </div>
          <div class="card-body">
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
            <form action="{{ url('/company-profile/product')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="title" class="text-black"><span class="icon-minus mr-3 ml-1"></span>Product Name</label>
                  <input type="text" name="name" id="title" class="form-control" value="{{old('name')}}" placeholder="Add Product Name">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="tags" class="text-black"><span class="icon-minus mr-3 ml-1"></span>Product Categories</label>
                  <select name="catagory[]" class="selectpicker form-control" data-live-search="true" multiple>
                    @foreach ($catagory as $c)
                    <option @if(in_array($c->id, old('catagory') ? old('catagory') : [])) selected @endif value="{{ $c->id}}">{{$c->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="tags" class="text-black"><span class="icon-minus mr-3 ml-1"></span>Product Description</label>
                  <textarea name="description" class="form-control">{{old('title')}}</textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6 mb-3">
                  <label for="photo"><span class="icon-play-circle mr-3 ml-1"></span>Embed Video</label>
                  <input type="text" name="video" id="video" class="form-control" accept="image/*" multiple>
                </div>
                <div class="form-group col-md-6">
                  <label for="tags" class="text-black"><span class="icon-minus mr-3 ml-1"></span>Product Categories</label>
                  <select name="catagory[]" class="selectpicker form-control" data-live-search="true" multiple>
                    @foreach ($catagory as $c)
                    <option @if(in_array($c->id, old('catagory') ? old('catagory') : [])) selected @endif value="{{ $c->id}}">{{$c->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="form-group col-md-6 mb-3">   
                  <label class="ml-2 text-black"><span class="icon-image mr-3 ml-1"></span>Product Page Cover </label>
                  <input type="file" name="foto" id="mediapic" class="form-control" accept="image/*" onchange="editPdct();">
                  <div id="resource-container" class="mt-3">
                    <img id="image-preview" alt="image-preview"/>
                  </div>
                </div>
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
                  <button type="submit" class="btn btn-primary ml-5" style="float: right;">Add Product</button>
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
      title: "Product Added",
      text: "You have successfully add your new product data",
      icon: "success",
      button: "ok", });
  });
});
</script>
@endsection
