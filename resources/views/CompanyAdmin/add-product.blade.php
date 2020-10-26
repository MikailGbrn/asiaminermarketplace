@extends('CompanyAdmin.layout')
@section('content')
<div class="site-section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <a href="dashboardproduct.html"><span class="icon-arrow-left mr-3"></span>Go Back to Dashboard</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2>Add Product</h2>
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
              <input type="text" name="name" id="title" class="form-control" placeholder="Add Product Name">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="tags">Description</label>
              <textarea name="description" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-row">
            <label class="ml-2">Upload Product Image </label>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 mb-3">   
              <input type="file" name="foto" id="mediapic" class="form-control" accept="image/*">
  
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
@endsection
