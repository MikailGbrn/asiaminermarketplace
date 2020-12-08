@extends('layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-3 ml-auto">
        <!-- FILTER STARTS HERE -->
            <h4 class="h4">Filters</h4>

            <h6 class="h4 text-black mb-0 accordion">Filter by Categories</h6>
            <div class="panel mb-5">
              <form action="" method="GET">
                <div class="form-group">
                  <label for="uploaddate">Company Category</label>
                  <select name="cat" class="form-control" id="cat" onchange="addFilter('cat')">
                    <option value="">Company Category</option>
                    @foreach ($catagory as $c)
                    <option @if(app('request')->input('cat')==$c->id) selected @endif value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                  </select>
                </div>
               </form>
              </div>

            <h3 class="h4 text-black accordion mb-0">Search</h3>
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
              </form>
              </div>
        <!-- FILTER END HERE -->
        </div>

          <!-- COMPANY DIRECTORY START HERE -->
          <div class="col-lg-9">
            <h4>Products ({{$product->total()}})</h4>
            <div class="row mb-3 align-items-stretch">
            @foreach ($product as $p)
            
              <div class="col-md-4 mb-4 mb-lg-4">
                <div class="h-entry h-option contents">
                  <a href="{{url('product/'.$p->company->id.'/'.$p->slug)}}">
                  <img src="{{url('public/'.Storage::url($p->photo))}}" alt="Image" class="img-fluid">
                  <div class="h-entry-inner">
                    <h2 class="font-size-regular title"><object><a href="{{url('product/'.$p->company->id.'/'.$p->slug)}}">{{$p->name}}</a></object></h2>
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