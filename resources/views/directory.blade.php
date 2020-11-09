    @extends('layout')

    @section('content')
    <div class="site-section bg-light">
      <div class="container">

        <div class="form-search-directory mt-5 ">
          <form action="{{url('company')}}" method="GET">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-7 no-sm-border border-right">
                    <input type="text" name="kw" class="form-control" placeholder="What are you looking for?">
                  </div>
                  <div class="col-lg-12 col-xl-3">
                    <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select name="cat" class="form-control">
                        <option value="">Catagory</option>
                        @foreach($catList as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
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

        <div class="row mt-5">



          <!-- COMPANY DIRECTORY START HERE -->
          <div class="col-md-12">

            <div class="row mb-3 align-items-stretch">

              @foreach($company as $c)
              <div class="col-md-4 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry h-option">
                  <a href="{{url('company/'.$c->slug)}}">
                  <img src="{{url('public/'.Storage::url($c->logo))}}" alt="Image" class="img-fluid">
                  <div class="h-entry-inner">
                  <h2 class="font-size-regular"><object><a href="{{url('company/'.$c->slug)}}">{{$c->name}}</a></object></h2>
                    <div class="meta"><span class="icon-envelope mr-2"></span><object><a href="">{{$c->email}}</a></object> <span class="mx-2">&bullet;</span></div>
                    <div class="meta mb-4"><span class="icon-phone mr-2"></span><object><a href="">{{$c->phone}}</a></object> <span class="mx-2">&bullet;</span></div>
                    <p  class="text-limit">{{substr($c->description,0, 100)}}....</p>
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
              {{$company->links()}}
            </div>
            <!-- PAGINATION END HERE -->

          </div>
          
        </div>
      </div>
    </div>

@endsection

    
    
    