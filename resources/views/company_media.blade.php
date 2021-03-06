@extends('layout')

@section('content')
    <div class="site-section bg-light">
      <div class="container">
<div class="row">
          <div class="col-md-12">

            <div class="company-profile">
                <!-- header company profile -->
              <div class="profile-header">

                <img class="header" src="{{url('public/'.Storage::url($company->header))}}"> 
                <!-- profile picture company -->
                <div class="image-container">
                  <img src="{{url('public/'.Storage::url($company->logo))}}">
                </div>
              </div>



              @if($company->subscription == 0)
              <div class="profile-content mt-3">
              <h2>{{$company->name}}</h2>
                <p class="description">{{$company->description}}</p>
              </div>
              @else
              <div class="profile-content mt-3">
              <h2>{{$company->name}}</h2>
                <p class="description">{{$company->description}}</p>
                <p>
                <a target="_blank" href="{{$company->website}}"><span class="icon-paperclip mr-2 text-primary"></span>{{$company->website}}</a>
                </p>
                <p>
                  @foreach ($company->address as $address)
                    <span class="mr-5 text-secondary"><span class="icon-map-pin mr-2"></span>{{$address->city}}, {{$address->province}}</span>
                  @endforeach
                  <span class="mr-5 text-secondary"><span class="icon-clock-o mr-2"></span>{{$company->business_hour}}</span>
                  <span class="mr-5 text-secondary"><span class="icon-envelope mr-2"></span><a href="mailto:{{$company->email}}">{{$company->email}}</a></span>
                  <span class="text-secondary"><span class="icon-phone mr-2"></span>{{$company->phone}}</span>
                </p>
              </div>
              @endif

              
              <div class="profile-footer">
                <ul class="companynav mr-auto">
                  <li><a href="{{url('/')}}/company/{{$company->slug}}"><span>TIMELINE</span></a></li>
                  <li class="active"><a href="{{url('/')}}/company/{{$company->slug}}/media"><span>MEDIA/RESOURCE</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/product"><span>PRODUCTS</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/news"><span>NEWS</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/project"><span>PROJECT</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/about"><span>ABOUT</span></a></li>
                </ul>
              </div>

          </div>
        </div>
      </div>
      </div>

<!-- Media resource content starts here -->
      <div class="container company-content">
        <div class="row mb-3">
          <div class="col-md-12">
            <h4 class="contentsection">Media/Resources ({{$media->total()}})</h4>
          </div>
        </div>
        <div class="row">

            @foreach ($media as $m)
            <div class="col-md-12">
              <div class="d-block d-md-flex listing-horizontal h-option">
                <a href="{{url('/')}}/resource/{{$m->company->id}}/{{$m->slug}}" class="img d-block" style="background-image: url({{url('public/'.Storage::url($m->photo))}});"></a>
                <div class="lh-content">
                  {{-- <object><a href="#" class="bookmark"><span class="icon-heart"></span></a></object> --}}
                  <h3><object><a href="{{url('/')}}/resource/{{$m->company->id}}/{{$m->slug}}">{{$m->title}}</a></object></h3>
                  <p><object><a href="{{url('/')}}/company/{{$m->company->slug}}">{{$m->company->name}}</a></object></p>
                  <p>
                    <span class="icon-eye"></span>
                    <span class="pr-3">{{$m->view}} Views</span>
                    <span class="icon-download text-left"></span>
                    <span>{{$m->download}} Downloads</span>
                  </p>
                  <object><a href="{{url('/')}}/resource/{{$m->company->id}}/{{$m->slug}}">Open Details..</a></object>
                </div>
              </div>
            </div>
            @endforeach

            <div class="col-12 text-center mt-5">
              {{$media->links()}}
            </div>

        </div>

      </div>
      <!-- media resorce content ended here -->

<!-- modal add item -->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content p-4">
      <div class="modal-header">
        <h4>Add Item</h4>
      </div>
      <div class="modal-body">
        <form action="#">
              <div class="row">
                <div class="form-group col-md-12 mt-3 mb-md-0 files">
                  <label class="text-secondary">Upload Your Resource File </label>
                  <input type="file" class="form-control" multiple="" required="">
                </div>                
                <div class="form-group col-md-12 mt-3 mb-md-0">
                  <label class="text-secondary">Resource Image </label>
                  <input type="file" class="form-control" multiple="" required="">
                </div>
                <div class="form-group col-md-12 mt-3 mb-md-0">
                  <label class="text-secondary" for="#title">Media/Resouce Title</label>
                  <input type="text" id="title" class="form-control">
                </div>
                <div class="form-group col-md-12 mt-3 mb-md-0">
                  <label class="text-secondary" for="#author">Author</label>
                  <input type="text" id="author" class="form-control">
                </div>
                <div class="form-group col-md-12 mt-3 mb-md-0">
                  <label class="text-secondary" for="#desc">Description</label>
                  <textarea class="form-control" id="desc" rows="3"></textarea>
                </div>

              </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- modal add item -->

    </div>

<!-- modal edit profile -->
<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content p-4">
      <div class="modal-header">
        <h4>Edit Profile</h4>
      </div>
      <div class="modal-body">
        <form action="#">
          <div class="custom-files">
            <input class="custom-file-inputs" type="file"  id="upload_image" name="upload_image" accept="image/*">
            <div id="uploaded_image"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- modal edit profile -->

 

   

@endsection
