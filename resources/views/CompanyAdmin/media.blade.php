@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container mt-5">
           
        <div class="row ">
          <div class="col-md-6">
            <h2><b>Media/Resources ({{$media->total()}})</b></h2>
            <h6 class="mb-3">Share your company's media or resources</h6>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{url('/company-profile/media/add')}}"><h5>+ Add Item</h5></a>
          </div>
        </div>
        @if (session('Media/Resource'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              @php echo session('Media/Resource'); @endphp !
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        <div class="form-search-directory mt-1 ">
              <form method="get">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-10 no-sm-border border-right">
                    <input type="text" name="kw" class="form-control" placeholder="Search media/resources">
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn text-white btn-primary" value="Search">
                  </div>
                  
                </div>
              </form>
        </div>
     
        <div class="row">
          <div class="col-md-12">

            @foreach ($media as $m)
            
            <div class=" d-md-flex detail-content container mt-5">
              @if($m->status == 1)
              <div class="imgcontainer">
                <div class="bgimg" style="background-image: url({{url('public/'.Storage::url($m->photo))}});"></div>
              <img src="{{url('public/'.Storage::url($m->photo))}}">
              </div>
              @else
              <img src="{{url('assets/frontend/images/takedown.jpg')}}">
              @endif

              <div class="lh-content">
                
                <object><a href="{{url('/company-profile/media/').'/'.$m->id}}" class="bookmark"><span class="icon-edit"></span></a></object>
                
                <object>
                  <form action="" id="myform2" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{$m->id}}">
                    <button style="border:0px; color:red" type="submit" class="delete"><span class="icon-trash"></span></button>
                  </form>
                </object>
                <object style="position: absolute; top:120px; right:0px"><a target="_blank" href="{{url("/resource/$m->company_id/$m->slug/")}}" class="bookmark"><span class="icon-search"></span></a></object>
                {{-- <object style="margin-top:100px"><a href="{{url("/resource/$m->company_id/$m->slug/")}}" class="bookmark"><span class="icon-edit"></span></a></object> --}}
                
                <h3 class="h1">{{$m->title}}</h3>
                
                <p class="mb-0">By: <a href="#">{{$m->company->name}}</a></p>
                <p>Author: <a href="#">{{$m->author}}</a></p>
                <p class="tag">
                  {{-- @if($m->category) --}}
                  @foreach ($m->catagory as $c)
                  <span>{{$c->name}}</span>
                  @endforeach
                </p>
                <p>
                  <span>{{substr($m->description,0,425) }} ...</span>
                </p>
              </div>
            </div>

            @endforeach
            <div class="col-12 text-center mt-5">
              {{$media->links()}}
            </div>

        
          </div>
        </div>
      </div>
    </div>
@endsection