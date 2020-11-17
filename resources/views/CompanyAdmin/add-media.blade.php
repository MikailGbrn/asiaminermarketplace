@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <a href="{{url('/')}}/company-profile/media"><span class="icon-arrow-left mr-3 mb-3"></span>Go Back to Dashboard</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="text-center h4">Add Media Resource Title</h2>
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
              </div>
              <div class="card-body">
                <form method="post" action="{{url('/company-profile/media')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="title">Media Resource Title</label>
                      <input type="text" name="title" id="title" class="form-control" >
                    </div>
                    <div class="form-group col-md-6">
                      <label for="author">Author</label>
                      <input type="text" name="author" id="author" class="form-control">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="tags">Keyword</label>
                      <input type="text" name="keyword" id="tags" class="form-control">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="tags">Description</label>
                      <textarea name="description" class="form-control"></textarea>
                    </div>
                  </div>
                  {{-- <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="tags">catagory</label>
                      <select name="content_type" class="form-control">
                        <option value="">select catagory</option>
                        <option value=""></option>
                      </select>
                    </div> 
                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="tags">Resource Type</label>
                      <select name="type" class="form-control">
                        <option value="">select catagory</option>
                        <option value="mining"></option>
                      </select>
                    </div>
                  </div> --}}
                  <div class="form-row mt-2">
                    <div class="form-group col-md-5 mb-3">
                      <label for="photo"><span class="icon-image mr-3"></span>Upload Media Resource Image </label>
                      <input type="file" name="photo" id="photo" class="form-control" accept="image/*" onchange="editRsc();">
                      <div id="resource-container" class="mt-3">
                        <img id="image-preview" alt="image-preview"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="form-group col-md-5">
                      <label for="media"> <span class="icon-file mr-3"></span>Upload Media Resource File</label>
                      <input type="file" name="media" id="media" class="form-control">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                    </div>
                    <div class="form-group col-md-6" >
                      <button type="submit" class="btn btn-primary ml-3" style="float: right;">Save Changes</button>
                      <a href="dashboardmedia.html" type="button" class="btn btn-secondary" style="float: right;">Cancel</a>
                    </div>
                  </div>
                </form>                
              </div>
            </div>
            

<!--             <h2>Edit Media Resource Title</h2>
            <div class=" d-md-flex detail-content container mt-5">
              <img src="images/img_1.jpg">
              <div class="lh-content">
                <object><a href="#" class="bookmark"><span class="icon-edit"></span></a></object>
                <object><a href="#" class="delete"><span class="icon-trash"></span></a></object>
                <h3 class="h1">Media Resource Title</h3>
                <p class="mb-0">By: <a href="#">Company Name</a></p>
                <p>Author: <a href="#">John Doe</a></p>
                <p class="tag">
                  <span>Tag 1</span>
                  <span>Tag 2</span>
                </p>
                <p>
                  <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                </p>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    
@endsection