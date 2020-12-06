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
                  <label for="title">Product Name</label>
                  <input type="text" name="name" id="title" class="form-control" value="{{old('name')}}" placeholder="Add Product Name">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="tags">Product Description</label>
                  <textarea name="description" class="form-control">{{old('title')}}</textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12 mb-3">   
                  <label class="ml-2">Upload Product Image </label>
                  <input type="file" name="foto" id="mediapic" class="form-control" accept="image/*" onchange="editPdct();">
                  <div id="resource-container" class="mt-3">
                    <img id="image-preview" alt="image-preview"/>
                  </div>
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
