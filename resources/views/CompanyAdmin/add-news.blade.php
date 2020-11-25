@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <a href="{{url('/')}}/company-profile/news"><span class="icon-arrow-left mr-3"></span>Go Back to Dashboard</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2>Add New News</h2>
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
              <div class="card-header">
                <h2 class="text-center h4">Add New News</h2>
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
                <form action="{{ url('/company-profile/news')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="newstitle">News Title</label>
                      <input type="text" name="title" id="newstitle" class="form-control" value="{{old('title')}}" placeholder="Add news title">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="author">Author</label>
                      <input type="text" name="author" id="author" class="form-control" value="{{old('author')}}" placeholder="Add author">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="newslocation">News Location</label>
                      <input type="text" name="location" id="newslocation" class="form-control" value="{{old('location')}}" placeholder="Jakarta, Indonesia">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6 mb-3">
                      <label for="photo"><span class="icon-image mr-3 ml-1"></span>Headline Image Upload </label>
                      <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="newslocation">Topic</label>
                      <input type="text" name="topic" id="newslocation" class="form-control" placeholder="Mining, coal" value="{{old('topic')}}">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="abstract">News' Abstract</label>
                      <textarea class="form-control" name="abstract" id="abstract" rows="3">{{old('abstract')}}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="newsbody">News Body</label>
                      <textarea name="description" id="newsbody" rows="4" class="">{{old('description')}}</textarea>
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