@extends('CompanyAdmin.layout')
@section('content')
<div class="site-section bg-light">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <h2><b>Products ({{$product->total()}})</b></h2>
            <h6 class="mb-3">Share your company's product</h6>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{url('/company-profile/product/add')}}"><h5>+ Add Item</h5></a>
          </div>
        </div>
        @if (session('Product'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    @php echo session('Product'); @endphp !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

        <div class="form-search-directory mt-1 ">
              <form method="get">
                <div class="row align-items-center">
                  <div class="col-lg-12 col-xl-10 no-sm-border border-right">
                    <input type="text" name="kw" class="form-control" placeholder="Search products">
                  </div>
                  <div class="col-lg-12 col-xl-2 ml-auto text-right">
                    <input type="submit" class="btn text-white btn-primary" value="Search">
                  </div>
                  
                </div>
              </form>
            </div>

        <div class="row">
          <div class="col-md-12">

            @foreach ($product as $p)
            <div class=" d-md-flex detail-content container mt-5">
              <img src="{{url('public/'.Storage::url($p->photo))}}">
              <div class="lh-content">
                <object><a href="{{url('/company-profile/product/').'/'.$p->id}}" class="bookmark"><span class="icon-edit"></span></a></object>
                <object>
                  <form action="" id="myform2" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{$p->id}}">
                    <button style="border:0px; color:red" type="submit" class="delete"><span class="icon-trash"></span></button>
                  </form>
                </object>
                <h3 class="h1">{{$p->name}}</h3>
                <p class="mb-0">By: <a href="#">{{$p->company->name}}</a></p>
                <p class="tag">
                  <span>{{$p->view}} View</span>
                </p>
                <p>
                  <span>{{$p->description}}</span>
                </p>
              </div>
            </div>
            @endforeach
          </div>
          <div class="col-12 text-center mt-5">
            {{$product->links()}}
          </div>
        </div>
      </div>
    </div>
@endsection
