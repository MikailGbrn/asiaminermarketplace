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
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/media"><span>MEDIA/RESOURCE</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/product"><span>PRODUCTS</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/news"><span>NEWS</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/project"><span>PROJECT</span></a></li>
                  <li class="active"><a href="{{url('/')}}/company/{{$company->slug}}/about"><span>ABOUT</span></a></li>
                </ul>
              </div>

          </div>
        </div>
        </div>
      </div>
      <div class="container company-content">

        <!-- start of content header -->
        <div class="row mb-3">
          <div class="col-md-12">
            <h4 class="contentsection">About {{$company->name}}</h4>
          </div>
        </div>
        <!-- end of content header -->
  
        <!-- start of content -->
        <div class="row">
  
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  @php
                  echo $company->about;
                  @endphp
                </div>
              </div>
            </div>
          </div>
  
        </div>
        <!-- end of content -->
  
      </div>
      <!-- media resorce content ended here -->





    </div>

 

   

@endsection
