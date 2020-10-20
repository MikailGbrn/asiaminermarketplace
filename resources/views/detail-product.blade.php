@extends('layout')
    @section('content')
    <div class="site-section">
      <div class="container mt-5">
         <div class="row">
            <div class="col-md-12">

        

          <div class=" d-md-flex detail-content container">


              <img src="{{url('public/'.Storage::url($product->photo))}}">
              <div class="lh-content">
                <h3 class="h1">{{$product->name}}</h3>
                <p class="mb-0">By: <a href="#">{{$product->company->name}}</a></p>
                <p style="margin-top: 10px;">
                  @guest
                  <a data-toggle="modal" data-target="#signin" class="btn btn-primary text-white">Download</a>
                  @else
                  <a href="{{url("/download-resource/$resource->uuid")}}" class="btn btn-primary text-white">Download</a>
                  @endguest
                </p>
                <p>
                  <span class="icon-eye"></span>
                  <span>Views: {{$product->view}}</span>
                </p>
                <p>
                  <span id="dots">{{$product->description}}</span>

                  <span id="more">{{$product->description}}</span>
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
        <h3>Related Product</h3>
        @foreach ($relatedProduct as $r)
        <div class="d-block d-md-flex listing-horizontal h-option">

          <a href="{{url('/')}}/product/{{$r->company->id}}/{{$r->slug}}" class="img d-block" style="background-image: url(assets/frontend/images/img_2.jpg);">
            {{-- <span class="category">Sample Category</span> --}}
          </a>

          <div class="lh-content">
            <object><a href="#" class="bookmark"><span class="icon-heart"></span></a></object>
            <h3><object><a href="{{url('/')}}/product/{{$r->company->id}}/{{$r->slug}}">{{$r->name}}</a></object></h3>
            <p><object><a href="{{url('/')}}/company/{{$r->company->slug}}">{{$r->company->name}}</a></object></p>
            <p>
              <span class="icon-eye"></span>
              <span class="pr-3">{{$r->view}}</span>
            </p>
            <object><a href="{{url('/')}}/product/{{$r->company->id}}/{{$r->slug}}">Open Details..</a></object>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endsection

  