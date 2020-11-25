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
                @if($media->status == 0)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>This content has been taken down by the admin due to inappropriate content, Please contact for more detail</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
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
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title') ? old('title') : $media->title}}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="author">Author</label>
                        <input type="text" name="author" id="author" class="form-control" value="{{old('author') ? old('author') : $media->author}}">
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
                        <textarea name="description" class="form-control">{{old('description') ? old('description') : $media->description}}</textarea>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="tags">Media Type</label>
                        <select name="media_type" class="selectpicker form-control" id="type">
                          <option @if(old('media_type') == "Another Link" || $media->type == "Another Link") selected @endif selected disabled value="">Select Media Type</option>
                          <option @if(old('media_type') == "Audio" || $media->type == "Audio") selected @endif value="Audio">Audio</option>
                          <option @if(old('media_type') == "Catalogue" || $media->type == "Catalogue") selected @endif value="Catalogue">Catalogue</option>
                          <option @if(old('media_type') == "E-Book" || $media->type == "E-Book") selected @endif value="E-Book">E-Book</option>
                          <option @if(old('media_type') == "Image" || $media->type == "Image") selected @endif value="Image">Image</option>
                          <option @if(old('media_type') == "Power Point" || $media->type == "Power Point") selected @endif value="Power Point">Power Point</option>
                          <option @if(old('media_type') == "Case Study" || $media->type == "Case Study") selected @endif value="Case Study">Case Study</option>
                          <option @if(old('media_type') == "Youtube Video" || $media->type == "Youtube Video") selected @endif value="Youtube Video">Youtube Video</option>
                          <option @if(old('media_type') == "Another Link" || $media->type == "Another Link") selected @endif value="Another Link">Another Link</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row linkk" style="display:none;">
                      <div class="form-group col-md-12">
                        <label for="tags">Link</label>
                        <input type="text" name="link" value="{{old('link') ? old('link') : $media->link}}" id="link"class="form-control">
                      </div>
                    </div>
                    <div class="form-row mt-2">
                      <div class="form-group col-md-5 mb-3">
                        <label for="foto"><span class="icon-image mr-3"></span>Upload Media/Resource Image </label>
                        <p><small>*Max image size 1 mb; Ideal image aspect ratio 1:1 .jpg format</small></p>
                        <input type="file" name="photo" id="foto" class="form-control" accept="image/*" onchange="editRsc();">
                        <div id="resource-container" class="mt-3">
                          <img id="image-preview" alt="image-preview"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-row mt-2 filenya">
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
    </div>
    
@endsection

@section('jsplus')
<script>
  $('#type').change(function() {
    if ($(this).val() === 'Youtube Video' || $(this).val() === 'Another Link') {
      $(".linkk").css("display","block");
      $(".filenya").css("display","none");
    }else{
      $(".filenya").css("display","block");
      $(".linkk").css("display","none");
    }
});
$( document ).ready(function() {
  if ($('#type').val() === 'Youtube Video' || $('#type').val() === 'Another Link') {
      $(".linkk").css("display","block");
      $(".filenya").css("display","none");
    }else{
      $(".linkk").css("display","none");
      $(".filenya").css("display","block");
    }
});
</script>
@endsection