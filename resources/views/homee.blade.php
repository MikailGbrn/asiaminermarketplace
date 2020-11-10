@extends('layout')
@section('content')
    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10">
            
            
            <div class="row justify-content-center mb-4">
              <div class="col-md-10 text-center">
                <h1 data-aos="fade-up">For You to Find <span class="typed-words"></span></h1>
                <p data-aos="fade-up" class=" w-75 mx-auto">Find your best resources you need at Mining Marketingplace Resource Center!</p>
              </div>
            </div>

            <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
              <form action="{{ url('search')}}" method="get">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-7 no-sm-border border-right">
                    <input type="text" name="kw" class="form-control" placeholder="What are you looking for?">
                  </div>
                  {{-- <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <div class="wrap-icon">
                      <span class="icon icon-room"></span>
                      <input type="text" class="form-control" placeholder="Location">
                    </div>
                    
                  </div> --}}
                  <div class="col-lg-12 col-xl-3">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="cat" >
                        <option value="">All Categories</option>
                        @foreach ($MCatagory as $aa)
                          <option value="{{$aa->id}}">{{$aa->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn text-white btn-primary" value="Search">
                  </div>
                  
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>  




    {{-- <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Fresh from the oven</h2>
            <p class="color-black-opacity-5">See Our Lastest update articles</p>
          </div>
        </div>
        <div class="row mb-3 align-items-stretch">
          @foreach ($timeline as $t)
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="{{url('public/'.Storage::url($t->photo))}}" style="height :350px" alt="Free Website Template by Free-Template.co" class="img-fluid">
              <div class="h-entry-inner">
                <h2 class="font-size-regular"><a href="{{url('/').'/'.$t->type.'/'.$t->company_id.'/'.$t->slug}}">{{$t->title}}</a></h2>
                <div class="meta mb-4">by <a href="{{url('/company/').'/'.$t->Cslug}}">{{$t->name}}</a> <span class="mx-2">&bullet;</span> May 5th, 2019</div>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
              </div>
            </div> 
          </div>
          @endforeach
        </div>
      </div>
    </div> --}}

    
    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
            <h2 class="mb-3 mt-0 text-white">Let's get started. Create your account</h2>
            <p class="mb-0 text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
          <div class="col-lg-4">
            <p class="mb-0"><a href="{{url('/register')}}" class="btn btn-outline-white text-white btn-md px-5 font-weight-bold btn-md-block">Sign Up</a></p>
          </div>
        </div>
      </div>
    </div>
  @endsection