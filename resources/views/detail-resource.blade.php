@extends('layout')
    @section('content')
    <div class="site-section">
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
                  <span>{{$resource->keyword}}</span>
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
      <div class="col-md-8">
        <h3>Related Resources</h3>
        @foreach ($relatedMedia as $r)
        <div class="d-block d-md-flex listing-horizontal h-option">

          <a href="resource/{{$r->company->id}}/{{$r->slug}}" class="img d-block" style="background-image: url({{url('public/'.Storage::url($r->photo))}});">
            {{-- <span class="category">Sample Category</span> --}}
          </a>

          <div class="lh-content">
            <object><a href="#" class="bookmark"><span class="icon-heart"></span></a></object>
            <h3><object><a href="{{url('/')}}/resource/{{$r->company->id}}/{{$r->slug}}">{{$r->title}}</a></object></h3>
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
  @endsection

  