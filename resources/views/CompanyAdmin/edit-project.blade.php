@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <a href="{{url('/')}}/company-profile/project"><span class="icon-arrow-left mr-3"></span>Go Back to Dashboard</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2>Edit Project</h2>
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
            <div class="card mt-4">
              
              <div class="card-body"> 
                <form action="{{ url('/company-profile/project')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <input type="hidden" name="id" value="{{$project->id}}">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="newstitle">Project Title</label>
                      <input type="text" name="title" id="newstitle" class="form-control" placeholder="Add project title" value="{{$project->title}}">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="author">Author</label>
                      <input type="text" name="author" id="author" class="form-control" placeholder="Add author" value="{{$project->author}}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="newslocation">Project Location</label>
                      <input type="text" name="location" id="newslocation" class="form-control" placeholder="Jakarta, Indonesia" value="{{$project->location}}">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12 mb-3">
                      <label for="photo"><span class="icon-image mr-3 ml-1"></span>Headline Image Upload (multiple files allowed)</label>
                      <input type="file" name="photo[]" id="photo" class="form-control" accept="image/*" multiple>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="newsbody">Project Body</label>
                      <textarea name="description" id="newsbody" rows="4">{{$project->description}}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                    </div>
                    <div class="form-group col-md-6" >
                      <button type="submit" class="btn btn-primary ml-5" style="float: right;">Save Changes</button>
                      <a href="{{url('/')}}/company-profile/news" type="button" class="btn btn-secondary" style="float: right;">Cancel</a>
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