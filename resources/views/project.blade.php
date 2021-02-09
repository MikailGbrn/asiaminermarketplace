@extends('layout')
    @section('content')

    <div class="site-section bg-light">
      <div class="container">

        <div class="row mt-5">

          <!-- COMPANY DIRECTORY START HERE -->
          <div class="col-lg-12">
            <h4>Projects ({{$project->total()}})</h4>
            <div class="row mb-3 align-items-stretch">
            @foreach ($project as $p)

              <div class="col-md-4 mb-4 mb-lg-4">
                <div class="h-entry h-option ">
                  <a href="{{url('project/'.$p->company->id.'/'.$p->slug)}}">
                    <div class="image-container-product">
                      <img src="{{url('public/'.Storage::url($p->photo))}}" alt="Image" class="img-fluid product">
                    </div>
                  <div class="h-entry-inner">
                    <h2 class="font-size-regular title-limit"><object><a href="{{url('project/'.$p->company->id.'/'.$p->slug)}}">{{$p->title}}</a></object></h2>
                    <p><object><a href="{{url('/')}}/company/{{$p->company->slug}}">{{$p->company->name}}</a></object></p>
                    <p class="text-secondary"><object>{{date( 'F j, Y',strtotime( $p->created_at ))}}</object></p>
                  </div>
                  </a>
                </div> 
              </div>

              <!-- /storage/product/1ef8b149-8a9a-4a29-b332-bbb83b61c034.jpeg -->
            
            @endforeach
          </div>


          </div>

            <!-- COMPANY DIRECTORY END HERE -->

            <!-- PAGINATION START HERE -->
            <div class="col-12 text-center mt-5">
              {{$project->links()}}
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