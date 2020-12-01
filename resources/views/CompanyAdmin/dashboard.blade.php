@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
                
          <div class="col-md-12">
            @if (session('activate'))
                  <div class="alert alert-danger alert-dismissible fade show" style="position: absolute; left:30px; right:30px; top:20px" role="alert">
                    @php echo session('activate'); @endphp !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
            <div class="company-profile">

                <!-- header company profile -->
              <div class="profile-header">
                
                @if($company->subscription== 2)            
                <div style="position: absolute; right: 50px">
                  <a href="" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{url('assets/frontend/images/gold.png')}}" style="width:75px" alt="">
                  </a>
                </div>
                @elseif ($company->subscription== 1)
                <div style="position: absolute; right: 50px">
                  <a href="" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{url('assets/frontend/images/silver.png')}}" style="width:75px" alt="">
                  </a>
                </div>
                @endif


                <img class="header" src="{{url('public/'.Storage::url($company->header))}}"> 
                <!-- profile picture company -->
                <div class="image-container" style="margin-top:15px">
                  <img style="object-position:0px 0px" src="{{url('public/'.Storage::url($company->logo))}}">
                </div>
              </div>


              <span><a class="editbtn" style="position:absolute; right:15px" href="{{url('/company-profile/edit')}}">Edit Profile</a></span>
              <div class="profile-content mt-3">
              <h2>{{$company->name}}</h2>
                <p class="description">{{$company->description}}</p>
                @if($company->subscription !== 0)
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
                @else
                  <p>
                    <span class="mr-5 text-secondary"><span class="icon-envelope mr-2"></span>{{$company->email}}</span>
                    @foreach ($company->address as $address)
                      <span class="mr-5 text-secondary"><span class="icon-map-pin mr-2"></span>{{$address->city}}, {{$address->province}}</span>
                    @endforeach
                  </p>
                @endif
              </div>

            </div>

          </div>
          @if($company->subscription == 0)
          <div class="col-md-12 mt-4">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center bg-black">
                    <h3 class="mb-0"><b class="text-white">Free</b></h3>
                  </div>
                  <div class="card-body text-center">
                    <h2><b>Rp 0</b></h2>
                  </div>
                  <div class="card-body text-center">
      
                    <h5>5 Product</h5>
                    <h5>10 Media/Resources</h5>
                    <h5>&nbsp</h5>
                    <h5>&nbsp</h5>
   
                  </div>
                  <div class="card-body text-center">
                    @if($company->subscription==0)
                    <a class="btn btn-primary text-white" style="border-radius: 5px;">You are here</a>
                    @else
                    <a href="https://wa.me/085155055241?text=downgrade%20to%20Free%20" target="_blank" class="btn btn-outline-primary" style="border-radius: 5px;">Contact Us</a>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center bg-light">
                    <h3 class="mb-0"><b class="">Silver</b></h3>
                  </div>
                  <div class="card-body text-center">
                    <h2><b>Rp 500.000</b></h2>
                  </div>
                  <div class="card-body text-center">
                    <h5>∞ News</h5>
                    <h5>45 Product</h5>
                    <h5>45 Media/Resources</h5>
                    <h5>45 Project</h5>
                  </div>
                  <div class="card-body text-center">
                    @if($company->subscription==1)
                    <a class="btn btn-primary text-white" style="border-radius: 5px;">You are here</a>
                    @else
                    <a href="https://wa.me/085155055241?text=Upgrade%20to%20silver%20" target="_blank" class="btn btn-outline-primary" style="border-radius: 5px;">Contact Us</a>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header text-center bg-warning">
                    <h3 class="mb-0"><b class="text-white">Gold</b></h3>
                  </div>
                  <div class="card-body text-center">
                    <h2><b>Rp 1.000.000</b></h2>
                  </div>
                  <div class="card-body text-center">
                    <h5>∞ News</h5>
                    <h5>45 Product</h5>
                    <h5>45 Media/Resources</h5>
                    <h5>45 Project</h5>
                  </div>
                  <div class="card-body text-center">
                    @if($company->subscription==2)
                    <a class="btn btn-primary text-white" style="border-radius: 5px;">You are here</a>
                    @else
                    <a href="https://wa.me/085155055241?text=Upgrade%20to%20gold%20" target="_blank" class="btn btn-outline-primary" style="border-radius: 5px;">Contact Us</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
          @if($company->subscription !== 0)
          <div class="col-md-12">
            <div class="card mt-4">
              <div class="card-header">
                <h4>Company's About Page</h4>
              </div>
              <div class="card-body">
                <form action="{{url('/company-profile/about')}}" method="POST">
                  @csrf
                  <textarea name="about" id="about" rows="4" class="">{{$company->about}}</textarea>
                  <center>
                    <button type="submit" class="btn btn-primary" style="margin : 10px auto">Save Changes</button>
                  </center>
                </form>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Subscription</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="text-align: center;">
            @if($company->subscription== 2)            
              <h2><b style="color: #FFD700">Gold</b></h2>
              <p>this subscription valid start from <b>{{$company->subscription_start}}</b>  until <b>{{$company->subscription_end}}</b></p>
            @elseif ($company->subscription== 1)
              <h2><b style="color: #C0C0C0">Silver</b></h2>
              <p>this subscription valid start from <b>{{$company->subscription_start}}</b>  until <b>{{$company->subscription_end}}</b></p>
            @endif
            
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('jsplus')
  @if ($errors->any())
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#additem').modal('show');
    });
  </script>
  @endif
@endsection