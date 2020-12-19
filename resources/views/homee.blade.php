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
                  <div class="col-lg-12 col-xl-4 no-sm-border border-right">
                    <input type="text" name="kw" class="form-control" placeholder="What are you looking for?">
                  </div>

                  <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                    <div class="wrap-icon">
                      <span class="icon icon-room"></span>
                      <input type="text" name="comp" class="form-control" placeholder="Search by company">
                    </div>
                    
                  </div>

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
            <div class="row" style="padding: 20px; margin-top: 50px;" data-aos="fade-up" data-aos-delay="200">
              <div class="banner" style="border: none;">
                @php $banner = \App\Banner::where('type','Homepage')->first(); @endphp
                @if($banner)
                <a href="{{$banner->link}}" target="_blank">
                  <img src="{{url('public/'.Storage::url($banner->photo))}}">
                </a>
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  
  <div class="site-section" style="background-color:rgb(248, 248, 248); padding-top:20px; padding-bottom:20px;">
    <div class="container">
      <div class="owl-carousel owl-theme">
        @foreach ($company as $c)
        <div class="item">
          <div class="col-lg-12">
            <div id="logo-container" style="display:block;">
              <img src="{{url('public/'.Storage::url($c->logo))}}" id="logo-preview" style="display: block;" alt="Image">
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container mb-4" data-aos="fade-up" data-aos-delay="200">
      <h2>Featured Resources</h2>
      <h6 class="mb-4">List of Resources that you might look about</h6>
      <div class="row align-items-center"  style="border-bottom: 3px solid #ccc;">
        @foreach ($media as $r)
        <div class="col-md-6">
          <div class="d-block d-md-flex listing-horizontal h-option">

            <a href="resource/{{$r->company->id}}/{{$r->slug}}" class="img d-block" style="background-image: url({{url('public/'.Storage::url($r->photo))}});">
            </a>

            <div class="lh-content contents">

              <h3 class="title-home"><object><a href="resource/{{$r->company->id}}/{{$r->slug}}">{{$r->title}}</a></object></h3>
              <p><object><a href="company/{{$r->company->slug}}">{{$r->company->name}}</a></object></p>
              <p>
                <span class="icon-eye"></span>
                <span class="pr-3">{{$r->view}}</span>
                <span class="icon-download text-left"></span>
                <span>{{$r->download}} Downloads</span>
              </p>
              <object><a href="{{url('/')}}/resource/{{$r->company->id}}/{{$r->slug}}">Open Details..</a></object>
            </div>
          </div>
        </div>
        @endforeach 

      </div>
    </div>

    <div class="container mb-4" data-aos="fade-up" data-aos-delay="200">
      <h2>Featured Products</h2>
      <h6 class="mb-4">List of Product that you might look about</h6>
      <div class="row align-items-center" style="border-bottom: 3px solid #ccc;">
        @foreach ($product as $p)
        <div class="col-md-4 mb-4 mb-lg-4">
          <div class="h-entry h-option">
            <a href="{{url('product/'.$p->company->id.'/'.$p->slug)}}">
            <img src="{{url('public/'.Storage::url($p->photo))}}" alt="Image" class="img-fluid">
            <div class="h-entry-inner">
              <h2 class="font-size-regular"><object><a href="{{url('product/'.$p->company->id.'/'.$p->slug)}}">{{$p->name}}</a></object></h2>
              <p><object><a href="{{url('/')}}/company/{{$p->company->slug}}">{{$p->company->name}}</a></object></p>
              <p class="text-limit">{{$p->description}}</p>
            </div>
            </a>
          </div>  
        </div>
        @endforeach
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

  @section('jsplus')
  <script>
      $('.owl-carousel').owlCarousel({
      autoplay:true,
      autoWidth:true, 
      loop:true,
      margin:10,
      nav:false,
      responsive:{
        0:{
          items:3
        },
        600:{
          items:5
        },
        1200:{
          items:8
        }
      }
    })
  </script>
  @endsection