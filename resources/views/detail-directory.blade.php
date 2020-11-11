@extends('layout')
    @section('content')
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="company-profile mt-5">

                <!-- header company profile -->
              <div class="profile-header">

                <img class="header" src="{{url('public/'.Storage::url($company->header))}}"> 
                <!-- profile picture company -->
                <div style="margin-top:15px" class="image-container">
                  <img style="object-position:0px 0px" src="{{url('public/'.Storage::url($company->logo))}}">
                </div>
              </div>



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
                  <span class="mr-5 text-secondary"><span class="icon-envelope mr-2"></span>{{$company->email}}</span>
                  <span class="text-secondary"><span class="icon-phone mr-2"></span>{{$company->phone}}</span>
                </p>
              </div>

              
              <div class="profile-footer">
                <ul class="companynav mr-auto">
                  <li class="active"><a href="{{url('/')}}/company/{{$company->slug}}"><span>TIMELINE</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/media"><span>MEDIA/RESOURCE</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/product"><span>PRODUCTS</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/news"><span>NEWS</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/project"><span>PROJECT</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/about"><span>ABOUT</span></a></li>
                </ul>
              </div>

          </div>
        </div>
      </div>

      <div class="container mt-5">
        <div class="row">
          <div class="col-md-5">
            <div class="card mb-4">
              <div class="card-header">
                <span>Media/Resources</span>
                <a href="{{url('/')}}/company/{{$company->slug}}/media"><span>See All</span></a>
              </div>
              <div class="card-body grid-container">
                @foreach ($media as $m)
                <span class="img-container grid-item">
                  <a href="{{url('/resource/').'/'.$company->id.'/'.$m->slug}}">
                    <img src="{{url('public/'.Storage::url($m->photo))}}">
                  </a>
                </span>
                @endforeach
              </div>
            </div>

            <div class="card mb-4">
              <div class="card-header">
                <span>Products</span>
                <a href="{{url('/')}}/company/{{$company->slug}}/product"><span>See All</span></a>
              </div>
              <div class="card-body grid-container">
                @foreach ($product as $p)
                <span class="img-container grid-item">
                  <a href="{{url('/product/').'/'.$company->id.'/'.$p->slug}}">
                    <img src="{{url('public/'.Storage::url($p->photo))}}">
                  </a>
                </span>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-md-7">
            @foreach ($timeline as $t)
            @if ($t->type == 'media')
            <div class="card2 mb-2">
              <div class="card-header">
                <h6>{{$company->name}}</h6>
                <p>Media/Resource</p>
              </div>
              <div class="card-body">
                <div class="image-container">
                  <img src="{{url('public/'.Storage::url($t->photo))}}">
                </div>
                <h4><a href="{{url('/resource/').'/'.$company->id.'/'.$t->slug}}">{{$t->name}}</a></h4>
                <p>
                  <span class="icon-eye"></span>
                  <span class="mr-3">Views: {{$t->view}}</span>
                  <span class="icon-download"></span>
                  <span>Download: {{$t->download}}</span>
                </p>
                <p></p>
                <p><a href="{{url('/resource/').'/'.$company->id.'/'.$t->slug}}">Click here to open</a></p>
              </div>
            </div>
            @elseif ($t->type == 'product')

            <div class="card2 mb-2">
              <div class="card-header">
                <h6>{{$company->name}}</h6>
                <p>Product</p>
              </div>
              <div class="card-body">
                <div class="image-container">
                  <img src="{{url('public/'.Storage::url($t->photo))}}">
                </div>
                <h4><a href="{{url('/product/').'/'.$company->id.'/'.$t->slug}}">{{$t->name}}</a></h4>
                <p>
                  <span class="icon-eye"></span>
                  <span class="mr-3">Views: {{$t->view}}</span>
                </p>
                <p>{{$t->description}}</p>
                <p><a href="{{url('/product/').'/'.$company->id.'/'.$t->slug}}">Click here to open</a></p>
              </div>
            </div>
            @endif
            @endforeach
            {{-- <div class="card2 mb-5">
              <div class="card-header">
                <h6>Company Name</h6>
                <p>Project</p>
              </div>
              <div class="card-body">
                <div class="image-container">
                  <img src="images/img_1.jpg">
                </div>
                <h4><a href="#">Project Title</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a href="#">Click here to open</a></p>
              </div>
            </div>

            <div class="card2 mb-5">
              <div class="card-header">
                <h6>Company Name</h6>
                <p>News</p>
              </div>
              <div class="card-body">
                <div class="image-container">
                  <img src="images/img_1.jpg">
                </div>
                <h4><a href="#">News Title</a></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a href="#">Click here to open</a></p>
              </div>
            </div> --}}

          </div>
        </div>

      </div>

    </div>
    @endsection

    