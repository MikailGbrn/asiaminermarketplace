<header class="site-navbar site-navbar-nothome position-fixed" role="banner">

  <div class="warp-container pr-4 pl-4">
    <div class="row align-items-center">
      
      <div class="col-11 col-xl-2">
        <h1 class="mb-0 site-logo"><a href="index.html" class="text-white h2 mb-0">Browse</a></h1>
      </div>
      <div class="col-12 col-md-7 d-none d-xl-block">
        <nav class="site-navigation position-relative text-center" role="navigation"> 

          <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
            <li><a href="{{url('/')}}/company-profile/"><span>Dashboard</span></a></li>
            <li><a href="{{url('/')}}/company-profile/media"><span>Media/Resources</span></a></li>
            <li><a href="{{url('/')}}/company-profile/product"><span>Products</span></a></li>
            <li><a href="{{url('/')}}/company-profile/news"><span>News</span></a></li>
            <li><a href="{{url('/')}}/company-profile/project"><span>Projects</span></a></li>
          </ul>
        </nav>
      </div>

      <div class="col-md-3 d-none d-xl-block position-relative text-center"> 
          <div class="dropdownacc">
            <a onclick="Dropdown()" class="dropbtn">Welcome, <span class="text-primary">{{ Auth::guard('admin-company')->user()->username}} !</span></a>
            <div id="dropdownacc" class="dropdown-content">
              <a href="{{url('/company-profile/media/statistic')}}">Media Statistic</a>
              <a href="{{url('/company-profile/product/statistic')}}">Product Statistic</a>
              <hr>
              <a href="{{url('/')}}">Go Back to Site</a>
              <a href="{{url('/company-profile/account-setting')}}">Account Setting</a>
              <a href="{{url('/company/logout')}}">Log out</a>
            </div>
          </div>
      </div>

      <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
      </div>
    </div>
  </div>
  
</header>