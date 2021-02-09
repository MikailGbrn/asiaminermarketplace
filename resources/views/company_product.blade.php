@extends('layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="company-profile">
                <!-- header company profile -->
              <div class="profile-header">

                <img class="header" src="{{url('public/'.Storage::url($company->header))}}"> 
                <!-- profile picture company -->
                <div class="image-container">
                  <img src="{{url('public/'.Storage::url($company->logo))}}">
                </div>
              </div>



              @if($company->subscription == 0)
              <div class="profile-content mt-3">
              <h2>{{$company->name}}</h2>
                <p class="description">{{$company->description}}</p>
              </div>
              @else
              <div class="profile-content mt-3">
              <h2>{{$company->name}}</h2>
                <p class="description">{{$company->description}}</p>
                <p>
                <a target="_blank" href="{{$company->website}}"><span class="icon-paperclip mr-2 text-primary"></span>{{$company->website}}</a>
                </p>
                <p>
                  @foreach ($company->address as $address)
                    <span class="mr-5 text-secondary"><span class="icon-map-pin mr-2"></span>{{$address->city}}, {{$address->province}}</span>
                  @endforeach
                  <span class="mr-5 text-secondary"><span class="icon-clock-o mr-2"></span>{{$company->business_hour}}</span>
                  <span class="mr-5 text-secondary"><span class="icon-envelope mr-2"></span><a href="mailto:{{$company->email}}">{{$company->email}}</a></span>
                  <span class="text-secondary"><span class="icon-phone mr-2"></span>{{$company->phone}}</span>
                </p>
              </div>
              @endif

              
              <div class="profile-footer">
                <ul class="companynav mr-auto">
                  <li><a href="{{url('/')}}/company/{{$company->slug}}"><span>TIMELINE</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/media"><span>MEDIA/RESOURCE</span></a></li>
                  <li class="active"><a href="{{url('/')}}/company/{{$company->slug}}/product"><span>PRODUCTS</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/news"><span>NEWS</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/project"><span>PROJECT</span></a></li>
                  <li><a href="{{url('/')}}/company/{{$company->slug}}/about"><span>ABOUT</span></a></li>
                </ul>
              </div>

          </div>
        </div>
        </div>
      </div>

<!-- Media resource content starts here -->
      <div class="container company-content">
        <div class="row mb-3">
          <div class="col-md-12">
            <h4 class="contentsection">Products ({{$product->total()}})</h4>
          </div>
        </div>
        <div class="row">

            <div class="row mb-3 align-items-stretch">

              @foreach ($product as $p)
              <div class="col-md-4 mb-4 mb-lg-4">
                <div class="h-entry h-option">
                  <a href="{{url('product/'.$p->company->id.'/'.$p->slug)}}">
                  <img src="{{url('public/'.Storage::url($p->photo))}}" alt="Image" class="img-fluid">
                  <div class="h-entry-inner">
                    <h2 class="font-size-regular"><object><a href="{{url("/product/$p->company_id/$p->slug")}}">{{$p->name}}</a></object></h2>
                    <p><object><a href="{{url('/')}}/company/{{$p->company->slug}}">{{$p->company->name}}</a></object></p>
                    <p class="text-limit">{{$p->description}}</p>
                  </div>
                  </a>
                </div> 
              </div>
              @endforeach

              <div class="col-12 text-center mt-5">
                {{$product->links()}}
              </div>
            </div>
        </div>

      </div>
      <!-- media resorce content ended here -->

    <div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content p-4">
          <div class="modal-header">
            <h4>Add Product</h4>
          </div>
          <div class="modal-body">
            <form action="#">
                  <div class="row">
                    <div class="form-group col-md-12 mb-3 mb-md-0">
                      <label class="text-secondary" for="#title">Media/Resouce Title</label>
                      <input type="text" id="title" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3 mb-md-0">
                      <label class="text-secondary" for="#author">Author</label>
                      <input type="text" id="author" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mb-3 mb-md-0">
                      <label class="text-secondary" for="#desc">Description</label>
                      <textarea class="form-control" id="desc" rows="3"></textarea>
                    </div>
                    <div class="input-group custom-file col-md-7 mt-3 mb-md-0" style="margin-left: 15px;">
                      <input type="file" class="custom-file-input" id="customFile">
                      {{-- <label class="custom-file-label text-secondary" for="customFile"></label> --}}
                    </div>
                  </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>



    </div>

@endsection