@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <a href="{{url('/')}}/company-profile/news"><span class="icon-arrow-left mr-3"></span>Go Back to Dashboard</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2>Edit News</h2>
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
                <form action="{{ url('/company-profile/news')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <input type="hidden" name="id" value="{{$news->id}}">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="newstitle">News Title</label>
                      <input type="text" name="title" id="newstitle" class="form-control" placeholder="Add news title" value="{{old('title') ? old('title') : $news->title}}">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="author">Author</label>
                      <input type="text" name="author" id="author" class="form-control" placeholder="Add author" value="{{old('author') ? old('author') : $news->author}}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="newslocation">News Location</label>
                      <input type="text" name="location" id="newslocation" class="form-control" placeholder="Jakarta, Indonesia" value="{{old('location') ? old('location') : $news->location}}">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6 mb-3">
                      <label for="photo"><span class="icon-image mr-3 ml-1"></span>Headline Image Upload </label>
                      <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="newslocation">Topic</label>
                      <input type="text" name="topic" id="newslocation" class="form-control" placeholder="Mining, coal" value="{{old('topic') ? old('topic') : $news->topic}}">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="abstract">News' Abstract</label>
                      <textarea class="form-control" name="abstract" id="abstract" rows="3">{{old('abstract') ? old('abstract') : $news->abstract}}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="newsbody">News Body</label>
                      <textarea name="description" id="newsbody" rows="4" class="">{{old('description') ? old('description') : $news->description}}</textarea>
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