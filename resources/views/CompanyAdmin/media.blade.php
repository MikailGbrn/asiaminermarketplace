@extends('CompanyAdmin.layout')
    @section('content')

    <div class="site-section">
      <div class="container mt-5">
           
        <div class="row ">
          <div class="col-md-6">
            <h2>Media/Resources ({{$media->total()}})</h2>
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
              <img src="{{url('public/'.Storage::url($m->photo))}}">
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