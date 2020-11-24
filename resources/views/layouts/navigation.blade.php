<div class="site-wrap">

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  @if(Request::path() === '/' || Request::path() === 'home')
    <header class="site-navbar site-navbar-nothome position-fixed" role="banner">
  @else
    <header class="site-navbar site-navbar-nothome position-fixed" role="banner">
  @endif
      

    <div class="container pl-4 pr-4">
      <div class="row align-items-center">
        
        <div class="col-11 col-xl-2">
          <h1 class="mb-0 site-logo"><a href="{{url('/')}}" class="h2 mb-0"><b>INDOMINING</b></a></h1>
        </div>
        <div class="col-12 col-md-8 d-none d-xl-block">
          <nav class="site-navigation position-relative text-center" role="navigation">
            @php 
              $ccategory = \App\MCatagory::all();
            @endphp
            <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="{{url('/')}}"><span>Home</span></a></li>
              <li class="has-children">
                <a><span>Categories</span></a>
                <ul class="dropdown arrow-top">
                  @for ($i = 0; $i < 3; $i++)
                    <li><a href="{{url("search?cat=".$ccategory[$i]->id)}}">{{$ccategory[$i]->name}}</a></li>
                  @endfor
                  <li><a data-toggle="modal" data-target="#categories">View All..</a></li>
                </ul>
              </li>
              <li><a href="{{url('company')}}"><span>Directory</span></a></li>
              <li><a href="{{url('product')}}"><span>Products</span></a></li>
              <li><a href="{{url('contact')}}"><span>Contact</span></a></li>
              @guest
              <li><a data-toggle="modal" data-target="#signin" class="d-xl-none">SIGN IN</a></li>
              @else
              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="d-xl-none">Log out</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              @endguest
            </ul>
          </nav>
        </div>
        

        <div class="col-md-2 position-relative text-center"> 
          @guest
          <a class="float-right" href="" data-toggle="modal" data-target="#signin" style="border: 1px solid #00918e; border-radius: 30px; padding: 8px;"><span>SIGN IN</span></a>
          @else
          <div class="dropdown">
          
            <a class="float-right" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span style="color: grey">Welcome, </span> {{ Auth::user()->username}} !
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              {{-- <a class="dropdown-item" href="">Quotation</a>
              <a class="dropdown-item" href="">Setting</a> --}}
              
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>
            </div>
          </div>

          {{-- <div class="row">
            <div class="dropdownacc">
              <a onclick="Dropdown()" class="dropbtn">Welcome <span class="text-primary">Ardiansyah!</span></a>
              <div id="dropdownacc" class="dropdown-content">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
              </div>
            </div>
          </div> --}}

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endguest 
        
        </div>

        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
        </div>
      </div>
    </div>

<div class="modal fade" id="categories" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content p-4">
    <div class="modal-body">
    <div class="row">
      @foreach ($ccategory as $a)
        <div class="col-lg-3 mb-1 categories"><a href="{{url("search?cat=".$a->id)}}">{{$a->name}}</a></div>
      @endforeach
    </div>
    </div>
  </div>
</div>
</div>
    
  </header>