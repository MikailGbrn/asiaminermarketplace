@extends('layout')

@section('content')
<div class="site-section bg-light">
  <div class="container mt-5">
     <div class="row">
       <div class="col-md-8">
        <div class="news">
          <div class="news-header">
            <h1>{{$news->title}}</h1>
            <p>{{$news->location}} / {{date( 'F j, Y',strtotime( $news->created_at ))}} / {{date( 'g:i a ',strtotime( $news->created_at ))}}</p>
            <p class="text-secondary">
            By <span>{{$news->author}}</span>
            </p>
          </div>
          <div class="image-container"><img src="{{url('public/'.Storage::url($news->photo))}}"></div>
          <div class="news-body">
            <div class="abstract">
              {{$news->abstract}}
            </div>
            <style>.paragraf > p{
              padding-left:0px !important;
              padding-top : 10px !important; 
            }</style>
            <div class="paragraf">
              @php 
                echo $news->description;
              @endphp
            </div>
          </div>
        </div>
       </div>
       <div class="col-md-4">
         <h4 class="mb-5">Related News</h4>

         @foreach ($relatedNews as $r)
         <div class="related-news mb-5">
            <div class="image-container">
              <img src="{{url('public/'.Storage::url($r->photo))}}">
            </div>
            <a href="{{url("/news/$r->company_id/$r->slug")}}">{{$r->title}}</a>
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
