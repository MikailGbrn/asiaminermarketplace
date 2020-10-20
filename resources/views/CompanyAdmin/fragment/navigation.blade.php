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
    <header class="site-navbar position-fixed" role="banner">
  @else
    <header class="site-navbar site-navbar-nothome position-fixed" role="banner">
  @endif
      

    <div class="container">
      <div class="row align-items-center">
        
        <div class="col-md-10 d-none d-xl-block text-center">
          <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0">{{$company->name}}</a></h1>
        </div>

        <div class="col-md-2 position-relative">
          <div class="row">

            <div class="dropdownacc">
              <a onclick="Dropdown()" class="dropbtn">Welcome, <span class="text-primary">Ardiansyah!</span></a>
              <div id="dropdownacc" class="dropdown-content">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
              </div>
            </div>

          </div>
        </div>
        

        
        </div>
      </div>
    </div>
    
  </header>