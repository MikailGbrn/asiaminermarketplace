@extends('layout')    
    @section('content')
    <div class="site-section bg-light">
      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-3 ml-auto">
              <!-- FILTER STARTS HERE -->
            <h4 class="h4">Filters</h4>
            <h3 class="h4 text-black accordion mb-0">Category</h3>
            <div class="panel mb-5">
                <form action="" method="GET">
                  <div class="form-group">
                    <h6 class="text-sm text-secondary">Search By Keywords</h6>
                    <input type="text" name="kw" value="{{ app('request')->input('kw') }}" placeholder="What are you looking for?" class="form-control">
                  </div>

                <h6 class="text-sm text-secondary">Search By Companies</h6>
                <div class="form-group">
                  <input type="text" name="comp" value="{{ app('request')->input('comp') }}" placeholder="Company Name" class="form-control">
                </div> 
              </form>
            </div>  

            <h4 class="h4 text-black accordion mb-0">Type of Resources</h4>
            <div class="panel mb-5">
              <form action="" method="GET">
                <label class="text-sm text-secondary pt-3">Content Categories</label>
                <!-- checklist for categories -->
                  <div class="form-group">
                    <ul class="list-unstyled">
                      <li>
                        <label for="option1">
                          <input type="checkbox" id="option1">
                          Coffee
                        </label>
                      </li>
                      <li>
                        <label for="option2">
                          <input type="checkbox" id="option2">
                          Vegetarian
                        </label>
                      </li>
                      <li>
                        <label for="option3">
                          <input type="checkbox" id="option3">
                          Vegan Foods
                        </label>
                      </li>
                      <li>
                        <label for="option4">
                          <input type="checkbox" id="option4">
                          Sea Foods
                        </label>
                      </li>
                      <li class="text-primary">View All Categories</li>
                    </ul>
                  </div>
              </form>
            </div>

            <h6 class="h4 text-black mb-0 accordion">Sort By</h6>
            <div class="panel">
              <form action="" method="GET">
                <div class="form-group">
                  <label for="uploaddate">Upload Date</label>
                  <select name="dt" class="form-control" id="uploaddate">
                    <option value="">upload date</option>
                    <option value="1">Today</option>
                    <option value="2">This Week</option>
                    <option value="3">Latest</option>
                    <option value="4">Oldest</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="uploaddate">View Count</label>
                  <select name="view" class="form-control" id="uploaddate">
                    <option value="">view</option>
                    <option value="1">Most Viewed</option>
                    <option value="2">Least Viewed</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="uploaddate">Download Count</label>
                  <select name="download" class="form-control" id="uploaddate">
                    <option value="">download</option>
                    <option value="1">Most Downloaded</option>
                    <option value="2">Least Downloaded</option>
                  </select>
                </div>
              </form>
              </div>
<!--               
            <form action="" method="GET">
              <div class="mb-5">
                <h3 class="h4 text-black mb-3">Filters</h3>
                
                  <div class="form-group"> -->

                    <!-- search by keywords -->
<!--                     <h6 class="text-sm text-secondary">Search By Keywords</h6>
                    <input type="text" name="kw" value="{{ app('request')->input('kw') }}" placeholder="What are you looking for?" class="form-control">
                  </div> -->

                  <!-- search by companies -->
<!--                   <h6 class="text-sm text-secondary">Search By Companies</h6>
                  <div class="form-group">
                    <input type="text" name="comp" value="{{ app('request')->input('comp') }}" placeholder="Company Name" class="form-control">
                  </div>


                  <h6 class="text-sm text-secondary">Content Categories</h6> -->
                  <!-- checklist for categories -->
