@extends('layout')
    @section('content')
    <div class="site-section bg-light">
      <div class="container mt-5">
         <div class="row">
            <div class="col-md-12">

        

          <div class=" d-md-flex detail-content container">


              <img src="{{url('public/'.Storage::url($resource->photo))}}">
              <div class="lh-content">
                <h3 class="h1">{{$resource->title}}</h3>
                <p class="mb-0">By: <a href="#">{{$resource->company->name}}</a></p>
                <p>Author: <a href="#">{{$resource->author}}</a></p>
                <p class="tag">
                  {{-- @if($m->category) --}}
                  @foreach ($resource->catagory as $c)
                  <span>{{$c->name}}</span>
                  @endforeach
                </p>
                <p>
                  @guest
                  <a data-toggle="modal" data-target="#signin" class="btn btn-primary text-white">Download</a>
                  @else
                  <a href="{{url("/download-resource/$resource->uuid")}}" class="btn btn-primary text-white">Download</a>
                  @endguest
                </p>
                <p>
                  <span class="icon-download text-left"></span>
                  <span class="mr-4">Downloads: {{$resource->download}}</span>
                  <span class="icon-eye"></span>
                  <span>Views: {{$resource->view}}</span>
                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                  <a class="a2a_button_facebook"></a>
                  <a class="a2a_button_twitter"></a>
                  <a class="a2a_button_google_gmail"></a>
                  <a class="a2a_button_linkedin"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
<!--                   <a href="" data-toggle="modal" style="margin-left:20px" data-target="#exampleModal">
                    <span> <i class="fa fa-share" aria-hidden="true"></i></span>
                    <span>Share</span>
                  </a> -->
                </p>
                
                <p>
                  <span id="dots">{{$resource->description}}</span>

                  <span id="more">{{$resource->description}}</span>
                  <p style="padding: 1rem; text-align: center;"><button onclick="myFunction()" id="morebtn">Read More</button></p>
                </p>
              </div>


          
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h3>Related Resources</h3>
        @foreach ($relatedMedia as $r)
        <div class="d-block d-md-flex listing-horizontal h-option">

          <a href="resource/{{$r->company->id}}/{{$r->slug}}" class="img d-block" style="background-image: url({{url('public/'.Storage::url($r->photo))}});">
            {{-- <span class="category">Sample Category</span> --}}
          </a>

          <div class="lh-content contents">
            <object><a href="#" class="bookmark"><span class="icon-heart"></span></a></object>
            <h3 class="title"><object><a href="{{url('/')}}/resource/{{$r->company->id}}/{{$r->slug}}" >{{$r->title}}</a></object></h3>
            <p><object><a href="{{url('/')}}/company/{{$r->company->slug}}">{{$r->company->name}}</a></object></p>
            <p>
              <span class="icon-eye"></span>
              <span class="pr-3">{{$r->view}}</span>
              <span class="icon-download text-left"></span>
              <span>{{$r->download}} Downloads</span>
            </p>
            <object><a href="{{url('/')}}/resource/{{$r->company->id}}/{{$r->slug}}">Open Details..</a></object>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Share</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <a href="https://wa.me/?text={{url()->full()}}%0D%0A%2A{{$resource->title}}%2A" target="_blank"><i class="fa fa-whatsapp fa-3x" style="color:#25d366; margin-right: 10px" aria-hidden="true"></i></a>
          <a href="https://twitter.com/intent/tweet?text={{$resource->title}}&url={{url()->full()}}" target="_blank"><i class="fa fa-twitter-square fa-3x" style="color:#1DA1F2; margin-right: 10px" aria-hidden="true"></i></a>
          <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" target="_blank"><i class="fa fa-facebook-square fa-3x" style="color:#3b5998; margin-right: 10px" aria-hidden="true"></i></a>
          <a href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->full()}}" target="_blank"><i class="fa fa-linkedin-square fa-3x" style="color:#0072b1; margin-right: 10px" aria-hidden="true"></i></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endsection

  