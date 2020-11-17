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
                      <label for="tags">Media Catagory</label>
                      <select name="catagory[]" class="selectpicker form-control" data-live-search="true" multiple>
                        @foreach ($catagory as $c)
                        <option value="{{ $c->id}}">{{$c->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
    
      
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="tags">Description</label>
                      <textarea name="description" class="form-control"></textarea>
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
                    <div class="form-group col-md-6 mb-3">
                      <label for="photo"><span class="icon-image mr-3"></span>Upload Media Resource Image </label>
                      <input type="file" name="photo" id="photo" class="form-control" accept="image/*" onchange="editRsc();">
                      <div id="resource-container" class="mt-3">
                        <img id="image-preview" alt="image-preview"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                      <label for="media"> <span class="icon-file mr-3"></span>Upload Media Resource File</label>
                      <input type="file" name="media" id="media" class="form-control">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                    </div>
                    <div class="form-group col-md-6" >
                      <button type="submit" class="btn btn-primary ml-3" style="float: right;">Save Changes</button>
                      <a href="{{url('/')}}/company-profile/media" type="button" class="btn btn-secondary" style="float: right;">Cancel</a>
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