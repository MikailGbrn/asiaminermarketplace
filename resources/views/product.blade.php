@extends('layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-3 ml-auto">
            <!-- FILTER STARTS HERE -->
        <form action="" method="GET">
          <div class="mb-5">
            <h3 class="h4 text-black mb-3">Filters</h3>
            
              <div class="form-group">

                <!-- search by keywords -->
                <h6 class="text-sm text-secondary">Search By Keywords</h6>
                <input type="text" name="kw" value="{{ app('request')->input('kw') }}" placeholder="What are you looking for?" class="form-control">
              </div>

              <!-- search by companies -->
              <h6 class="text-sm text-secondary">Search By Companies</h6>
              <div class="form-group">
                <input type="text" name="comp" value="{{ app('request')->input('comp') }}" placeholder="Company Name" class="form-control">
              </div>


              <h6 class="text-sm text-secondary">Content Categories</h6>
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
            
          </div>
        </form>
        <!-- FILTER END HERE -->
        </div>

          <!-- COMPANY DIRECTORY START HERE -->
          <div class="col-lg-8">
            <h4>Products ({{$product->total()}})</h4>
            <div class="row mb-3 align-items-stretch">
            @foreach ($product as $p)
            
              <div class="col-md-6 mb-4 mb-lg-4">
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

            <!-- COMPANY DIRECTORY END HERE -->

            <!-- PAGINATION START HERE -->
            <div class="col-12 text-center mt-5">
              {{$product->links()}}
            </div>
            <!-- PAGINATION END HERE -->

          </div>
          
        </div>
      </div>
    </div>
@endsection