<!--                   <div class="form-group">
                    <ul class="list-unstyled">
                      <li>
                        <label for="option1">
                          <input type="checkbox" id="option1">
                          Coffee
                        </label>
                      </li>
                      <li>
                        <label for="option2">
                          <input type="checkbox" id="option2">
                          Vegetarian
                        </label>
                      </li>
                      <li>
                        <label for="option3">
                          <input type="checkbox" id="option3">
                          Vegan Foods
                        </label>
                      </li>
                      <li>
                        <label for="option4">
                          <input type="checkbox" id="option4">
                          Sea Foods
                        </label>
                      </li>
                      <li class="text-primary">View All Categories</li>
                    </ul>
                  </div>
              </div>

              <div class="mb-5">
                <h6 class="h4 text-black mb-3">Sort By</h6>
                    <div class="form-group">
                      <label for="uploaddate">Upload Date</label>
                      <select name="dt" class="form-control" id="uploaddate">
                        <option value="">upload date</option>
                        <option value="1">Today</option>
                        <option value="2">This Week</option>
                        <option value="3">Latest</option>
                        <option value="4">Oldest</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="uploaddate">View Count</label>
                      <select name="view" class="form-control" id="uploaddate">
                        <option value="">view</option>
                        <option value="1">Most Viewed</option>
                        <option value="2">Least Viewed</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="uploaddate">Download Count</label>
                      <select name="download" class="form-control" id="uploaddate">
                        <option value="">download</option>
                        <option value="1">Most Downloaded</option>
                        <option value="2">Least Downloaded</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" style="border: 1px solid #00918e; background-color:transparent; border-radius: 30px; padding: 8px;">submit</button>
                    </div>
              </div>
            </form> -->
          <!-- FILTER END HERE -->
          </div>


          <!-- CATEGORIES START HERE -->
          <div class="col-lg-8">
            @foreach ($resource as $r)
            <div class="d-block d-md-flex listing-horizontal h-option">

              <a href="resource/{{$r->company->id}}/{{$r->slug}}" class="img d-block" style="background-image: url({{url('public/'.Storage::url($r->photo))}});">
                {{-- <span class="category">Sample Category</span> --}}
              </a>

              <div class="lh-content">
                <object><a href="#" class="bookmark"><span class="icon-heart"></span></a></object>
                <h3><object><a href="resource/{{$r->company->id}}/{{$r->slug}}">{{$r->title}}</a></object></h3>
                <p><object><a href="company/{{$r->company->slug}}">{{$r->company->name}}</a></object></p>
                <p>
                  <span class="icon-eye"></span>
                  <span class="pr-3">{{$r->view}}</span>
                  <span class="icon-download text-left"></span>
                  <span>{{$r->download}} Downloads</span>
                </p>
                <object><a href="resource/{{$r->company->id}}/{{$r->slug}}">Open Details..</a></object>
              </div>
            </div>
            @endforeach
          <!-- CATEGORIES END HERE -->

            <div class="col-12 mt-5 text-center">
              {{$resource->links()}}
            </div>

          </div>




        </div>
      </div>
    </div>

    {{-- <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center border-primary">
            <h2 class="font-weight-light text-primary">Popular Categories</h2>
            <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>

        <div class="row align-items-stretch">
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <a href="#" class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-hotel"></span></span>
              <span class="caption mb-2 d-block">Hotels</span>
              <span class="number">4,89</span>
            </a>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <a href="#" class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-microphone"></span></span>
              <span class="caption mb-2 d-block">Events</span>
              <span class="number">482</span>
            </a>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <a href="#" class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-flower"></span></span>
              <span class="caption mb-2 d-block">Spa</span>
              <span class="number">194</span>
            </a>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <a href="#" class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-restaurant"></span></span>
              <span class="caption mb-2 d-block">Stores</span>
              <span class="number">1,472</span>
            </a>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <a href="#" class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-cutlery"></span></span>
              <span class="caption mb-2 d-block">Restaurants</span>
              <span class="number">439</span>
            </a>
          </div>
          <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
            <a href="#" class="popular-category h-100">
              <span class="icon mb-3"><span class="flaticon-bike"></span></span>
              <span class="caption mb-2 d-block">Other</span>
              <span class="number">692</span>
            </a>
          </div>
        </div>

        
      </div>
    </div>

    
    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
            <h2 class="mb-3 mt-0 text-white">Let's get started. Create your account</h2>
            <p class="mb-0 text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
          <div class="col-lg-4">
            <p class="mb-0"><a href="signup.html" class="btn btn-outline-white text-white btn-md px-5 font-weight-bold btn-md-block">Sign Up</a></p>
          </div>
        </div>
      </div>
    </div> --}}
    @endsection
    
    