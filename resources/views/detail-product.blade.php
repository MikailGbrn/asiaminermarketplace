@extends('layout')
    @section('content')
    <div class="site-section bg-light">
      <div class="container mt-5">
         <div class="row">
            <div class="col-md-12">
              @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Quotation / Info</strong> sent successfully !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

          <div class=" d-md-flex detail-content container">

              <div class="imgcontainer">
                <div class="bgimg" style="background-image: url({{url('public/'.Storage::url($product->photo))}});"></div>
                <img src="{{url('public/'.Storage::url($product->photo))}}">
              </div>
              <div class="lh-content">
                <h3 class="h1">{{$product->name}}</h3>
                <p class="mb-0">By: <a href="#">{{$product->company->name}}</a></p>
                <p class="tag">
                  @foreach ($product->category as $c)
                  <span>{{$c->name}}</span>
                  @endforeach
                </p>
                <p>
                  <div class="related-product">
                    <small>Related Projects</small><br>
                    @foreach($product->project as $p)
                    <a href="{{url('/')}}/project/{{$p->company->id}}/{{$p->slug}}"><span>{{$p->title}}</span></a>
                    @endforeach
                  </div>
                </p>
                <p style="margin-top: 10px;">
                  @guest
                  <a data-toggle="modal" data-target="#signin" class="btn btn-primary text-white">Quote / Info</a>
                  @else
                  <a data-toggle="modal" data-target="#addquotation" class="btn btn-primary text-white">Quotation / Info</a>
                  @endguest
                </p>
                <p>
                  <span class="icon-eye"></span>
                  <span>Views: {{$product->view}}</span>
                  <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                  <a class="a2a_button_facebook"></a>
                  <a class="a2a_button_twitter"></a>
                  <a class="a2a_button_google_gmail"></a>
                  <a class="a2a_button_linkedin"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <!-- AddToAny END -->
                </p>
                <p>
                  <span id="dots">{{$product->description}}</span>

                  <span id="more">{{$product->description}}</span>
                  <p style="padding: 1rem; text-align: center;"><button onclick="myFunction()" id="morebtn">Read More</button></p>
                </p>
              </div>


          
        </div>
      </div>
    </div>
    <div class="row mt-3 mb-5">
    @if(count($picture) != 0)
      <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <span>Images from This Product</span>
        </div>
        <div class="card-body grid-container">
          @foreach ($picture as $m)
            <span class="img-container grid-item">
             <img src="{{url('public/'.Storage::url($m->photo))}}" style="border:1px solid #ccc;" onclick="expand(this);">
            </span>
          @endforeach
        </div>
      </div>
      </div>
    @else
      <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <span>Images from This Product</span>
        </div>
        <div class="card-body text-center">
          <p>There's no Additional Picture.</p>
        </div>
      </div>
      </div>
    @endif

    @if($embed[1] != 1)
      <div class="col-md-7">
      <div class="card">
        <div class="card-body">
        <div style="width: 100%; height: calc(80vh); align-items: center; left: -20%;">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$embed[1]}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>          
        </div>
        </div>
      </div>
      </div>
    @endif

    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        <h3>Related Product</h3>
        @foreach ($relatedProduct as $r)
        <div class="d-block d-md-flex listing-horizontal h-option">

          <a href="{{url('/')}}/product/{{$r->company->id}}/{{$r->slug}}" class="img d-block" style="background-image: url({{url('public/'.Storage::url($r->photo))}});">
            {{-- <span class="category">Sample Category</span> --}}
          </a>

          <div class="lh-content">
            <object><a href="#" class="bookmark"><span class="icon-heart"></span></a></object>
            <h3><object><a href="{{url('/')}}/product/{{$r->company->id}}/{{$r->slug}}">{{$r->name}}</a></object></h3>
            <p><object><a href="{{url('/')}}/company/{{$r->company->slug}}">{{$r->company->name}}</a></object></p>
            <p>
              <span class="icon-eye"></span>
              <span class="pr-3">{{$r->view}}</span>

            </p>
            <object><a href="{{url('/')}}/product/{{$r->company->id}}/{{$r->slug}}">Open Details..</a></object>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col-md-1">
        
      </div>
      <div class="col-md-3" style="padding: 20px;">
         @php $banner = \App\Banner::where('type','Product Detail')->first(); @endphp
        <div class="banner-2">
          <a href="{{$banner->link}}">
            <img src="{{url('public/'.Storage::url($banner->photo))}}">
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade " id="addquotation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content p-4">
        <div class="modal-header">
          <h4>Add Quotation</h4>
        </div>
        <div class="modal-body">
          <form id="form1" action="{{ url('product/addquotation')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <input name="company_id" type="hidden" value="{{$product->company_id}}">
                <input name="product_id" type="hidden" value="{{$product->id}}">
                <div class="row">
                  <div class="form-group col-md-12 mb-3 mb-md-0">
                    <label class="text-secondary" for="#desc">Type, paste OR attach your Request for a Quote or Questions below *</label>
                    <textarea name="detail" class="form-control" id="desc" rows="3"></textarea>
                    @error('detail')
                      <span style="color:red; font-size:12px">*{{$message}}</span>
                    @enderror
                  </div>
                  <div class="input-group col-md-7 mt-3 mb-md-0">
                    <label id="customFile" class="text-secondary">File Upload</label>
                    <input type="file" name="file">
                    <span class="mt-1" style="font-size:12px">*Maximum file size 3 Mb</span>
                    @error('file')
                      <span style="color:red; font-size:12px">*{{$message}}</span>
                    @enderror
                  </div>
                  <div class="input-group col-md-7 mt-3 mb-md-0 ">
                    <label class="text-secondary" for="">I would also like to:</label>
                  </div>
                  <div class="input-group col-md-6 mb-md-0 mt-2">
                      <input name="additional[]" value="Recieve quotation" type="checkbox" class="ml-1" id="exampleCheck1" style="transform: scale(1.5)">
                      <label class="form-check-label" style="margin-left:15px; margin-top:-7px" for="exampleCheck1">Receive Quotation</label>
                  </div>
                  <div class="input-group col-md-6 mb-md-0 mt-2">
                    <input name="additional[]" value="Recieve documentation" type="checkbox" class="ml-1" id="exampleCheck1" style="transform: scale(1.5)">
                    <label class="form-check-label" style="margin-left:15px; margin-top:-7px" for="exampleCheck1">Receive Documentation</label>
                  </div>
                  <div class="input-group col-md-6 mb-md-0 mt-2">
                    <input name="additional[]" value="Contacted by phone" type="checkbox" class="ml-1" id="exampleCheck1" style="transform: scale(1.5)">
                    <label class="form-check-label" style="margin-left:15px; margin-top:-7px" for="exampleCheck1">Be contacted by phone</label>
                  </div>
                  <div class="input-group col-md-6 mb-md-0 mt-2">
                    <input name="additional[]" value="Need pricing information" type="checkbox" class="ml-1" id="exampleCheck1" style="transform: scale(1.5)">
                    <label class="form-check-label" style="margin-left:15px; margin-top:-7px" for="exampleCheck1">Receive pricing information</label>
                  </div>
                </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" form="form1" type="button" class="btn btn-primary">Send Quote</button>
        </div>
      </div>
    </div>
  </div>

  <div id="expandimg" class="modalexpandimg">
  <span class="closeexpanded">&times;</span>
  <img class="modalexpandimg-content" id="expandedimg">
  <div id="caption"></div>
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Share</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
          <a href="https://wa.me/?text={{url()->full()}}%0D%0A%2A{{$product->name}}%2A" target="_blank"><i class="fa fa-whatsapp fa-3x" style="color:#25d366; margin-right: 10px" aria-hidden="true"></i></a>
          <a href="https://twitter.com/intent/tweet?text={{$product->name}}&url={{url()->full()}}" target="_blank"><i class="fa fa-twitter-square fa-3x" style="color:#1DA1F2; margin-right: 10px" aria-hidden="true"></i></a>
          <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->full()}}" target="_blank"><i class="fa fa-facebook-square fa-3x" style="color:#3b5998; margin-right: 10px" aria-hidden="true"></i></a>
          <a href="https://www.linkedin.com/sharing/share-offsite/?url={{url()->full()}}" target="_blank"><i class="fa fa-linkedin-square fa-3x" style="color:#0072b1; margin-right: 10px" aria-hidden="true"></i></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('jsplus')

<script>
// Get the modal

var modal = document.getElementById("expandimg");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("expandedimg");
var captionText = document.getElementById("caption");
function expand(imgs) {
  modal.style.display = "block";
  modalImg.src = imgs.src;
  captionText.innerHTML = imgs.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeexpanded")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

  @if ($errors->any())
  <script type="text/javascript">
    $(window).on('load',function(){
        $('#addquotation').modal('show');
    });
  </script>
  @endif
@endsection

  