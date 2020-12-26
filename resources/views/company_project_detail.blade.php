@extends('layout')

@section('content')
<div class="site-section bg-light">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
          <div class="news-header mb-5">
            <a href="#">{{$news->company->name}}</a>
              <h1>{{$news->title}}</h1>
              <p>{{$news->location}} / {{date( 'F j, Y',strtotime( $news->created_at ))}} / {{date( 'g:i a ',strtotime( $news->created_at ))}}</p>
              <p class="text-secondary">
              By <span>{{$news->author}}</span>
              <a href="" data-toggle="modal" style="margin-left:20px" data-target="#exampleModal">
                <span> <i class="fa fa-share" aria-hidden="true"></i></span>
                <span>Share</span>
              </a>
              </p>
          </div>
          <!-- carousel -->
          <div class="row mb-5">
            <div class="col-md-12">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @foreach ($news->picture as $gambar)
                  <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" @if($loop->first) class="active" @endif ></li>
                  @endforeach
                </ol>
                <div class="carousel-container">
                <div class="carousel-inner">
                  @foreach ($news->picture as $gambar)
                  <div class="carousel-item @if($loop->first) active @endif">
                    <img class="d-block w-100" src="{{url('public/'.Storage::url($gambar->photo))}}" alt="{{$loop->iteration}} slide">
                  </div>
                  @endforeach
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
          <!-- carousel -->      
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
      <div class="news">
        <div style="padding: 20px 40px;">
          @php 
          echo $news->description;
        @endphp
        </div>
      </div>        
      </div>

      {{-- <div class="col-md-3">
        <h4>Product</h4>
         <div class="related-news mb-5">
            <div class="image-container">
              <img src="{{url('public/'.Storage::url($news->product->photo))}}">
            </div>
            <a href="{{url("/product/$news->company_id/$news->product->slug")}}">{{$news->product->name}}</a>
            <div class="abstract">
              {{$news->product->description}}
            </div>
         </div>

      </div> --}}

      <div class="col-md-3">
        <h4>Product in This Project</h4>
         <div class="related-news mb-5">
            <div class="image-container">
             <img src="{{url('public/'.Storage::url($product->photo))}}">
            </div>
            <a href="{{url("/product/$news->company_id/$product->slug")}}">{{$product->title}}</a>
            <div class="abstract">
              {{$product->description}}
            </div>
         </div>
      </div>

      <div class="col-md-3">
        <h4>More From {{$news->company->name}}</h4>
        @foreach ($relatedNews as $r)
         <div class="related-news mb-5">
            <div class="image-container">
              <img src="{{url('public/'.Storage::url($r->photo))}}">
            </div>
            <a href="{{url("/project/$r->company_id/$r->slug")}}">{{$r->title}}</a>
            <div class="abstract">
              {{$r->abstract}}
            </div>
         </div>
         @endforeach
      </div>
    </div>
  </div>




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
        <a href="https://wa.me/?text={{url()->full()}}%0D%0A%2A{{$news->title}}%2A" target="_blank"><i class="fa fa-whatsapp fa-3x" style="color:#25d366; margin-right: 10px" aria-hidden="true"></i></a>
        <a href="https://twitter.com/intent/tweet?text={{$news->title}}&url={{url()->full()}}" target="_blank"><i class="fa fa-twitter-square fa-3x" style="color:#1DA1F2; margin-right: 10px" aria-hidden="true"></i></a>
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
