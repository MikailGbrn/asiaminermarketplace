@extends('layout')
    @section('content')
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="company-profile">

                <!-- header company profile -->
              <div class="profile-header">

                <img class="header" src="{{asset('assets/frontend/images/hero_1.jpg')}}"> 
                <!-- profile picture company -->
                <div class="image-container">
                  <img src="{{asset('assets/frontend/images/profile-logo.jpg')}}">
                </div>
              </div>



              <div class="profile-content">
              <h2>{{$company->name}}</h2>
                <p class="description">{{$company->description}}</p>
                <p>
                <a target="_blank" href="{{$company->website}}"><span class="icon-paperclip mr-2 text-primary"></span>{{$company->website}}</a>
                </p>
                <p>
                  @foreach ($company->address as $address)
                    <span class="mr-5 text-secondary"><span class="icon-map-pin mr-2"></span>{{$address->city}}, {{$address->province}}</span>
                  @endforeach
                  <span class="text-secondary"><span class="icon-clock-o mr-2"></span>{{$company->business_hour}}</span>
                </p>
                <p>
                  <span class="mr-5 text-secondary"><span class="icon-envelope mr-2"></span>{{$company->email}}</span>
                  <span class="text-secondary"><span class="icon-phone mr-2"></span>{{$company->phone}}</span>
                </p>
              </div>

              <div class="profile-footer" style="margin-top: 10px;">
                <ul class="companynav mr-auto">
                  <li  class="active"><a href="#"><span>TIMELINE</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/media"><span>MEDIA/RESOURCE</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/product"><span>PRODUCTS</span></a></li>
                  <li><a href=""><span>NEWS</span></a></li>
                  <li><a href=""><span>PROJECT</span></a></li>
                  <li><a href=""><span>ABOUT</span></a></li>
                </ul>
              </div>

            </div>

          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="card mb-4">
              <div class="card-header">
                <span>Media/Resources</span>
                <a href="#"><span>See All</span></a>
              </div>
              <div class="card-body grid-container">
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <span>Products</span>
                <a href="#"><span>See All</span></a>
              </div>
              <div class="card-body grid-container">

              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="card2">
              
            </div>
          </div>
        </div>

      </div>
    </div>
    @endsection

    