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
          </div> 
          <div class="card-body">
            <form action="{{ url('/company-profile/product')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <input type="hidden" name="id" value="{{$product->id}}">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="title">Product Name</label>
                  <input type="text" name="name" id="title" class="form-control" placeholder="Add Product Name" value="{{old('name') ? old('name') : $product->name}}">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="tags">Product Description</label>
                  <textarea name="description" class="form-control">{{old('description') ? old('description') : $product->description}}</textarea>
                </div>
              </div>
              <div class="form-row">
                <label class="ml-2">Upload Product Imagee </label>
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
  </div>
</div>
@endsection
