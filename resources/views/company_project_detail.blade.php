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
            </p>
          </div>
      </div>
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
    <div class="row">
      <div class="col-md-7">
        <div style="border-right: 1px solid #ccc; padding: 20px 40px;">
          @php 
          echo $news->description;
        @endphp
        </div>
      </div>
      <div class="col-md-5">
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
 

   

@endsection
