@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container mt-3">
        <div class="row mb-3">
          <div class="col-md-6">
            <a href="{{url('/')}}/company-profile/media"><span class="icon-arrow-left mr-3"></span>Go Back to Dashboard</a>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-12">
            <h2><b>Edit Media/Resource</b></h2>
            <h6 class="mb-3">Edit your existing Media/Resouce for your company</h6>
            <div class="card">
              <div class="card-header">
               <h2 class="text-center h4">Media/Resource Information</h2>
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
                    @method('put')
                  <input type="hidden" name="id" value="{{$media->id}}">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="title">Media/Resource Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$media->title}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="author">Author</label>
                        <input type="text" name="author" id="author" class="form-control" value="{{$media->author}}">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="tags">Media Categories</label>
                        <select name="catagory[]" class="selectpicker form-control" data-live-search="true" multiple>
                          @foreach ($catagory as $c)
                          <option value="{{$c->id}}" @if(in_array($c->id, $media->catagory->pluck('id')->toArray())) selected @endif>{{$c->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="tags">Media/Resource Description</label>
                        <textarea name="description" class="form-control">{{$media->description}}</textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="tags">Media Type</label>
                        <select name="media_type" class="selectpicker form-control">
                          <option selected disabled value="">Select Media Type</option>
                          <option value="Audio">Audio</option>
                          <option value="Catalogue">Catalogue</option>
                          <option value="E-Book">E-Book</option>
                          <option value="Image">Image</option>
                          <option value="Power Point">Power Point</option>
                          <option value="Case Study">Case Study</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row mt-2">
                      <div class="form-group col-md-5 mb-3">
                        <label for="foto"><span class="icon-image mr-3"></span>Upload Media/Resource Image </label>
                        <input type="file" name="photo" id="foto" class="form-control" accept="image/*" onchange="editRsc();">
                        <div id="resource-container" class="mt-3">
                          <img id="image-preview" alt="image-preview"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-row mt-2">
                      <div class="form-group col-md-5">
                        <label for="media"> <span class="icon-file mr-3"></span>Upload Media/Resource File</label>
                        <input type="file" name="media" id="media" class="form-control">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                      </div>
                      <div class="form-group col-md-6" >
                        <button type="submit" class="btn btn-primary ml-5" style="float: right;">Update Media/Resource</button>
                        <a href="dashboardmedia.html" type="button" class="btn btn-secondary" style="float: right;">Cancel</a>
                      </div>
                    </div>
                  </form>
              </div>
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