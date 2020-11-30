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
                    <input type="text" id="kw" name="kw" onblur="keyword()" value="{{ app('request')->input('kw') }}" placeholder="What are you looking for?" class="form-control">
                  </div>

                <h6 class="text-sm text-secondary">Search By Companies</h6>
                <div class="form-group">
                  <input type="text" id="comp" name="comp" onblur="company()" value="{{ app('request')->input('comp') }}" placeholder="Company Name" class="form-control">
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
                          <input type="checkbox" name="Audio" id="Audio" onchange="checkBox('Audio')"  @if(app('request')->input('rt')=="Audio") checked @endif>
                          Audio
                        </label>
                      </li>
                      <li>
                        <label for="option2">
                          <input type="checkbox" name="Catalogue" id="Catalogue" onchange="checkBox('Catalogue')" @if(app('request')->input('rt')=="Catalogue") checked @endif>
                          Catalogue
                        </label>
                      </li>
                      <li>
                        <label for="option3">
                          <input type="checkbox" name="E-Book" id="E-Book" onchange="checkBox('E-Book')" @if(app('request')->input('rt')=="E-Book") checked @endif>
                          E-Book
                        </label>
                      </li>
                      <li>
                        <label for="option4">
                          <input type="checkbox" name="Image" id="Image" onchange="checkBox('Image')" @if(app('request')->input('rt')=="Image") checked @endif>
                          Image
                        </label>
                      </li>
                      <li>
                        <label for="option4">
                          <input type="checkbox" name="Power Point" id="Power Point" onchange="checkBox('Power Point')" @if(app('request')->input('rt')=="Power Point") checked @endif>
                          Power Point
                        </label>
                      </li>
                      <li>
                        <label for="option4">
                          <input type="checkbox" name="Case Study" id="Case Study" onchange="checkBox('Case Study')" @if(app('request')->input('rt')=="Case Study") checked @endif>
                          Case Study
                        </label>
                      </li>
                    </ul>
                  </div>
              </form>
            </div>

            <h6 class="h4 text-black mb-0 accordion">Sort By</h6>
            <div class="panel">
              <form action="" method="GET">
                <div class="form-group">
                  <label for="uploaddate">Upload Date</label>
                  <select name="dt" class="form-control" id="dt" onchange="addFilter('dt')">
                    <option value="">upload date</option>
                    <option value="1" @if(app('request')->input('dt')=="1") selected @endif>Today</option>
                    <option value="2" @if(app('request')->input('dt')=="2") selected @endif>This Week</option>
                    <option value="3" @if(app('request')->input('dt')=="3") selected @endif>Latest</option>
                    <option value="4" @if(app('request')->input('dt')=="4") selected @endif>Oldest</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="uploaddate">View Count</label>
                  <select name="view" class="form-control" id="view" onchange="addFilter('view')">
                    <option value="">view</option>
                    <option value="1" @if(app('request')->input('view')=="1") selected @endif>Most Viewed</option>
                    <option value="2" @if(app('request')->input('view')=="2") selected @endif>Least Viewed</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="uploaddate">Download Count</label>
                  <select name="download" class="form-control" id="download" onchange="addFilter('download')">
                    <option value="">download</option>
                    <option value="1" @if(app('request')->input('download')=="1") selected @endif>Most Downloaded</option>
                    <option value="2" @if(app('request')->input('download')=="2") selected @endif>Least Downloaded</option>
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
            <h4>Media/Resources ({{$resource->total()}})</h4>
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
                <object><a href="{{url('/')}}/resource/{{$r->company->id}}/{{$r->slug}}">Open Details..</a></object>
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

   
    @endsection
    @section('jsplus')
    <script>
      function checkBox(name) {
        console.log("wkwkwkwkwkwkw");
        if (document.getElementById(name).checked) {
          var searchParams = new URLSearchParams(window.location.search)
          searchParams.set("rt", name)
          searchParams.delete("page")
          window.location.search = searchParams.toString()
        }else{
          var searchParams = new URLSearchParams(window.location.search)
          searchParams.delete("page")
          searchParams.delete("rt")
          window.location.search = searchParams.toString()
        }
      };
      function keyword() {
          var number = document.getElementById("kw").value;
          if (number !== null) {
              var searchParams = new URLSearchParams(window.location.search)
              searchParams.set("kw", number)
              searchParams.delete("page")
              window.location.search = searchParams.toString()
          }  
      }
      function company() {
          var number = document.getElementById("comp").value;
          if (number !== null) {
              var searchParams = new URLSearchParams(window.location.search)
              searchParams.set("comp", number)
              searchParams.delete("page")
              window.location.search = searchParams.toString()
          }  
      }
      function myFunction() {
          var x = document.getElementById("fltr").value;
          console.log(x);
      }
      function addFilter(name) {
          var number = document.getElementById(name).value;
          if (number !== null) {
              var searchParams = new URLSearchParams(window.location.search)
              searchParams.set(name, number)
              window.location.search = searchParams.toString()
          }  
      }
  </script>
    @endsection
    
    