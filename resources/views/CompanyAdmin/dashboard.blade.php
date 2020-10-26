@extends('CompanyAdmin.layout')
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
                <div class="image-container" style="margin-top:15px">
                  <img style="object-position:0px 0px" src="{{url('public/'.Storage::url($company->logo))}}">
                </div>
              </div>


              <span><a class="editbtn" style="position:absolute; right:15px" href="{{url('/company-profile/edit')}}">Edit Profile</a></span>
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
                  <span class="text-secondary"><span class="icon-clock-o mr-2"></span>{{$company->business_hour}}</span>
                </p>
                <p>
                  <span class="mr-5 text-secondary"><span class="icon-envelope mr-2"></span>{{$company->email}}</span>
                  <span class="text-secondary"><span class="icon-phone mr-2"></span>{{$company->phone}}</span>
                </p>
              </div>

            </div>

          </div>
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